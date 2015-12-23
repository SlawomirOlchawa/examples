<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Shortcut for creating form to "link" by POST (e.g. "link" to delete items)
 */
class Tag_Form_PostLink extends Tag_Form
{
    /**
     * @param string $action
     * @param string $caption
     * @param string $key
     * @param string $value
     * @param bool $confirm
     */
    public function __construct($action, $caption, $key, $value, $confirm = true)
	{
        parent::__construct(URL::site($action));

        $hidden = new Tag_Form_Hidden($key, $value);
        $this->add($hidden);

        $submit = new Tag_Form_Submit($caption);
        $submit->addCSSClass('post_link');
        $this->add($submit);

        $token = Helper_Token::get();

        $tokenHidden = new Tag_Form_Hidden('token', $token);
        $this->add($tokenHidden);

        if ($confirm)
        {
            $submit->addCSSClass('confirm_required');
        }
	}				
}
