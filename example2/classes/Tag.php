<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Tag
 */
class Tag extends TagSingle
{
    /**
     * @var string HTML contents
     */
    protected $_html = null;

    /**
     * @var Container
     */
    protected $_container = null;

    public function __construct()
    {
        parent::__construct();

        $this->_container = new Container();
    }

    /**
     * Add sub component
     *
     * @param Component|null $component
     * @return $this;
     */
    public function add(Component $component = null)
    {
        $this->_container->add($component);

        return $this;
    }

    /**
     * Delete all subcomponents
     */
    public function clear()
    {
        $this->_container->clear();
    }

    /**
     * Set HTML content
     *
     * @param string $value
     * @return $this
     */
    public function setHTML($value)
    {
        $this->_html = $value;

        return $this;
    }

    /**
     * Render HTML code
     */
    protected function _render()
    {
        $output = parent::_render();

        $content = $this->_html;
        $content = $this->_filter($content);
        $output .= $content;

        if (!empty($this->_container))
        {
            $output .= $this->_container->render();
        }

        $output .= '</'.$this->_htmlTag.'>';

        return $output;
    }

    /**
     * @return string
     */
    protected function _closeTag()
    {
        return '>';
    }

    /**
     * @param string $content
     * @return string
     */
    protected function _filter($content)
    {
        return $content;
    }
}
