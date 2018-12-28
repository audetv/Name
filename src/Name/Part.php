<?php
/**
 * Created by PhpStorm.
 * User: Гусев
 * Date: 28.12.2018
 * Time: 15:11
 */

namespace audetv\usualvo\Name;


class Part
{
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function add(string $char)
    {
        $part = clone $this;
        $part->value .= $char;
        return $part;
    }
}