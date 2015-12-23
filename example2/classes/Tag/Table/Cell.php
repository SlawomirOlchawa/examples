<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Table Cell
 */
class Tag_Table_Cell extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content = null)
	{
		parent::__construct();

		$this->_html = $content;
		$this->_htmlTag = 'td';
	}		
}
