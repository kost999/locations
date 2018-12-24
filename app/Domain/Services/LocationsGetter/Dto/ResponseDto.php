<?php

declare(strict_types=1);

namespace App\Domain\Services\LocationsGetter\Dto;

use App\Domain\ValueObjects\Location;

/**
 * Class ResponseDto
 *
 * @package App\Domain\Services\LocationsGetter\Dto
 */
class ResponseDto
{
    /**
     * @var Location[]
     */
    private $list;

    /**
     * ResponseDto constructor.
     *
     * @param Location[] $list
     */
    public function __construct(array $list)
    {
        $this->list = $list;
    }

    /**
     * @return Location[]
     */
    public function getList(): array
    {
        return $this->list;
    }
}
