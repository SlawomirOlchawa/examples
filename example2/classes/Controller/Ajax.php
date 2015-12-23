<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Class Controller_Ajax
 */
class Controller_Ajax extends Controller_Core
{
    /**
     * @var View
     */
    public $template = 'ajax.html';

    /**
     * @var Request
     */
    protected $_request;

    /**
     * Main action
     */
    public function action_index()
    {
        $url = $this->request->query('url');
        $this->_request = Request::factory($url);
        $this->_request->query($this->request->query());
        $this->_request->post($this->request->post());
        $response = $this->_request->execute();
        $this->template->set('body', $response->body());
    }
}
