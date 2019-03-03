<?php
require_once __DIR__.'/CollisionResolvers/collisionResolverInterface.php';
require_once __DIR__.'/CollisionResolvers/collisionResolverPlus1.php';
require_once __DIR__.'/hashFunction.php';
require_once __DIR__.'/hashTable.php';
$hashTableLength = 125;
$hashTable = new HashTable($hashTableLength, new ResolveCollisionsPlus1());//???????
$string = "Ada";
$hashFunction = new HashFunction($string, $hashTableLength);
$hashTable->write($hashFunction(), $string);//передаем в хэштэйбл результат работы $hashFunction __invoke() и строку?????
var_dump($hashTable);