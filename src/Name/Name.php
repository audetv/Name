<?php
/**
 * Created by PhpStorm.
 * User: Гусев
 * Date: 28.12.2018
 * Time: 9:41
 */

namespace audetv\usualvo\Name;


use audetv\usualvo\helpers\StringHelper;


class Name
{
    /**
     * A surname, family name, or last name is the portion (in some cultures) of a personal name
     * that indicates a person's family (or tribe or community, depending on the culture).
     * @var string
     */
    private $last;

    /**
     * A given name (also known as a first name) is a part of a person's full name.
     * @var string
     */
    private $first;

    /**
     * A patronymic, or patronym, is a component of a personal name based on the given name of one's father,
     * grandfather, or an earlier male ancestor.
     * @var null|string
     */
    private $patronymic;

    /**
     * @var string
     */
    private $name = '';

    /**
     * Name constructor.
     * @param string $last
     * @param string $first
     * @param null|string $patronymic
     */
    public function __construct(string $last, string $first, ?string $patronymic)
    {
        $this->last = $last;
        $this->first = $first;
        $this->patronymic = $patronymic;
    }


    /**
     * @param bool $lastNameIsFirst
     * @return string
     */
    public function getFull($lastNameIsFirst = true): string
    {
        $name = $this->build();
        if ($lastNameIsFirst)
            $name = $name->last()->add(' ')->first()->add(' ')->patronymic()->add(' ')->show();
        else
            $name = $name->first()->add(' ')->patronymic()->add(' ')->last()->show();

        return $name;
    }

    /**
     * @return string
     */
    public function getFirstWithPatronymic()
    {
        return $this->build()->first()->add(' ')->patronymic()->show();
    }

    /**
     * @return string
     */
    public function getFirstWithLast(): string
    {
        return $this->build()->first()->add(' ')->last()->show();
    }

    /**
     * @return string
     */
    public function getLastWithFirst(): string
    {
        return $this->build()->last()->add(' ')->first(true)->show();
    }

    /**
     * @return $this
     */
    public function build()
    {
        $this->name = '';
        return $this;
    }

    /**
     * @return string
     */
    public function show(): string
    {
        return $this->name;
    }

    /**
     * @param bool $initial
     * @return Name
     */
    public function last($initial = false): self
    {
        if($initial)
            $this->name .= StringHelper::initialLetter($this->last);
        else
            $this->name .= $this->last;
        return $this;
    }

    /**
     * @param bool $initial
     * @return Name
     */
    public function first($initial = false): self
    {
        if($initial)
            $this->name .= StringHelper::initialLetter($this->first);
        else
            $this->name .= $this->first;
        return $this;
    }

    /**
     * @param bool $initial
     * @return Name
     */
    public function patronymic($initial = false): self
    {
        if($initial)
            $this->name .= StringHelper::initialLetter($this->patronymic);
        else
            $this->name .= $this->patronymic;
        return $this;
    }

    /**
     * @param string $char
     * @return $this
     */
    public function add(string $char)
    {
        $this->name .= $char;
        return $this;
    }
}