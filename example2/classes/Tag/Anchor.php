<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Tag_Anchor
 */
class Tag_Anchor extends Tag
{
    /**
     * @param string $name
     */
    public function __construct($name)
	{
		parent::__construct();

		$this->_htmlTag = 'a';
		$this->_htmlParams['name'] = $name;
        $this->addCSSClass('anchor');
	}				
}
