<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Class Template - view rendered directly from script
 */
class Template extends Component
{
    /**
     * @var View
     */
    protected $_view = null;

    /**
     * @param string $view
     */
    public function __construct($view=null)
    {
        if (!empty($view))
        {
            $this->_view = new View($view);

            if (defined('Kohana') AND defined('Kohana::DEBUG') AND Kohana::$environment == Kohana::DEBUG)
            {
                $this->_viewName = $view;
            }
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value)
    {
        $this->_view->$name = $value;
    }

    /**
     * Renders template to string
     *
     * @return string
     */
    protected function _render()
    {
        $output = '';

        if (!empty($this->_view))
        {
            $output .= $this->_view->render();
        }

        return $output;
    }
}
