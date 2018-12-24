<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

/**
 * Class Location
 *
 * @package App\Domain\ValueObjects
 */
class Location
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Point
     */
    private $point;

    /**
     * Location constructor.
     *
     * @param string $name
     * @param Point  $point
     */
    public function __construct(string $name, Point $point)
    {
        $this->name  = $name;
        $this->point = $point;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Point
     */
    public function getPoint(): Point
    {
        return $this->point;
    }
}
