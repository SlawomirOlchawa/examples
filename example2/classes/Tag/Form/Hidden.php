<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Input hidden
 *
 * @property string $type
 */
class Tag_Form_Hidden extends Tag_Form_Input
{
	/**
	 * @param string $name
     * @param null|string $value
	 */
    public function __construct($name, $value=null)
	{
		parent::__construct($name, $value);
						
		$this->type = 'hidden';
	}				
}
