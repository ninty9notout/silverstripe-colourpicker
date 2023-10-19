<?php

namespace ninty9notout\SSColourPicker\Forms;

use Exception;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\TextField;

class ColourPickerField extends TextField
{
    /**
     * @var array $palette
     */
    protected $palette = [];

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        $attributes = parent::getAttributes();

        $attributes['data-palette'] = $this->getPalette();

        return $attributes;
    }

    /**
     * {@inheritdoc}
     */
    protected function setupDefaultClasses()
    {
        parent::setupDefaultClasses();

        $this->addExtraClass('colour-picker-field');
    }

    /**
     * @param array $palette
     * @return $this
     */
    public function setPalette($palette)
    {
        $this->palette = $palette;

        return $this;
    }

    /**
     * @return array
     */
    public function getPalette()
    {
        return $this->palette;
    }
}
