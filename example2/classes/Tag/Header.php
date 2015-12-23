<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Header (H1, H2..H6)
 */
class Tag_Header extends Tag
{
    /**
     * @param string $title
     * @param int $level
     */
    public function __construct($title, $level=1)
	{
		parent::__construct();
		
		$this->_htmlTag = 'H'.$level;
		$this->_html = $title;
	}
}
