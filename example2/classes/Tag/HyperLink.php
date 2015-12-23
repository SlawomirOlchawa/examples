<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Hyperlink
 */
class Tag_HyperLink extends Tag
{
    /**
     * @param string $caption
     * @param string $url
     */
    public function __construct($caption, $url)
	{
		parent::__construct();
		
		$this->_html = $caption;
		$this->_htmlTag = 'a';
		$this->_htmlParams['href'] = $url;
	}				
}
