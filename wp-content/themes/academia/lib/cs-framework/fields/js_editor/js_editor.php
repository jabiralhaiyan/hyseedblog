<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: CSS Editor
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_js_editor extends CSFramework_Options {

    public function __construct( $field, $value = '', $unique = '' ) {
        parent::__construct( $field, $value, $unique );

        $this->addAction('admin_footer', 'cs_js_editor_script');

    }

    public function output() {
        echo $this->element_before();
        echo '<div class="js-editor-container">';
        echo '<textarea id="cs-js-editor-option" name="'. $this->element_name() .'"'. $this->element_class() . $this->element_attributes() .'>'. $this->element_value() .'</textarea></div>';
        echo $this->element_after();

    }

    public function cs_js_editor_script() {
        echo '<style>
         #cs-js-editor-option {
            background-color: #272822;
            color: #F8F8F2;
            min-height: 200px;
            width: 450px;
            position: relative;
         }
         
         .js-editor-container {
             position: relative;
         }
         
        </style>';
        echo '<script src="'. CS_URI .'/assets/js/vendor/behave.js" ></script>';
        echo '<script>
        (function(){
       
			var editor = new Behave({
			
				textarea: 		document.getElementById("cs-js-editor-option"),
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
