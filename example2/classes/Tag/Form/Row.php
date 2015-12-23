<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Form row - label and field
 */
class Tag_Form_Row extends Tag_Block
{
    /**
     * @var string
     */
    protected $_text;

    /**
     * @var TagSingle
     */
    protected $_field;

    /**
     * @var bool
     */
    protected $_required;

    /**
     * @param string $text
     * @param TagSingle $field
     * @param bool $required
     */
    public function __construct($text, $field, $required=false)
    {
        parent::__construct();

        $this->addCSSClass('row');

        if (!empty($text))
        {
            $text .= ':';
        }

        $this->_text = $text;
        $this->_field = $field;
        $this->_required = $required;
    }

    /**
     * @return string
     */
    protected function _render()
    {
        $label = new Tag_Form_Label($this->_text);
        $this->add($label);
        $this->add($this->_field);

        if ($this->_required)
        {
            $star = new Tag_Paragraph('*');
            $this->add($star);
        }

        return parent::_render();
    }
}
