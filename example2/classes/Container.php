<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Class Container - set of components
 */
class Container extends Component
{
    /**
     * @var Component[]
     */
    protected $_components = array();

    /**
     * Add sub component
     *
     * @param Component|null $component
     * @return $this
     */
    public function add(Component $component = null)
    {
        if (!empty($component))
        {
            $this->_components[] = $component;
        }

        return $this;
    }

    /**
     * Delete all subcomponents
     */
    public function clear()
    {
        foreach ($this->_components as $key => $value)
        {
            unset($this->_components[$key]);
        }
    }

    /**
     * Renders component
     *
     * @return string
     */
    protected function _render()
    {
        $output = '';

        foreach ($this->_components as $component)
        {
            $output .= $component->render().PHP_EOL;
        }

        return $output;
    }
}
