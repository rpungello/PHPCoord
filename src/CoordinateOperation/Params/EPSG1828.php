<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(-37.0, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(157.0, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(85.0, 'urn:ogc:def:uom:EPSG::9001'),
];
