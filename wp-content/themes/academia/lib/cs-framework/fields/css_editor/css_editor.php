<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: CSS Editor
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_css_editor extends CSFramework_Options {

    public function __construct( $field, $value = '', $unique = '' ) {
        parent::__construct( $field, $value, $unique );

        $this->addAction('admin_footer', 'cs_css_editor_script');

    }

    public function output() {

        echo $this->element_before();
        echo '<div class="css-editor-container">';
        echo '<textarea id="cs-css-editor-option" name="'. $this->element_name() .'"'. $this->element_class() . $this->element_attributes() .'>'. $this->element_value() .'</textarea> </div>';
        echo $this->element_after();

    }


    public function cs_css_editor_script() {
        echo '<style>
         #cs-css-editor-option {
            background-color: #002240;
            color: #FFFFFF;
            min-height: 200px;
            width: 450px;
            font-family: monospace;
            
         }
         .css-editor-container {
             position: relative;
         }
        </style>';
        echo '<script src="'. CS_URI .'/assets/js/vendor/behave.js" ></script>';
        echo '<script>
        (function(){
		
			var editor = new Behave({
			
				textarea: 		document.getElementById("cs-css-editor-option"),
				replaceTab: 	true,
			    softTabs: 		true,
			    tabSize: 		4,
			    autoOpen: 		true,
			    overwrite: 		true,
			    autoStrip: 		true,
			    autoIndent: 	true
			});
			
		})();
        </script>';
    }


}
