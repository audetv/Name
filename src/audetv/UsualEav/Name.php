<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27.12.2018
 * Time: 21:33
 */

namespace audetv\UsualEav;


use audetv\Helper;

class Name
{
    public $last;
    public $first;
    public $middle;

    /**
     * Name constructor.
     *
     * @param string $last
     * @param string $first
     * @param null|string $middle
     */
    public function __construct(string $last, string $first, ?string $middle)
    {
        $this->last = $last;
        $this->first = $first;
        $this->middle = $middle;
    }

    /**
     * @return string
     */
    public function getFull(): string
    {
        return trim(Helper::ucfirst($this->last) . ' ' . Helper::ucfirst($this->first) . ' ' . Helper::ucfirst($this->middle));
    }

    public function getFirstWithLast()
    {
        return trim($this->first . ' ' . $this->last);
    }

    /**
     * @param string $encoding
     * default value is UTF-8
     *
     * @return string
     */
    public function getLastWithInitials($encoding = 'UTF-8')
    {
        $middleInitial = ($this->middle) ? Helper::initial($this->middle, $encoding) . '. ' : '';

        return trim(
            Helper::ucfirst($this->last, $encoding) . ' ' . Helper::initial($this->first,
                $encoding) . '. ' . $middleInitial
        );
    }

    public function lastWithFirstInitial($encoding = 'UTF-8')
    {
        return trim($this->last . ' ' . $this->firstInitial($encoding));
    }

    public function lastInitial($encoding = 'UTF-8')
    {
        return Helper::initial($this->last, $encoding);
    }

    public function firstInitial($encoding = 'UTF-8')
    {
        return Helper::initial($this->first, $encoding);
    }

    public function middleInitial($encoding = 'UTF-8')
    {
        return Helper::initial($this->middle, $encoding);

    }
}