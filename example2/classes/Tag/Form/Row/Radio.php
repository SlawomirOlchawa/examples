<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Form row - label and radio
 */
class Tag_Form_Row_Radio extends Tag_Form_Row
{
    /**
     * @var string
     */
    protected $_name;

    /**
     * @var array
     */
    protected $_values;

    /**
     * @param string $text
     * @param string $name
     * @param array $values
     * @param bool $required
     */
    public function __construct($text, $name, $values=array(), $required=false)
    {
        $this->_name = $name;
        $this->_values = $values;

        parent::__construct($text, null, $required);
    }

    /**
     * @return string
     */
    protected function _render()
    {
        $this->_field = new Tag_Block();
        $this->_field->addCSSClass('radioContainer');

        foreach ($this->_values as $value=>$caption)
        {
            $radio = new Tag_Form_Radio($this->_name, $value);
            $label = new Tag_Form_Label($caption);
            $label->addCSSClass('radioLabel');
            $label->add($radio);
            $this->_field->add($label);
        }

        return parent::_render();
    }
}
