<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Class Component - base class for logic of presentation
 */
abstract class Component
{
    /**
     * @var null|array
     */
    protected $_cacheSettings = null;

    /**
     * Renders whole component
     *
     * @return string
     */
    public function render()
    {
        if (empty($this->_cacheSettings))
        {
            $content = $this->_render();
        }
        else
        {
            $cache = Cache::instance();

            $content = $cache->get($this->_cacheSettings['name']);

            if (empty($content))
            {
                $content = $this->_render();
                $cache->set($this->_cacheSettings['name'], $content, $this->_cacheSettings['lifetime']);
            }
        }

        return $this->_decorate($content);
    }

    /**
     * Set component to be cached
     *
     * @param string $name
     * @param int|null $lifetime
     */
    public function cache($name, $lifetime = null)
    {
        if (defined('Kohana') AND Kohana::$environment !== Kohana::PRODUCTION) return;

        $this->_cacheSettings = array('name' => $name, 'lifetime' => $lifetime);
    }

    /**
     * Renders inner part of component
     *
     * @return string
     */
    abstract protected function _render();

    /**
     * Add extra info to output (border, debug info...)
     *
     * @param string $content
     * @return string
     */
    protected function _decorate($content)
    {
        $result = $content;

        if (defined('Kohana') AND defined('Kohana::DEBUG') AND Kohana::$environment == Kohana::DEBUG)
        {
            $viewName = null;

            if (!empty($this->_viewName))
            {
                $viewName = ' ("'.$this->_viewName.'")';
            }

            $result = '<fieldset><legend>'.get_class($this).$viewName.'</legend>'.
                PHP_EOL.$content.'</fieldset>'.PHP_EOL;
        }

        return $result;
    }
}
