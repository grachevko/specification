<?php

declare(strict_types=1);

namespace Premier\Specification;

/**
 * @author Konstantin Grachev <me@grachevko.ru>
 */
final class NotSpecification extends Specification
{
    /**
     * @var SpecificationInterface
     */
    private $specification;

    public function __construct(SpecificationInterface $specification)
    {
        $this->specification = $specification;
    }

    /**
     * {@inheritdoc}
     */
    public function isSatisfiedBy(object $object): bool
    {
        return !$this->specification->isSatisfiedBy($object);
    }
}
