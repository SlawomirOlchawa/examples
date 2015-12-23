<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Option
 */
class Tag_Form_Select_Option extends Tag
{
	/**
	 * @param string $text
     * @param string $value
	 */
    public function __construct($text, $value)
	{
		$this->_htmlTag = 'option';
        $this->_html = $text;
		$this->setValue($value);
	}				
}
