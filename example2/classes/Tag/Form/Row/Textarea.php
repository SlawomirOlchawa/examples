<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Form row - label and textarea
 */
class Tag_Form_Row_Textarea extends Tag_Form_Row
{
    /**
     * @var Tag_Form_Textarea
     */
    protected $_textarea;

    /**
     * @param string $text
     * @param string $name
     * @param null|string $value
     * @param bool $required
     */
    public function __construct($text, $name, $value=null, $required=false)
    {
        $this->_textarea = new Tag_Form_Textarea($name, $value);

        parent::__construct($text, $this->_textarea, $required);
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setHTML($text)
    {
        $this->_textarea->setHTML($text);

        return $this;
    }
}
