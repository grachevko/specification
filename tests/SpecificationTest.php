<?php

declare(strict_types=1);

namespace Premier\Specification\Tests;

use PHPUnit\Framework\TestCase;
use Premier\Specification\Spec;
use Premier\Specification\Specification;
use Premier\Specification\SpecificationInterface;

/**
 * @author Konstantin Grachev <me@grachevko.ru>
 */
final class SpecificationTest extends TestCase
{
    /**
     * @dataProvider specificationDataProvider
     */
    public function testSpecification(SpecificationInterface $specification, bool $result): void
    {
        self::assertSame($result, $specification->isSatisfiedBy(new \stdClass()));
    }

    public function specificationDataProvider(): \Generator
    {
        $true = new StubSpecification(true);
        $false = new StubSpecification(false);

        yield [Spec::and($true, $true), true];
        yield [Spec::and($true, $false), false];
        yield [Spec::and($false, $false), false];

        yield [Spec::or($true, $false), true];
        yield [Spec::or($false, $true), true];
        yield [Spec::or($false, $false), false];

        yield [$true->and($false), false];
        yield [$true->and($true), true];
        yield [$true->or($false), true];
        yield [$true->or($true), true];

        yield [$false->and($true), false];
        yield [$false->and($false), false];
        yield [$false->or($true), true];
        yield [$false->or($false), false];

        yield [Spec::not($true), false];
        yield [Spec::not($false), true];
    }
}

final class StubSpecification extends Specification
{
    /**
     * @var bool
     */
    private $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function isSatisfiedBy(object $object): bool
    {
        return $this->value;
    }
}
