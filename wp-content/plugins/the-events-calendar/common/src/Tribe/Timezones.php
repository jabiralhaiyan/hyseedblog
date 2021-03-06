<?php

/**
 * Helpers for handling timezone based event datetimes.
 *
 * In our timezone logic, the term "local" refers to the locality of an event
 * rather than the local WordPress timezone.
 */
class Tribe__Timezones {
	const SITE_TIMEZONE  = 'site';
	const EVENT_TIMEZONE = 'event';


	/**
	 * Container for reusable DateTimeZone objects.
	 *
	 * @var array
	 */
	protected static $timezones = array();


	public static function init() {
		self::invalidate_caches();
	}

	/**
	 * Clear any cached timezone-related values when appropriate.
	 *
	 * Currently we are concerned only with the site timezone abbreviation.
	 */
	protected static function invalidate_caches() {
		add_filter( 'pre_update_option_gmt_offset', array( __CLASS__, 'clear_site_timezone_abbr' ) );
		add_filter( 'pre_update_option_timezone_string', array( __CLASS__, 'clear_site_timezone_abbr' ) );
	}

	/**
	 * Wipe the cached site timezone abbreviation, if set.
	 *
	 * @param mixed $option_val (passed through without modification)
	 *
	 * @return mixed
	 */
	public static function clear_site_timezone_abbr( $option_val ) {
		delete_transient( 'tribe_events_wp_timezone_abbr' );
		return $option_val;
	}

	/**
	 * Returns the current site-wide timezone string.
	 *
	 * Based on the core WP code found in wp-admin/options-general.php.
	 *
	 * @return string
	 */
	public static function wp_timezone_string() {
		$current_offset = get_option( 'gmt_offset' );
		$tzstring       = get_option( 'timezone_string' );

		// Return the timezone string if already set
		if ( ! empty( $tzstring ) ) {
			return $tzstring;
		}

		// Otherwise return the UTC offset
		if ( 0 == $current_offset ) {
			return 'UTC+0';
		} elseif ( $current_offset < 0 ) {
			return 'UTC' . $current_offset;
		}

		return 'UTC+' . $current_offset;
	}

	/**
	 * Returns the current site-wide timezone string abbreviation, if it can be
	 * determined or falls back on the full timezone string/offset text.
	 *
	 * @param string $date
	 *
	 * @return string
	 */
	public static function wp_timezone_abbr( $date ) {
		$abbr = get_transient( 'tribe_events_wp_timezone_abbr' );

		if ( empty( $abbr ) ) {
			$timezone_string = self::wp_timezone_string();
			$abbr = self::abbr( $date, $timezone_string );
			set_transient( 'tribe_events_wp_timezone_abbr', $abbr );
		}

		return empty( $abbr )
			? $timezone_string
			: $abbr;
	}

	/**
	 * Helper function to retrieve the timezone string for a given UTC offset
	 *
	 * This is a close copy of WooCommerce's wc_timezone_string() method
	 *
	 * @param string $offset UTC offset
	 *
	 * @return string
	 */
	public static function generate_timezone_string_from_utc_offset( $offset ) {
		if ( ! self::is_utc_offset( $offset ) ) {
			return $offset;
		}

		// ensure we have the minutes on the offset
		if ( ! strpos( $offset, ':' ) ) {
			$offset .= ':00';
		}

		$offset = str_replace( 'UTC', '', $offset );

		list( $hours, $minutes ) = explode( ':', $offset );
		$seconds = $hours * 60 * 60 + $minutes * 60;

		// attempt to guess the timezone string from the UTC offset
		$timezone = timezone_name_from_abbr( '', $seconds, 0 );

		if ( false === $timezone ) {
			$is_dst = date( 'I' );

			foreach ( timezone_abbreviations_list() as $abbr ) {
				foreach ( $abbr as $city ) {
					if (
						$city['dst'] == $is_dst
						&& $city['offset'] == $seconds
					) {
						return $city['timezone_id'];
					}
				}
			}

			// fallback to UTC
			return 'UTC';
		}

		return $timezone;
	}

	/**
	 * Tried to convert the provided $datetime to UTC from the timezone represented by $tzstring.
	 *
	 * Though the usual range of formats are allowed, $datetime ordinarily ought to be something
	 * like the "Y-m-d H:i:s" format (ie, no timezone information). If it itself contains timezone
	 * data, the results may be unexpected.
	 *
	 * In those cases where the conversion fails to take place, the $datetime string will be
	 * returned untouched.
	 *
	 * @param string $datetime
	 * @param string $tzstring
	 *
	 * @return string
	 */
	public static function to_utc( $datetime, $tzstring ) {
		if ( self::is_utc_offset( $tzstring ) ) {
			return self::apply_offset( $datetime, $tzstring, true );
		}

		try {
			$local = self::get_timezone( $tzstring );
			$utc   = self::get_timezone( 'UTC' );

			// We can't use method chaining here (ie "date_create(...)->setTimezone(...)") due to PHP 5.2 compatibility concerns
			$datetime = date_create( $datetime, $local );

			if ( $datetime && false !== $datetime->setTimezone( $utc ) ) {
				return $datetime->format( Tribe__Date_Utils::DBDATETIMEFORMAT );
			}
		}
		catch ( Exception $e ) {}

		return $datetime;
	}

	/**
	 * Tries to convert the provided $datetime to the timezone represented by $tzstring.
	 *
	 * This is the sister function of self::to_utc() - please review the docs for that method
	 * for more information.
	 *
	 * @param string $datetime
	 * @param string $tzstring
	 *
	 * @return string
	 */
	public static function to_tz( $datetime, $tzstring ) {
		if ( self::is_utc_offset( $tzstring ) ) {
			return self::apply_offset( $datetime, $tzstring );
		}

		try {
			$local = self::get_timezone( $tzstring );
			$utc   = self::get_timezone( 'UTC' );

			// We can't use method chaining here (ie "date_create(...)->setTimezone(...)") due to PHP 5.2 compatibility concerns
			$datetime = date_create( $datetime, $utc );

			if ( $datetime && false !== $datetime->setTimezone( $local ) ) {
				return $datetime->format( Tribe__Date_Utils::DBDATETIMEFORMAT );
			}
		}
		catch ( Exception $e ) {}

		return $datetime;
	}

	/**
	 * Tests to see if the timezone string is a UTC offset, ie "UTC+2".
	 *
	 * @param string $timezone
	 *
	 * @return bool
	 */
	public static function is_utc_offset( $timezone ) {
		$timezone = trim( $timezone );
		return ( 0 === strpos( $timezone, 'UTC' ) && strlen( $timezone ) > 3 );
	}

	/**
	 * @param string $datetime
	 * @param mixed  $offset (string or numeric offset)
	 * @param bool   $invert = false
	 *
	 * @return string
	 */
	public static function apply_offset( $datetime, $offset, $invert = false ) {
		// Normalize
		$offset = strtolower( trim( $offset ) );

		// Strip any leading "utc" text if set
		if ( 0 === strpos( $offset, 'utc' ) ) {
			$offset = substr( $offset, 3 );
		}

		// It's possible no adjustment will be needed
		if ( 0 === $offset ) {
			return $datetime;
		}

		// Convert the offset to minutes for easier handling of fractional offsets
		$offset = (int) ( $offset * 60 );

		// Invert the offset? Useful for stripping an offset that has already been applied
		if ( $invert ) {
			$offset *= -1;
		}

		try {
			if ( $offset > 0 ) $offset = '+' . $offset;
			$offset = $offset . ' minutes';

			// We can't use method chaining here (ie "date_create(...)->modify(...)") due to PHP 5.2 compatibility concerns
			$datetime = date_create( $datetime );

			if ( $datetime && false !== $datetime->modify( $offset ) ) {
				return $datetime->format( Tribe__Date_Utils::DBDATETIMEFORMAT );
			}
		}
		catch ( Exception $e ) {}

		return $datetime;
	}

	/**
	 * Accepts a unix timestamp and adjusts it so that when it is used to consitute
	 * a new datetime string, that string reflects the designated timezone.
	 *
	 * @param string $unix_timestamp
	 * @param string $tzstring
	 *
	 * @return string
	 */
	public static function adjust_timestamp( $unix_timestamp, $tzstring ) {
		try {
			$local = self::get_timezone( $tzstring );
			$datetime = date_create_from_format( 'U', $unix_timestamp )->format( Tribe__Date_Utils::DBDATETIMEFORMAT );

			// We prefer format('U') to getTimestamp() here due to our requirement for compatibility with PHP 5.2
			return date_create_from_format( 'Y-m-d H:i:s', $datetime, $local )->format( 'U' );
		}
		catch( Exception $e ) {
			return $unix_timestamp;
		}
	}

	/**
	 * Returns a DateTimeZone object matching the representation in $tzstring where
	 * possible, or else representing UTC (or, in the worst case, false).
	 *
	 * If optional parameter $with_fallback is true, which is the default, then in
	 * the event it cannot find/create the desired timezone it will try to return the
	 * UTC DateTimeZone before bailing.
	 *
	 * @param  string $tzstring
	 * @param  bool   $with_fallback = true
	 *
	 * @return DateTimeZone|false
	 */
	public static function get_timezone( $tzstring, $with_fallback = true ) {
		if ( isset( self::$timezones[ $tzstring ] ) ) {
			return self::$timezones[ $tzstring ];
		}

		try {
			self::$timezones[ $tzstring ] = new DateTimeZone( $tzstring );
			return self::$timezones[ $tzstring ];
		}
		catch ( Exception $e ) {
			if ( $with_fallback ) {
				return self::get_timezone( 'UTC', true );
			}
		}

		return false;
	}

	/**
	 * Returns a string representing the timezone/offset currently desired for
	 * the display of dates and times.
	 *
	 * @return string
	 */
	public static function mode() {
		$mode = self::EVENT_TIMEZONE;

		if ( 'site' === tribe_get_option( 'tribe_events_timezone_mode' ) ) {
			$mode = self::SITE_TIMEZONE;
		}

		return apply_filters( 'tribe_events_current_display_timezone', $mode );
	}

	/**
	 * Confirms if the current timezone mode matches the $possible_mode.
	 *
	 * @param string $possible_mode
	 *
	 * @return bool
	 */
	public static function is_mode( $possible_mode ) {
		return $possible_mode === self::mode();
	}

	/**
	 * Attempts to provide the correct timezone abbreviation for the provided timezone string
	 * on the date given (and so should account for daylight saving time, etc).
	 *
	 * @param string $date
	 * @param string $timezone_string
	 *
	 * @return string
	 */
	public static function abbr( $date, $timezone_string ) {
		try {
			return date_create( $date, new DateTimeZone( $timezone_string ) )->format( 'T' );
		}
		catch ( Exception $e ) {
			return '';
		}
	}
}
