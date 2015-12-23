<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Class FriendsManager
 *
 * Provides easy access to "Friend" classes.
 */
class FriendsManager
{
    /**
     * @var Friend_Abstract[]
     */
    protected $_friends = array();

    /**
     * @var Controller_Core
     */
    protected $_controller;

    /**
     * @param Controller_Core $controller
     */
    public function __construct(Controller_Core $controller)
    {
        $this->_controller = $controller;
    }

    /**
     * @param string $name
     * @return Friend_Abstract
     */
    public function get($name)
    {
        if (!isset($this->_friends[$name]))
        {
            $className = 'Friend_'.$name;
            $this->_friends[$name] = new $className($this->_controller);
        }

        return $this->_friends[$name];
    }
}
