<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Submit
 */
class Tag_Form_Submit extends Tag_Form_Input
{					
	/**
     * @param string $value
	 */
    public function __construct($value)
	{
		$this->_htmlParams['type'] = 'submit';

        parent::__construct('submit', $value);
	}				
}
