<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML HR
 */
class Tag_Line extends Tag
{
    public function __construct()
	{
		parent::__construct();

		$this->_htmlTag = 'hr';
	}
}
