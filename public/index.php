<?php
/**
 * Created by PhpStorm.
 * User: Гусев
 * Date: 28.12.2018
 * Time: 11:39
 */


use audetv\Name\Name;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$name = new Name('Иванов', 'Иван', 'Иванович');

//echo $name->build()->last()->first(true)->patronymic(true).'<br />';
//$name = $name->build()->last();
echo $name.'<br />';
echo $name->getFull(true, true).'<br />';
echo $name->getFull(false, true).'<br />';
echo $name->getFirstWithPatronymic().'<br />';
echo $name->getFirstWithLast(true).'<br />';
echo $name->getLastWithFirst(true).'<br />';