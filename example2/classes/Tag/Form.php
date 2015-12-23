<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Form
 */
class Tag_Form extends Tag
{
    /**
     * @param string|null $action
     * @param string $method
     */
    public function __construct($action=null, $method='post')
	{
		parent::__construct();
		
		$this->_htmlTag = 'form';
        $this->_htmlParams['action'] = $action;
        $this->_htmlParams['method'] = $method;
	}	
}
