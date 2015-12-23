<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Hyperlink to external page
 */
class Component_ExternalLink extends Tag_HyperLink
{
    /**
     * @param string $caption
     * @param string $url
     */
    public function __construct($caption, $url)
	{
		parent::__construct($caption, $url);

        $this->set('rel', 'nofollow');
        $this->set('target', '_blank');
	}				
}
