<?php

declare(strict_types=1);

namespace Premier\Specification;

/**
 * @author Konstantin Grachev <me@grachevko.ru>
 */
abstract class Specification implements SpecificationInterface
{
    public function and(SpecificationInterface ...$specification): SpecificationInterface
    {
        return new AndSpecification($this, ...$specification);
    }

    public function or(SpecificationInterface ...$specification): SpecificationInterface
    {
        return new OrSpecification($this, ...$specification);
    }
}
