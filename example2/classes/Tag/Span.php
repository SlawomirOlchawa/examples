<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Span
 */
class Tag_Span extends Tag
{
    /**
     * @param string|null $content
     */
    public function __construct($content=null)
	{
		parent::__construct();
		
		$this->_html = $content;
		$this->_htmlTag = 'span';
	}		
}
