<?php
class HashFunction
{
    private $valueToHash;
    private $hashTableLength;
    /**
     * HashFunction constructor.
     * @param $valueToHash
     * @param $hashTableLength
     */
    public function __construct($valueToHash, $hashTableLength)
    {
        $this->valueToHash = $valueToHash;
        $this->hashTableLength = $hashTableLength;
    }
    public function __invoke()//позволяет вызывать объект как функцию
    {
        $sumOfAsciiCodes = 0;
        for ($i = 0, $strLen = strlen($this->valueToHash); $i < $strLen; $i++) {//strlen - длинна строки
            $letter = $this->valueToHash[$i];
            $sumOfAsciiCodes += ord($letter);//ord -- Возвращает ASCII код символа
        }
        return $sumOfAsciiCodes % $this->hashTableLength;
    }
}

//разбивает строку на буквы и переводит их в ASCII, потом сумму ASCII делит на 125