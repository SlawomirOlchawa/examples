<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Unordered list (UL)
 */
class Tag_List extends Tag
{
    /**
     * @var array
     */
    protected $_listItems = array();

    /**
     * @param array $listItems
     */
    public function __construct($listItems = array())
	{
		parent::__construct();
		
		$this->_htmlTag = 'ul';
		$this->_listItems = $listItems;
	}

    /**
     * Add component to list
     *
     * @param Component|null $listItem
     * @return $this;
     */
    public function add(Component $listItem = null)
    {
        return $this->addItem($listItem);
    }

    /**
     * Add item to list (accept raw strings too)
     *
     * @param String|Component $listItem
     * @return $this;
     */
    public function addItem($listItem)
    {
        if (!$listItem instanceof Tag_List_Item)
        {
            $listItem = new Tag_List_Item($listItem);
        }

        return parent::add($listItem);
    }

    /**
     * @return string
     */
    protected function _render()
    {
        foreach ($this->_listItems as $listItem)
        {
            $this->add($listItem);
        }

        return parent::_render();
    }
}
