<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Table
 */
class Tag_Table extends Tag
{
    public function __construct()
	{
		parent::__construct();

		$this->_htmlTag = 'table';
	}		
}
