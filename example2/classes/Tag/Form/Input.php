<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Input
 *
 * @property string $type
 */
class Tag_Form_Input extends TagSingle
{
	/**
	 * @param string $name
     * @param null|string $value
	 */
    public function __construct($name, $value=null)
	{
		parent::__construct();			
						
		$this->_htmlTag = 'input';
		$this->_htmlParams['name'] = $name;

        if (!isset($this->_htmlParams['type']))
        {
            $this->_htmlParams['type'] = 'text';
        }

		if (null !== $value)
        {
            $this->_htmlParams['value'] = $value;
        }
	}				
}
