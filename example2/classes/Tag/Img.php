<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Image
 */
class Tag_Img extends TagSingle
{
    /**
     * @param string $src
     */
    public function __construct($src)
	{
		parent::__construct();				
		
		$this->_htmlTag = 'img';
		$this->_htmlParams['src'] = $src;
	}		
}
