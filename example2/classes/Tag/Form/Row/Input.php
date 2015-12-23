<?php
/**
 * @author Sławomir Olchawa <slawooo@gmail.com>
 */

/**
 * Form row - label and input
 */
class Tag_Form_Row_Input extends Tag_Form_Row
{
    /**
     * @param string $text
     * @param string $name
     * @param null|string $value
     * @param null|string $type
     * @param bool $required
     */
    public function __construct($text, $name, $value=null, $type=null, $required=false)
    {
        $input = new Tag_Form_Input($name, $value);

        if (!empty($type))
        {
            $input->type = $type;
        }

        parent::__construct($text, $input, $required);
    }
}
