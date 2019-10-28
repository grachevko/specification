<?php

declare(strict_types=1);

namespace Premier\Specification;

/**
 * @author Konstantin Grachev <me@grachevko.ru>
 */
interface SpecificationInterface
{
    public function isSatisfiedBy(object $object): bool;
}
