<?php

namespace ninty9notout\SSColourPicker\FieldType;

use ninty9notout\SSColourPicker\Forms\ColourPickerField;
use SilverStripe\ORM\FieldType\DBVarchar;
use OzdemirBurak\Iris\BaseColor;
use OzdemirBurak\Iris\Color\Factory;

class DBColour extends DBVarchar
{
    /**
     * @var BaseColor $colour
     */
    protected $colour;

    /**
     * @var array $casting
     */
    private static $casting = [
        'Colour' => 'Text',
        'Hex' => Colour::class,
        'Hsl' => Colour::class,
        'Hsla' => Colour::class,
        'Hsv' => Colour::class,
        'Rgb' => Colour::class,
        'Rgba' => Colour::class,
        'Saturate' => Colour::class,
        'Desaturate' => Colour::class,
        'Grayscale' => Colour::class,
        'Brighten' => Colour::class,
        'Lighten' => Colour::class,
        'Darken' => Colour::class,
        'IsLight' => 'Boolean',
        'IsDark' => 'Boolean',
        'Spin' => Colour::class,
        'Tint' => Colour::class,
        'Shade' => Colour::class,
        'Fade' => Colour::class,
        'FadeIn' => Colour::class,
        'FadeOut' => Colour::class,
    ];

    /**
     * {@inheritdoc}
     */
    public function setValue($value, $record = null, $markChanged = true)
    {
        parent::setValue($value, $record, $markChanged);

        if ($value) {
            $this->colour = Factory::init($value);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getColour()
    {
        return (string) $this->colour;
    }

    /**
     * @return float
     */
    public function getPredominance()
    {
        return (float) $this->predominance;
    }

    /**
     * @return static
     */
    public function getHex()
    {
        return static::create((string) $this->colour->toHex());
    }

    /**
     * @return static
     */
    public function getHsl()
    {
        return static::create((string) $this->colour->toHsl());
    }

    /**
     * @return static
     */
    public function getHsla()
    {
        return static::create((string) $this->colour->toHsla());
    }

    /**
     * @return static
     */
    public function getHsv()
    {
        return static::create((string) $this->colour->toHsv());
    }

    /**
     * @return static
     */
    public function getRgb()
    {
        return static::create((string) $this->colour->toRgb());
    }

    /**
     * @return static
     */
    public function getRgba()
    {
        return static::create((string) $this->colour->toRgba());
    }

    /**
     * @param int $percent
     * @return static
     */
    public function Saturate($percent)
    {
        return static::create((string) $this->colour->saturate($percent));
    }

    /**
     * @param int $percent
     * @return static
     */
    public function Desaturate($percent)
    {
        return static::create((string) $this->colour->desaturate($percent));
    }

    /**
     * @return static
     */
    public function Grayscale()
    {
        return static::create((string) $this->colour->grayscale());
    }

    /**
     * @param int $percent
     * @return static
     */
    public function Brighten($percent)
    {
        return static::create((string) $this->colour->brighten($percent));
    }

    /**
     * @param int $percent
     * @return static
     */
    public function Lighten($percent)
    {
        return static::create((string) $this->colour->lighten($percent));
    }

    /**
     * @param int $percent
     * @return static
     */
    public function Darken($percent)
    {
        return static::create((string) $this->colour->darken($percent));
    }

    /**
     * @return boolean
     */
    public function IsLight()
    {
        return $this->colour->isLight();
    }

    /**
     * @return boolean
     */
    public function IsDark()
    {
        return $this->colour->isDark();
    }

    /**
     * @param int $percent
     * @return static
     */
    public function Spin($percent)
    {
        return static::create((string) $this->colour->spin($percent));
    }

    /**
     * @param int $percent
     * @return static
     */
    public function Tint($percent = 50)
    {
        return static::create((string) $this->colour->tint($percent));
    }

    /**
     * @param int $percent
     * @return static
     */
    public function Shade($percent = 50)
    {
        return static::create((string) $this->colour->shade($percent));
    }

    /**
     * @param int $percent
     * @return static
     */
    public function Fade($percent)
    {
        return $this;
        // @todo Add once support has been re-added
        // return static::create((string) $this->colour->fade($percent));
    }

    /**
     * @param int $percent
     * @return static
     */
    public function FadeIn($percent)
    {
        return $this;
        // @todo Add once support has been re-added
        // return static::create((string) $this->colour->fadeIn($percent));
    }

    /**
     * @param int $percent
     * @return static
     */
    public function FadeOut($percent)
    {
        return $this;
        // @todo Add once support has been re-added
        // return static::create((string) $this->colour->fadeOut($percent));
    }


    /**
     * {@inheritdoc}
     */
    public function scaffoldFormField($title = null, $params = null)
    {
        return ColourPickerField::create($this->name, $title);
    }

    /**
     * @return string
     */
    public function forTemplate()
    {
        return (string) $this->colour;
    }
}
