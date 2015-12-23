<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Paragraph
 */
class Tag_Paragraph extends Tag
{
    /**
     * @param string $content
     */
    public function __construct($content)
	{
		parent::__construct();
		
		$this->_html = $content;
		$this->_htmlTag = 'p';
	}

    /**
     * @param string $content
     * @return string
     */
    protected function _filter($content)
    {
        $content = nl2br($content);
        $content = wordwrap($content, 100, ' ', TRUE);

        return $content;
    }
}
