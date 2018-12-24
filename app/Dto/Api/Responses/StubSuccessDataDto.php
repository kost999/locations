<?php

declare(strict_types=1);

namespace App\Dto\Api\Responses;

use App\Domain\ValueObjects\Location;

/**
 * Class StubSuccessDataDto
 *
 * @package App\Dto\Api\Responses
 */
class StubSuccessDataDto
{
    /**
     * @var Location[]
     */
    private $locations;

    /**
     * StubSuccessDataDto constructor.
     *
     * @param Location[] $locations
     */
    public function __construct(array $locations)
    {
        $this->locations = $locations;
    }

    /**
     * @return Location[]
     */
    public function getLocations(): array
    {
        return $this->locations;
    }
}
