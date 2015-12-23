<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Table Header
 */
class Tag_Table_Header extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
	{
		parent::__construct();

		$this->_html = $content;
		$this->_htmlTag = 'th';
	}		
}
