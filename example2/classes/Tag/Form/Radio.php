<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * HTML Radio
 */
class Tag_Form_Radio extends Tag_Form_Input
{
    /**
     * @param string $name
     * @param string $value
     */
    public function __construct($name, $value)
    {
        $this->_htmlParams['type'] = 'radio';

        parent::__construct($name, $value);
    }
}
