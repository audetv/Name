<?php
/**
 * Created by PhpStorm.
 * User: Гусев
 * Date: 28.12.2018
 * Time: 9:41
 */

namespace audetv\Name;


use audetv\Name\helpers\StringHelper;


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
    public function getFull(bool $lastNameIsFirst = true, bool $asInitial = false): string
    {
        $name = $this->build();

        if ($lastNameIsFirst)
            $name = $name->last()->first($asInitial)->patronymic($asInitial);

        else
            $name = $name->first($asInitial)->patronymic($asInitial, true)->last();

        return $name;
    }

    /**
     * @return string
     */
    public function getFirstWithPatronymic()
    {
        return $this->build()->first()->patronymic();
    }

    /**
     * @return string
     */
    public function getFirstWithLast(bool $asInitial = false): string
    {
        return $this->build()->first($asInitial, true)->last();
    }

    /**
     * @return string
     */
    public function getLastWithFirst(bool $asInitial = false): string
    {
        return $this->build()->last()->first($asInitial);
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
     * @param bool $asInitial
     *
     * @return Name
     */
    public function last($asInitial = false, $addSpace = false): self
    {
        if ($asInitial){
            $this->name .= StringHelper::initialLetter($this->last) . '.';
            if($addSpace)
                $this->name .= ' ';
        }
        else
            $this->name .= $this->last . ' ';
        return $this;
    }

    /**
     * @param bool $asInitial
     * @param bool $addSpace
     *
     * @return Name
     */
    public function first($asInitial = false, $addSpace = false): self
    {
        if ($asInitial){
            $this->name .= StringHelper::initialLetter($this->first) . '.';
            if($addSpace)
                $this->name .= ' ';
        }
        else
            $this->name .= $this->first . ' ';
        return $this;
    }

    /**
     * @param bool $asInitial
     *
     * @return Name
     */
    public function patronymic($asInitial = false, $addSpace = false): self
    {
        if ($asInitial) {
            $this->name .= StringHelper::initialLetter($this->patronymic) . '.';
            if ($addSpace)
                $this->name .= ' ';
        }
        else
            $this->name .= $this->patronymic . ' ';
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return trim($this->name);
    }
}