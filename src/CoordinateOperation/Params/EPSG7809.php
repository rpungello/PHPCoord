<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);
use PHPCoord\UnitOfMeasure\UnitOfMeasureFactory;

/** @internal */ return [
    'xAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.908, 'urn:ogc:def:uom:EPSG::9001'),
    'yAxisTranslation' => UnitOfMeasureFactory::makeUnit(-2.0161, 'urn:ogc:def:uom:EPSG::9001'),
    'zAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.5653, 'urn:ogc:def:uom:EPSG::9001'),
    'xAxisRotation' => UnitOfMeasureFactory::makeUnit(28.971, 'urn:ogc:def:uom:EPSG::1031'),
    'yAxisRotation' => UnitOfMeasureFactory::makeUnit(10.42, 'urn:ogc:def:uom:EPSG::1031'),
    'zAxisRotation' => UnitOfMeasureFactory::makeUnit(8.928, 'urn:ogc:def:uom:EPSG::1031'),
    'scaleDifference' => UnitOfMeasureFactory::makeUnit(1.1, 'urn:ogc:def:uom:EPSG::1028'),
    'rateOfChangeOfXAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0001, 'urn:ogc:def:uom:EPSG::1042'),
    'rateOfChangeOfYAxisTranslation' => UnitOfMeasureFactory::makeUnit(0.0001, 'urn:ogc:def:uom:EPSG::1042'),
    'rateOfChangeOfZAxisTranslation' => UnitOfMeasureFactory::makeUnit(-0.0018, 'urn:ogc:def:uom:EPSG::1042'),
    'rateOfChangeOfXAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.02, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfYAxisRotation' => UnitOfMeasureFactory::makeUnit(0.105, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfZAxisRotation' => UnitOfMeasureFactory::makeUnit(-0.347, 'urn:ogc:def:uom:EPSG::1032'),
    'rateOfChangeOfScaleDifference' => UnitOfMeasureFactory::makeUnit(0.08, 'urn:ogc:def:uom:EPSG::1030'),
    'parameterReferenceEpoch' => UnitOfMeasureFactory::makeUnit(1997.0, 'urn:ogc:def:uom:EPSG::1029'),
];
