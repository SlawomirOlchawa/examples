<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML DIV block
 */
class Tag_Block extends Tag
{
    /**
     * @var Component|null|string
     */
    protected $_content;

    /**
     * @param Component|string|null $content
     */
    public function __construct($content=null)
	{
		parent::__construct();

		$this->_htmlTag = 'div';
        $this->_content = $content;
	}

    /**
     * @return string
     */
    protected function _render()
    {
        if ($this->_content instanceof Component)
        {
            $this->add($this->_content);
        }
        else
        {
            $this->_html = $this->_content;
        }

        return parent::_render();
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
