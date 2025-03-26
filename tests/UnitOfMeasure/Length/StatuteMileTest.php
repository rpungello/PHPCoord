<?php

/**
 * PHPCoord.
 *
 * @author Rob Pungello
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPUnit\Framework\TestCase;

class StatuteMileTest extends TestCase
{
    public function testAsMetres(): void
    {
        $original = new StatuteMile(0.0000745645);
        $asMetre = $original->asMetres();
        self::assertInstanceOf(Metre::class, $asMetre);
        self::assertEqualsWithDelta(0.12, $asMetre->getValue(), 0.000001);
    }

    public function testGetValue(): void
    {
        $original = new StatuteMile(0.12);
        self::assertEquals(0.12, $original->getValue());
    }

    public function testGetUnitName(): void
    {
        $original = new StatuteMile(0.12);
        self::assertEquals('statute mile', $original->getUnitName());
    }

    public function testAdd(): void
    {
        $result = (new StatuteMile(1))->add(new StatuteMile(2));
        self::assertInstanceOf(StatuteMile::class, $result);
        self::assertEquals(3, $result->getValue());
    }

    public function testSubtract(): void
    {
        $result = (new StatuteMile(4))->subtract(new StatuteMile(3));
        self::assertInstanceOf(StatuteMile::class, $result);
        self::assertEquals(1, $result->getValue());
    }

    public function testMultiply(): void
    {
        $result = (new StatuteMile(1))->multiply(2.5);
        self::assertInstanceOf(StatuteMile::class, $result);
        self::assertEquals(2.5, $result->getValue());
    }

    public function testDivide(): void
    {
        $result = (new StatuteMile(3))->divide(2);
        self::assertInstanceOf(StatuteMile::class, $result);
        self::assertEquals(1.5, $result->getValue());
    }
}
