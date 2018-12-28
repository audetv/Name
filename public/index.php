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
//echo $name->build()->last()->first(true)->patronymic(true).'<br />';
//$name = $name->build()->last();
//echo $name;
echo $name->getFull(true, true).'<br />';
echo $name->getFull(false, true).'<br />';
echo $name->getFirstWithPatronymic().'<br />';
echo $name->getFirstWithLast(true).'<br />';
echo $name->getLastWithFirst(true).'<br />';