<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(44.3, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfNaturalOrigin' => UnitOfMeasureFactory::makeUnit(-121.0, 'urn:ogc:def:uom:EPSG::9110'),
    'scaleFactorAtNaturalOrigin' => UnitOfMeasureFactory::makeUnit(1.00011, 'urn:ogc:def:uom:EPSG::9201'),
    'falseEasting' => UnitOfMeasureFactory::makeUnit(262467.1916, 'urn:ogc:def:uom:EPSG::9002'),
    'falseNorthing' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9002'),
];
