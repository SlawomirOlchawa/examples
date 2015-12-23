<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Form row - label and select
 */
class Tag_Form_Row_Select extends Tag_Form_Row
{
    /**
     * @var Tag_Form_Select
     */
    protected $_select;

    /**
     * @param string $text
     * @param string $name
     * @param null|string $value
     * @param bool $required
     */
    public function __construct($text, $name, $value=null, $required=false)
    {
        $this->_select = new Tag_Form_Select($name);

        parent::__construct($text, $this->_select, $required);
    }

    /**
     * @param Component $component
     */
    public function addOption(Component $component = null)
    {
        $this->_select->add($component);
    }
}
