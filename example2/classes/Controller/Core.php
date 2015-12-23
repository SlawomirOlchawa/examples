<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Class Controller_Core
 */
class Controller_Core extends Controller_Template
{
	/**
	 * @var View
	 */
	public $template = 'default.html';

    /**
     * @var Container
     */
    public $layout;

    /**
     * @var FriendsManager
     */
    protected $_friends;

    /**
     * @return FriendsManager
     */
    public function friends()
    {
        return $this->_friends;
    }

    /**
     * Before action
     */
    public function before()
    {
        $this->layout = new Container();
        $this->_friends = $this->_createFriendsManager();

        if ($this->request->is_initial() AND !$this->request->is_ajax())
        {
            $this->template = 'main.html';
        }

        $this->template = View::factory($this->template);

        $this->_includeMedia();
    }

    /**
     * After action
     */
    public function after()
    {
        $this->template->set('renderedLayout', $this->layout->render());

        parent::after();
    }

    /**
     * Get error message from exception object
     *
     * @param Exception $e
     * @return string
     */
    public function getErrorMessage(Exception $e)
    {
        $msg = null;

        if ($e instanceof ORM_Validation_Exception)
        {
            $errors = $e->errors('model');

            if (isset($errors['_external']))
            {
                $errors = Arr::merge($errors, Arr::get($errors, '_external'));
                unset($errors['_external']);
            }

            $msg = implode(PHP_EOL, $errors);
        }
        else
        {
            $msg = $e->getMessage();
        }

        return $msg;
    }

    /**
     * Override Kohana redirect which works as exception and can be accidentally "caught"
     *
     * @param string $uri
     * @param int $code
     */
    public static function redirect($uri = '', $code = 302)
    {
        if ($code === 301)
        {
            header('HTTP/1.1 301 Moved Permanently');
        }

        if (strpos($uri, '://') === FALSE)
        {
            $index = true;

            if (defined('Kohana'))
            {
                $index = !empty(Kohana::$index_file);
            }

            $uri = URL::site($uri, TRUE, $index);
        }

        header('Location: '.$uri);
        exit();
    }

    /**
     * Link CSS and JS
     */
    protected function _includeMedia()
    {
        //Helper_Includer::addJS('media/app/js/jquery.min.js', 'js-body');
    }

    /**
     * Routes addresses with hyphens to action methods using underscores
     *
     * @throws HTTP_Exception_404
     */
    protected function _routeHyphens()
    {
        if (strpos($this->request->action(), '_') !== false)
        {
            throw new HTTP_Exception_404('The requested URL :uri was not found on this server.',
                array(':uri' => $this->request->uri()));
        }

        $this->request->action(str_replace('-', '_', $this->request->action()));
    }

    /**
     * @return FriendsManager
     */
    protected function _createFriendsManager()
    {
        return new FriendsManager($this);
    }
}
