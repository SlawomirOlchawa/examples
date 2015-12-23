<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Label
 */
class Tag_Form_Label extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content)
	{
		parent::__construct();
		
		$this->_html = $content;
		$this->_htmlTag = 'label';
	}		
}
