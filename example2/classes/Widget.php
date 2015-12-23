<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Class Widget - view rendered from another request
 */
class Widget extends Component
{
    /**
     * @var string
     */
    protected $_url;

    /**
     * @var Request
     */
    protected $_request;

    /**
     * @param string $url
     * @param array $get
     * @param array $post
     */
    public function __construct($url, $get = array(), $post = array())
    {
        $this->_url = $url;
		$this->_request = Request::factory($this->_url);
        $this->_request->query($get);
        $this->_request->post($post);
    }

	/**
     * Get URL
     *
	 * @return string
	 */
	public function getUrl()
	{
		return $this->_url;
	}

    /**
     * Render request to string
     *
     * @return View
     */
    protected function _render()
    {
        $response = $this->_request->execute();
        $output = $response->body();

        return $output;
    }
}
