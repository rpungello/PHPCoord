<?php

/**
 * PHPCoord.
 *
 * @author Rob Pungello
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class NauticalMileTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new NauticalMile(0.00006479482);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEqualsWithDelta(0.12, $asMetre->getValue(), 0.00000001);
    }

    public function testGetValue(): void
    {
        $original = new NauticalMile(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new NauticalMile(0.12);
        self::assertEquals('nautical mile', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new NauticalMile(1))->add(new NauticalMile(2));
        self::assertInstanceOf(NauticalMile::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new NauticalMile(4))->subtract(new NauticalMile(3));
        self::assertInstanceOf(NauticalMile::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new NauticalMile(1))->multiply(2.5);
        self::assertInstanceOf(NauticalMile::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new NauticalMile(3))->divide(2);
        self::assertInstanceOf(NauticalMile::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}
