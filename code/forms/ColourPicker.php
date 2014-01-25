<?php
/**
 * Colour input field.
 * 
 * @package forms
 * @subpackage fields-formattedinput
 */
class ColourPicker extends TextField {
	public function __construct($name, $title = null, $value = '', $form = null){
		parent::__construct($name, $title, $value, 7, $form);
	}

	public function Field($properties = array()) {
		Requirements::javascript(COLOURPICKER_DIR . "/thirdparty/jquery-minicolors/jquery.liveplugins.js");
		Requirements::javascript(COLOURPICKER_DIR . "/thirdparty/jquery-minicolors/jquery.minicolors.min.js");
		Requirements::css(COLOURPICKER_DIR . "/thirdparty/jquery-minicolors/jquery.minicolors.css");

		Requirements::customScript(<<<JS
			(function($) {
				$(function() {
					$('input.colourpicker').liveplugin("minicolors");
				});
			})(jQuery);
JS
);

		Requirements::customCSS(<<<CSS
			.minicolors-theme-default .minicolors-input {
				height: auto;
				padding-left: 38px!important;
			}

			.minicolors-theme-default .minicolors-swatch {
				border: 0 none;
				height: 100%;
				left: 0;
				overflow: hidden;
				top: 0;
				width: 32px;
				-webkit-border-radius: 4px 0 0 4px;
				-moz-border-radius: 4px 0 0 4px;
				border-radius: 4px 0 0 4px;
				-webkit-border-sizing: border-box;
				-moz-border-sizing: border-box;
				border-sizing: border-box;
			}
CSS
);

		return parent::Field($properties);
	}

	public function getAttributes() {
		return array_merge(
			parent::getAttributes(),
			array(
				'class' => "text colourpicker"
			)
		);
	}
}