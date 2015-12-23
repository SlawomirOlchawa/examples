<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Form row - label and checkbox
 */
class Tag_Form_Row_Checkbox extends Tag_Form_Row
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
     * @param null|string $value
     * @param bool $required
     */
    public function __construct($text, $name, $value=null, $required=false)
    {
        $row = new Tag_Block();

        $checkbox = new Tag_Form_Checkbox($name, 1);
        $label = new Tag_Form_Label($text);

        $label->addCSSClass('forCheckbox');

        if ($value)
        {
            $checkbox->set('checked', 'CHECKED');
        }

        $row->add($label);
        $label->add($checkbox);

        parent::__construct(null, $row, $required);
    }
}
