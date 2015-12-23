<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML button
 */
class Tag_Form_Button extends Tag
{					
	/**
	 * @param string $label
	 */
	public function __construct($label) 
	{
		parent::__construct();
		
		$this->_html = $label;
		$this->_htmlTag = 'button';
		$this->_htmlParams['type'] = 'button';
	}				
}
