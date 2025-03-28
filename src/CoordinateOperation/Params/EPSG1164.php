<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(41.0, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-220.0, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-134.0, 'urn:ogc:def:uom:EPSG::9001'),
];
