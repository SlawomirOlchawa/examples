<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Single Tag (e.g. IMG)
 *
 * @property $id
 */
class TagSingle extends Component
{
	/**
	 * @var string
	 */
	protected $_htmlTag;

	/**
	 * @var array
	 */
	protected $_htmlParams = array();

	/**	 
	 * @var array
	 */
	protected $_cssClasses = array();
	
	/**	 
	 * @var array inline css attributes
	 */
	protected $_cssInline = array();

    public function __construct()
	{
        if (defined('Kohana') AND defined('Kohana::DEBUG') AND Kohana::$environment == Kohana::DEBUG)
        {
		    $this->_cssClasses[] = get_class($this);
        }
	}

	/**
	 * Add CSS class to HTML tag
     *
	 * @param string $class
	 */
	public function addCSSClass($class)
	{
		$this->_cssClasses[] = $class;
	}

    /**
     * Set HTML param's value
     *
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function set($key, $value)
    {
        $this->_htmlParams[$key] = $value;

        return $this;
    }

    /**
     * Set HTML param's value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        return $this->set('value', $value);
    }

    /**
     * Hide item
     *
     * @return $this
     */
    public function hide()
    {
        $this->_cssInline['display'] = 'none';

        return $this;
    }

    /**
     * Magic setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * Render HTML code
     */
    protected function _render()
    {
        $htmlParams = '';

        foreach ($this->_htmlParams as $key=>$value)
        {
            $htmlParams .= ' '.$key.'="'.$value.'"';
        }

        $output = $this->_htmlTag.
            $this->_classesToString($this->_cssClasses, 'class').
            $this->_stylesToString($this->_cssInline).
            $this->_paramsToString($this->_htmlParams);

        if (!empty($output))
        {
            $output = '<'.$output.$this->_closeTag();
        }

        return $output;
    }

    /**
     * @return string
     */
    protected function _closeTag()
    {
        return '/>';
    }

    /**
     * @param array $classes
     * @return string
     */
    protected function _classesToString($classes)
    {
        $result = '';

        if (count($classes) > 0)
        {
            $class = implode(' ', $classes);
            $result = ' class="'.htmlspecialchars($class, ENT_QUOTES).'"';
        }

        return $result;
    }

    /**
     * @param array $styles
     * @return string
     */
    protected function _stylesToString($styles)
    {
        $result = '';
        $array = array();

        foreach ($styles as $key=>$value)
        {
            $array[] = $key.':'.$value.';';
        }

        if (count($array)>0)
        {
            $style = implode(' ', $array);
            $result = ' style="'.htmlspecialchars($style, ENT_QUOTES).'"';
        }

        return $result;
    }

    /**
     * @param array $params
     * @return string
     */
    protected function _paramsToString($params)
    {
        $result = '';

        foreach ($params as $key=>$value)
        {
            $result .= ' '.$key.'="'.htmlspecialchars($value, ENT_QUOTES).'"';
        }

        return $result;
    }
}
