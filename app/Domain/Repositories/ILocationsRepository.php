<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Exceptions\Repositories\Locations\LocationsRepositoryUnavailableException;
use App\Domain\ValueObjects\Location;

/**
 * Interface ILocationsRepository
 *
 * @package App\Domain\Repositories
 */
interface ILocationsRepository
{
    /**
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return Location[]
     * @throws LocationsRepositoryUnavailableException
     */
    public function get(?int $limit = null, ?int $offset = null): array;
}
