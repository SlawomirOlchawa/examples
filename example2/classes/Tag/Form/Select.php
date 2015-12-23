<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Select
 */
class Tag_Form_Select extends Tag
{
	/**
	 * @param string $name
     * @param $values
	 */
    public function __construct($name, $values = null)
	{
		parent::__construct();			
						
		$this->_htmlTag = 'select';
		$this->_htmlParams['name'] = $name;
	}
}
