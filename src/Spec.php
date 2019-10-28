<?php

declare(strict_types=1);

namespace Premier\Specification;

/**
 * @author Konstantin Grachev <me@grachevko.ru>
 */
final class Spec
{
    private function __construct()
    {
    }

    public static function and(SpecificationInterface ...$specification): SpecificationInterface
    {
        return new AndSpecification(...$specification);
    }

    public static function or(SpecificationInterface ...$specification): SpecificationInterface
    {
        return new OrSpecification(...$specification);
    }

    public static function not(SpecificationInterface $specification): SpecificationInterface
    {
        return new NotSpecification($specification);
    }
}
