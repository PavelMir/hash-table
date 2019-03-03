<?php
require_once __DIR__ . '/collisionResolverInterface.php';
class ResolveCollisionsPlus1 implements ResolverInterface
{
    public function resolve($index, $hranilishche, $size)
    {
        for ($j = $index; ; $j++) {
            if ($j >= $size) {
                    throw Exception('Our table is full');
            }
            if (
                isset($hranilishche[$j])
                && !empty($hranilishche[$j])) {
                continue;
            } else {
                return $j;
            }
        }
    }
}