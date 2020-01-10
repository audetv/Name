<?php

namespace audetv\Name;

use audetv\Name\helpers\StringHelper;

/**
 * Class Name
 * @package audetv\Name
 * @author Aleksey Gusev <audetv@gmail.com>
 */
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

        $this->name = $this->getFull();
    }

    /**
     * @param bool $lastNameIsFirst
     * @param bool $asInitial
     *
     * @return string
     */
    public function getFull(bool $lastNameIsFirst = true, bool $asInitial = false): string
    {
        if ($lastNameIsFirst) {
            return $this->build()->last()->first($asInitial)->patronymic($asInitial);
        } else {
            return $this->build()->first($asInitial)->patronymic($asInitial, true)->last();
        }
    }

    /**
     * @param bool $asInitial
     * @param bool $addSpace
     *
     * @return Name
     */
    public function patronymic($asInitial = false, $addSpace = false): self
    {
        if ($asInitial) {
            $this->name .= StringHelper::initialLetter($this->patronymic) . '.';
            if ($addSpace) {
                $this->name .= ' ';
            }
        } else {
            $this->name .= $this->patronymic . ' ';
        }
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
        if ($asInitial) {
            $this->name .= StringHelper::initialLetter($this->first) . '.';
            if ($addSpace) {
                $this->name .= ' ';
            }
        } else {
            $this->name .= $this->first . ' ';
        }
        return $this;
    }

    /**
     * @param bool $asInitial
     * @param bool $addSpace
     *
     * @return Name
     */
    public function last($asInitial = false, $addSpace = false): self
    {
        if ($asInitial) {
            $this->name .= StringHelper::initialLetter($this->last) . '.';
            if ($addSpace) {
                $this->name .= ' ';
            }
        } else {
            $this->name .= $this->last . ' ';
        }
        return $this;
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
    public function getFirstWithPatronymic()
    {
        return $this->build()->first()->patronymic();
    }

    /**
     * @param bool $asInitial
     *
     * @return string
     */
    public function getFirstWithLast(bool $asInitial = false): string
    {
        return $this->build()->first($asInitial, true)->last();
    }

    /**
     * @param bool $asInitial
     *
     * @return string
     */
    public function getLastWithFirst(bool $asInitial = false): string
    {
        return $this->build()->last()->first($asInitial);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return trim($this->name);
    }

    /**
     * @return string
     */
    public function getLast(): string
    {
        return $this->last;
    }

    /**
     * @return string
     */
    public function getFirst(): string
    {
        return $this->first;
    }

    /**
     * @return null|string
     */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }
}