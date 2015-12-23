<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Class Friend_Abstract
 *
 * This "layer" is a friend of controller - good uncle who does work common for various controllers.
 * Something between action helpers and HMVC subrequests.
 */
abstract class Friend_Abstract
{
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
}
