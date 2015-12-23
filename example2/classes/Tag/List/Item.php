<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML List item (LI)
 */
class Tag_List_Item extends Tag
{
    /**
     * @var Component|string
     */
    protected $_listItem;

    /**
     * @param Component|string $listItem
     */
    public function __construct($listItem)
	{
		parent::__construct();
		
		$this->_htmlTag = 'li';
        $this->_listItem = $listItem;
	}

    /**
     * @return string
     */
    protected function _render()
    {
        if ($this->_listItem instanceof Component)
        {
            $this->add($this->_listItem);
        }
        else
        {
            $this->_html = $this->_listItem;
        }

        return parent::_render();
    }
}
