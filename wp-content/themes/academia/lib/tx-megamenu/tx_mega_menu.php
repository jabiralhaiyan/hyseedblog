<?php


class tx_mega_menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {

		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'tx_mm_status' ) );
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'tx_mm_columns' ) );
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'tx_mm_heading' ) );

		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'tx_mm_icon' ) );
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'tx_mm_widgetarea' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'tx_update_mm_status'), 10, 3 );
		
		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'tx_update_mm_columns'), 10, 3 );
		
		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'tx_update_mm_heading'), 10, 3 );
		
		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'tx_update_mm_icon'), 10, 3 );
		
		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'tx_update_mm_widgetarea'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'tx_edit_walker'), 10, 2 );



	} // end constructor
	

	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function tx_mm_status( $menu_item ) {
	
	    $menu_item->megamenu = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
	    return $menu_item;
	    
	}
	function tx_mm_columns( $menu_item ) {
	
	    $menu_item->megamenu_col = get_post_meta( $menu_item->ID, '_menu_item_megamenu_col', true );
	    return $menu_item;
	    
	}
	
	function tx_mm_heading( $menu_item ) {
	
	    $menu_item->megamenu_heading = get_post_meta( $menu_item->ID, '_menu_item_megamenu_heading', true );
	    return $menu_item;
	    
	}	
	function tx_mm_icon( $menu_item ) {
	
	    $menu_item->menu_icon = get_post_meta( $menu_item->ID, '_menu_item_menu_icon', true );
	    return $menu_item;
	    
	}		
	function tx_mm_widgetarea( $menu_item ) {
	
	    $menu_item->megamenu_widgetarea = get_post_meta( $menu_item->ID, '_menu_item_megamenu_widgetarea', true );
	    return $menu_item;
	    
	}
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function tx_update_mm_status( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
		
	    if(isset($_REQUEST['menu-item-megamenu'][$menu_item_db_id]) && $_REQUEST['menu-item-megamenu'][$menu_item_db_id] !== ''){
	        $megamenu_value = $_REQUEST['menu-item-megamenu'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_megamenu', $megamenu_value  );
		}
		else{
			delete_post_meta ( $menu_item_db_id, '_menu_item_megamenu'  );
		}
	    
	    
	}

	function tx_update_mm_columns( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
		
		    if ( isset($_REQUEST['menu-item-megamenu_col']) && is_array( $_REQUEST['menu-item-megamenu_col']) ) {
	        $megamenu_col_value = $_REQUEST['menu-item-megamenu_col'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_megamenu_col', $megamenu_col_value );
	    }
	    
	}


	function tx_update_mm_heading( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
		
	    if(isset($_REQUEST['menu-item-megamenu_heading'][$menu_item_db_id]) && $_REQUEST['menu-item-megamenu_heading'][$menu_item_db_id] !== ''){
	        $megamenu_heading_value = $_REQUEST['menu-item-megamenu_heading'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_megamenu_heading', $megamenu_heading_value  );
		}
		else{
			delete_post_meta ( $menu_item_db_id, '_menu_item_megamenu_heading'  );
		}
	    
	}

	function tx_update_mm_icon( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
		
		    if ( isset($_REQUEST['menu-item-menu_icon']) && is_array( $_REQUEST['menu-item-menu_icon']) ) {
	        $menu_icon_value = $_REQUEST['menu-item-menu_icon'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_menu_icon', $menu_icon_value );
	    }
	    
	}
	
	function tx_update_mm_widgetarea( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
		
		    if ( !isset($_REQUEST['menu-item-megamenu_widgetarea'][$menu_item_db_id]) ) {			
			$_REQUEST['menu-item-megamenu_widgetarea'][$menu_item_db_id] = '';
			}
			$megamenu_widgetarea_value = $_REQUEST['menu-item-megamenu_widgetarea'][$menu_item_db_id];
			update_post_meta( $menu_item_db_id, '_menu_item_megamenu_widgetarea', $megamenu_widgetarea_value );
	    
	    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function tx_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}

}

// instantiate plugin's class
new tx_mega_menu();

function please_set_menu(){
	
	$sentence = '<ul><li><a href="">'.	esc_html__("No Menu Set","tx_arsim").'</a></li></ul>';
	
	echo !empty( $sentence ) ? $sentence : ''; 	
	
}


include_once( 'edit_custom_walker.php' );
include_once( 'tx_megamenu_walker.php' );
