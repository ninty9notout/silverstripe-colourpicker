<?php
/**
 * Colour input field.
 * 
 * @package forms
 * @subpackage fields-formattedinput
 */
class ColourPicker extends TextField
{
    public function __construct($name, $title = null, $value = '', $form = null)
    {
        parent::__construct($name, $title, $value, 7, $form);

        $this->addExtraClass("text");
    }

    public function Field($properties = array())
    {
        $this->addExtraClass("colourpickerinput");

        Requirements::javascript(COLOURPICKER_DIR . "/thirdparty/jquery-minicolors/jquery.minicolors.min.js");
        Requirements::css(COLOURPICKER_DIR . "/thirdparty/jquery-minicolors/jquery.minicolors.css");

        Requirements::css(COLOURPICKER_DIR . "/css/colourpicker.css");
        Requirements::javascript(COLOURPICKER_DIR . "/javascript/colourpicker.js");

        return parent::Field($properties);
    }

    public function validate($validator)
    {
        if (!empty($this->value) && !preg_match("/^#?([a-f0-9]{3}$)|([a-f0-9]{6}$)/i", $this->value)) {
            $validator->validationError($this->name, _t("ColourPicker.VALIDCOLOURFORMAT", "Please enter a valid color in hexadecimal format."), "validation", false);
            return false;
        }

        return true;
    }
}
