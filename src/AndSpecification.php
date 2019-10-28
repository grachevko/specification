<?php

declare(strict_types=1);

namespace Premier\Specification;

/**
 * @author Konstantin Grachev <me@grachevko.ru>
 */
final class AndSpecification extends Specification
{
    /**
     * @var SpecificationInterface[]
     */
    private $specification;

    public function __construct(SpecificationInterface ...$specification)
    {
        $this->specification = $specification;
    }

    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(object $object): bool
    {
        foreach ($this->specification as $specification) {
            if (false === $specification->isSatisfiedBy($object)) {
                return false;
            }
        }

        return true;
    }
}
