<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Checkbox
 */
class Tag_Form_Checkbox extends Tag_Form_Input
{
    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name, $value)
    {
        $this->_htmlParams['type'] = 'checkbox';

        parent::__construct($name, $value);
    }
}
