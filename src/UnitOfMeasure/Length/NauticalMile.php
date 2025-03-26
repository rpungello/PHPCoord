<?php

/**
 * PHPCoord.
 *
 * @author Rob Pungello
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

class NauticalMile extends Length
{
    private float $length;

    public function __construct(float $length)
    {
        $this->length = $length;
    }

    public function asMetres(): Metre
    {
        return new Metre($this->length * 1852);
    }

    public function getValue(): float
    {
        return $this->length;
    }

    public function getUnitName(): string
    {
        return 'nautical mile';
    }
}
