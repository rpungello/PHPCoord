<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;

use function array_map;

abstract class Length implements UnitOfMeasure
{
    /**
     * British chain (Benoit 1895 B)
     * Uses Benoit's 1895 British yard-metre ratio as given by Bomford as 39.370113 inches per metre.  Used in West
     * Malaysian mapping.
     */
    public const EPSG_BRITISH_CHAIN_BENOIT_1895_B = 'urn:ogc:def:uom:EPSG::9062';

    /**
     * British chain (Sears 1922 truncated)
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures; this truncated
     * ratio (0.914398, UoM code 9099) then converted to other imperial units. 1 chSe(T) = 22 ydSe(T). Used in
     * metrication of Malaya RSO grid.
     */
    public const EPSG_BRITISH_CHAIN_SEARS_1922_TRUNCATED = 'urn:ogc:def:uom:EPSG::9301';

    /**
     * British chain (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_BRITISH_CHAIN_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9042';

    /**
     * British foot (1936)
     * For the 1936 retriangulation OSGB defines the relationship of 10 feet of 1796 to the International metre through
     * the logarithmic relationship (10^0.48401603 exactly). 1 ft = 0.3048007491…m. Also used for metric conversions
     * in Ireland.
     */
    public const EPSG_BRITISH_FOOT_1936 = 'urn:ogc:def:uom:EPSG::9095';

    /**
     * British foot (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_BRITISH_FOOT_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9041';

    /**
     * British yard (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_BRITISH_YARD_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9040';

    /**
     * Clarke's foot
     * Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to the international
     * metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_CLARKES_FOOT = 'urn:ogc:def:uom:EPSG::9005';

    /**
     * Clarke's link
     * =1/100 Clarke's chain. Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies
     * to the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_CLARKES_LINK = 'urn:ogc:def:uom:EPSG::9039';

    /**
     * Clarke's yard
     * =3 Clarke's feet.  Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to
     * the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_CLARKES_YARD = 'urn:ogc:def:uom:EPSG::9037';

    /**
     * German legal metre
     * Used in Namibia.
     */
    public const EPSG_GERMAN_LEGAL_METRE = 'urn:ogc:def:uom:EPSG::9031';

    /**
     * Gold Coast foot
     * Used in Ghana and some adjacent parts of British west Africa prior to metrication, except for the metrication of
     * projection defining parameters when British foot (Sears 1922) used.
     */
    public const EPSG_GOLD_COAST_FOOT = 'urn:ogc:def:uom:EPSG::9094';

    /**
     * Indian foot
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be
     * J.S.Clark's 1865 value of 0.9144025 metres.
     */
    public const EPSG_INDIAN_FOOT = 'urn:ogc:def:uom:EPSG::9080';

    /**
     * Indian yard
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be
     * J.S.Clark's 1865 value of 0.9144025 metres.
     */
    public const EPSG_INDIAN_YARD = 'urn:ogc:def:uom:EPSG::9084';

    /**
     * US survey foot
     * Used in USA.
     */
    public const EPSG_US_SURVEY_FOOT = 'urn:ogc:def:uom:EPSG::9003';

    /**
     * Centimetre.
     */
    public const EPSG_CENTIMETRE = 'urn:ogc:def:uom:EPSG::1033';

    /**
     * Foot.
     */
    public const EPSG_FOOT = 'urn:ogc:def:uom:EPSG::9002';

    /**
     * Kilometre.
     */
    public const EPSG_KILOMETRE = 'urn:ogc:def:uom:EPSG::9036';

    /**
     * Link
     * =1/100 international chain.
     */
    public const EPSG_LINK = 'urn:ogc:def:uom:EPSG::9098';

    /**
     * Metre
     * SI base unit for length.
     */
    public const EPSG_METRE = 'urn:ogc:def:uom:EPSG::9001';

    /**
     * Millimetre.
     */
    public const EPSG_MILLIMETRE = 'urn:ogc:def:uom:EPSG::1025';

    /**
     * Nautical mile.
     */
    public const EPSG_NAUTICAL_MILE = 'urn:ogc:def:uom:EPSG::9030';

    /**
     * Statute mile.
     */
    public const EPSG_STATUTE_MILE = 'urn:ogc:def:uom:EPSG::9093';

    /**
     * Nautical mile.
     */
    public const EPSG_US_SURVEY_MILE = 'urn:ogc:def:uom:EPSG::9035';

    /**
     * @var array<string, array{name: string, fqcn?: class-string<self>, help: string}>
     */
    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1025' => [
            'name' => 'millimetre',
            'help' => '',
        ],
        'urn:ogc:def:uom:EPSG::1033' => [
            'name' => 'centimetre',
            'help' => '',
        ],
        'urn:ogc:def:uom:EPSG::9001' => [
            'name' => 'metre',
            'help' => 'SI base unit for length.',
        ],
        'urn:ogc:def:uom:EPSG::9002' => [
            'name' => 'foot',
            'help' => '',
        ],
        'urn:ogc:def:uom:EPSG::9003' => [
            'name' => 'US survey foot',
            'help' => 'Used in USA.',
        ],
        'urn:ogc:def:uom:EPSG::9005' => [
            'name' => 'Clarke\'s foot',
            'help' => 'Assumes Clarke\'s 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to the international metre.   Used in older Australian, southern African & British West Indian mapping.',
        ],
        'urn:ogc:def:uom:EPSG::9031' => [
            'name' => 'German legal metre',
            'help' => 'Used in Namibia.',
        ],
        'urn:ogc:def:uom:EPSG::9036' => [
            'name' => 'kilometre',
            'help' => '',
        ],
        'urn:ogc:def:uom:EPSG::9037' => [
            'name' => 'Clarke\'s yard',
            'help' => '=3 Clarke\'s feet.  Assumes Clarke\'s 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to the international metre.   Used in older Australian, southern African & British West Indian mapping.',
        ],
        'urn:ogc:def:uom:EPSG::9039' => [
            'name' => 'Clarke\'s link',
            'help' => '=1/100 Clarke\'s chain. Assumes Clarke\'s 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to the international metre.   Used in older Australian, southern African & British West Indian mapping.',
        ],
        'urn:ogc:def:uom:EPSG::9040' => [
            'name' => 'British yard (Sears 1922)',
            'help' => 'Uses Sear\'s 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East Malaysian and older New Zealand mapping.',
        ],
        'urn:ogc:def:uom:EPSG::9041' => [
            'name' => 'British foot (Sears 1922)',
            'help' => 'Uses Sear\'s 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East Malaysian and older New Zealand mapping.',
        ],
        'urn:ogc:def:uom:EPSG::9042' => [
            'name' => 'British chain (Sears 1922)',
            'help' => 'Uses Sear\'s 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East Malaysian and older New Zealand mapping.',
        ],
        'urn:ogc:def:uom:EPSG::9062' => [
            'name' => 'British chain (Benoit 1895 B)',
            'help' => 'Uses Benoit\'s 1895 British yard-metre ratio as given by Bomford as 39.370113 inches per metre.  Used in West Malaysian mapping.',
        ],
        'urn:ogc:def:uom:EPSG::9080' => [
            'name' => 'Indian foot',
            'help' => 'Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be J.S.Clark\'s 1865 value of 0.9144025 metres.',
        ],
        'urn:ogc:def:uom:EPSG::9084' => [
            'name' => 'Indian yard',
            'help' => 'Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be J.S.Clark\'s 1865 value of 0.9144025 metres.',
        ],
        'urn:ogc:def:uom:EPSG::9094' => [
            'name' => 'Gold Coast foot',
            'help' => 'Used in Ghana and some adjacent parts of British west Africa prior to metrication, except for the metrication of projection defining parameters when British foot (Sears 1922) used.',
        ],
        'urn:ogc:def:uom:EPSG::9095' => [
            'name' => 'British foot (1936)',
            'help' => 'For the 1936 retriangulation OSGB defines the relationship of 10 feet of 1796 to the International metre through the logarithmic relationship (10^0.48401603 exactly). 1 ft = 0.3048007491…m. Also used for metric conversions in Ireland.',
        ],
        'urn:ogc:def:uom:EPSG::9098' => [
            'name' => 'link',
            'help' => '=1/100 international chain.',
        ],
        'urn:ogc:def:uom:EPSG::9301' => [
            'name' => 'British chain (Sears 1922 truncated)',
            'help' => 'Uses Sear\'s 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures; this truncated ratio (0.914398, UoM code 9099) then converted to other imperial units. 1 chSe(T) = 22 ydSe(T). Used in metrication of Malaya RSO grid.',
        ],
        'urn:ogc:def:uom:EPSG::9030' => [
            'name' => 'Nautical mile',
            'help' => 'Exactly 1,852 metres.',
        ],
        'urn:ogc:def:uom:EPSG::9093' => [
            'name' => 'Statute mile',
            'help' => '5,280 feet.',
        ],
        'urn:ogc:def:uom:EPSG::9035' => [
            'name' => 'US survey mile',
            'help' => 'Used in USA primarily for public lands cadastral work.',
        ],
    ];

    abstract public function __construct(float $length);

    abstract public function asMetres(): Metre;

    public function add(self $unit): self
    {
        if ($this::class === $unit::class) {
            return new static($this->getValue() + $unit->getValue());
        }
        $resultAsMetres = new Metre($this->asMetres()->getValue() + $unit->asMetres()->getValue());
        $conversionRatio = (new static(1))->asMetres()->getValue();

        return new static($resultAsMetres->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        if ($this::class === $unit::class) {
            return new static($this->getValue() - $unit->getValue());
        }
        $resultAsMetres = new Metre($this->asMetres()->getValue() - $unit->asMetres()->getValue());
        $conversionRatio = (new static(1))->asMetres()->getValue();

        return new static($resultAsMetres->getValue() / $conversionRatio);
    }

    public function multiply(float $multiplicand): self
    {
        return new static($this->getValue() * $multiplicand);
    }

    public function divide(float $divisor): self
    {
        return new static($this->getValue() / $divisor);
    }

    public static function makeUnit(float $measurement, string $srid): self
    {
        if (isset(self::$sridData[$srid]['fqcn'])) {
            return new self::$sridData[$srid]['fqcn']($measurement);
        }

        return match ($srid) {
            self::EPSG_METRE => new Metre($measurement),
            self::EPSG_KILOMETRE => new Kilometre($measurement),
            self::EPSG_CENTIMETRE => new Centimetre($measurement),
            self::EPSG_MILLIMETRE => new Millimetre($measurement),
            self::EPSG_FOOT => new Foot($measurement),
            self::EPSG_LINK => new Link($measurement),
            self::EPSG_BRITISH_CHAIN_BENOIT_1895_B => new BritishChain1895BenoitB($measurement),
            self::EPSG_BRITISH_FOOT_SEARS_1922 => new BritishFoot1922Sears($measurement),
            self::EPSG_BRITISH_YARD_SEARS_1922 => new BritishYard1922Sears($measurement),
            self::EPSG_BRITISH_CHAIN_SEARS_1922 => new BritishChain1922Sears($measurement),
            self::EPSG_BRITISH_CHAIN_SEARS_1922_TRUNCATED => new BritishChain1922SearsTruncated($measurement),
            self::EPSG_BRITISH_FOOT_1936 => new BritishFoot1936($measurement),
            self::EPSG_US_SURVEY_FOOT => new USSurveyFoot($measurement),
            self::EPSG_CLARKES_FOOT => new ClarkeFoot($measurement),
            self::EPSG_CLARKES_YARD => new ClarkeYard($measurement),
            self::EPSG_CLARKES_LINK => new ClarkeLink($measurement),
            self::EPSG_INDIAN_FOOT => new IndianFoot($measurement),
            self::EPSG_INDIAN_YARD => new IndianYard($measurement),
            self::EPSG_GOLD_COAST_FOOT => new GoldCoastFoot($measurement),
            self::EPSG_GERMAN_LEGAL_METRE => new GermanLegalMetre($measurement),
            default => throw new UnknownUnitOfMeasureException($srid),
        };
    }

    public static function convert(self $length, string $targetSRID): self
    {
        $conversionRatio = static::makeUnit(1, $targetSRID)->asMetres()->getValue();

        return self::makeUnit($length->asMetres()->getValue() / $conversionRatio, $targetSRID);
    }

    /**
     * @return array<string, string>
     */
    public static function getSupportedSRIDs(): array
    {
        return array_map(fn ($supportedSrid) => $supportedSrid['name'], self::$sridData);
    }

    /**
     * @return array<string, array{name: string, help: string}>
     */
    public static function getSupportedSRIDsWithHelp(): array
    {
        return array_map(fn (array $data) => [
            'name' => $data['name'],
            'help' => $data['help'],
        ], static::$sridData);
    }

    /**
     * @param class-string<self> $implementingClassFQCN
     */
    public static function registerCustomUnit(string $srid, string $name, string $implementingClassFQCN, string $help = ''): void
    {
        self::$sridData[$srid] = [
            'name' => $name,
            'fqcn' => $implementingClassFQCN,
            'help' => $help,
        ];
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
