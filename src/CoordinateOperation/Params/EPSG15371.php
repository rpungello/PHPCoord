<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'latitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(42.0, 'urn:ogc:def:uom:EPSG::9110'),
    'longitudeOfFalseOrigin' => UnitOfMeasureFactory::makeUnit(-90.0, 'urn:ogc:def:uom:EPSG::9110'),
    'latitudeOf1stStandardParallel' => UnitOfMeasureFactory::makeUnit(44.04, 'urn:ogc:def:uom:EPSG::9110'),
    'latitudeOf2ndStandardParallel' => UnitOfMeasureFactory::makeUnit(42.44, 'urn:ogc:def:uom:EPSG::9110'),
    'eastingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(1968500.0, 'urn:ogc:def:uom:EPSG::9003'),
    'northingAtFalseOrigin' => UnitOfMeasureFactory::makeUnit(0.0, 'urn:ogc:def:uom:EPSG::9003'),
];
