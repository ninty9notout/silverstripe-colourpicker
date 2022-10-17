<?php

class Colour extends Varchar
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, 7, $options);
    }

	/**
	 * (non-PHPdoc)
	 * @see DBField::scaffoldFormField()
	 */
	public function scaffoldFormField($title = null, $params = null) {
		return new ColourPicker($this->name, $title);
	}

    public function getHash()
    {
        return substr($this->value, 1);
    }

    public function getRGB()
    {
        $hash = $this->getHash();
        return array(
            'R' => hexdec(substr($hash, 0, 2)),
            'G' => hexdec(substr($hash, 2, 2)),
            'B' => hexdec(substr($hash, 4, 2)),
        );
    }

    public function getRed()
    {
        return $this->getRGB()['R'];
    }

    public function getBlue()
    {
        return $this->getRGB()['B'];
    }

    public function getGreen()
    {
        return $this->getRGB()['G'];
    }
}
