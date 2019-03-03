<?php
class HashTable
{
    /** @var array  */
    private $storage = [];
    /** @var int */
    private $hashTableMaxLength;
    /** @var ResolverInterface  */
    private $collisionResolver;
    /**
     * HashTable constructor.
     * @param $hashTableMaxLength
     * @param ResolverInterface $colisionResolver
     */
    public function __construct($hashTableMaxLength, ResolverInterface $colisionResolver)
    {
        $this->hashTableMaxLength = $hashTableMaxLength;
        $this->collisionResolver = $colisionResolver;
    }
    public function write($index, $value) {
        $newIndex = $this->collisionResolver->resolve($index, $this->storage, $this->hashTableMaxLength);
        $this->storage[$newIndex] = $value;
    }
	
	public function read($index) {
		$newIndex = $this->collisionResolver->resolve($index, $this->storage, $this->hashTableMaxLength) - 1;
		$value = $this->storage[$newIndex];
		unset($this->storage[$newIndex]);
		return $value;
	}
}