<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Table row
 */
class Tag_Table_Row extends Tag
{
    public function __construct()
	{
		parent::__construct();

		$this->_htmlTag = 'tr';
	}		
}
