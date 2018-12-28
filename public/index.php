<?php
/**
 * Created by PhpStorm.
 * User: Гусев
 * Date: 28.12.2018
 * Time: 11:39
 */

use audetv\usualvo\Name\Name;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$name = new Name('Гусев', 'Алексей', 'Валерьевич');

/*echo $name->build([
    (new Part($name->getLast()))->add(' '),
    (new Part(StringHelper::initialLetter($name->getFirst())))->add('.'),
    (new Part(StringHelper::initialLetter($name->getPatronymic())))->add('.'),
    ]).'<br />';*/
//echo $name->last()->add(' ')->first(true)->add('.')->patronymic(true)->add('.')->show().'<br />';
echo $name->getFull(true).'<br />';
echo $name->getFull(false).'<br />';
echo $name->getFirstWithPatronymic().'<br />';
echo $name->getFirstWithLast().'<br />';
echo $name->getLastWithFirst().'<br />';