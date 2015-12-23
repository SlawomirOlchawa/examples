<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Textarea
 *
 * @property string $type
 */
class Tag_Form_Textarea extends Tag
{
	/**
	 * @param string $name
     * @param null|string $value
	 */
    public function __construct($name, $value=null)
	{
		parent::__construct();			
						
		$this->_htmlTag = 'textarea';
		$this->_htmlParams['name'] = $name;

		if (null !== $value)
        {
            $this->_html = $value;
        }
	}				
}
