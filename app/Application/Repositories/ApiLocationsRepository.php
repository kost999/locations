<?php

declare(strict_types=1);

namespace App\Application\Repositories;

use App\Domain\Exceptions\Repositories\Locations\LocationsRepositoryUnavailableException;
use App\Domain\Repositories\ILocationsRepository;
use App\Exceptions\Http\Clients\StubClient\StubClientUnavailableException;
use App\Http\Clients\StubClient;

/**
 * Class ApiLocationsRepository
 *
 * @package App\Application\Repositories
 */
class ApiLocationsRepository implements ILocationsRepository
{
    /**
     * @var StubClient
     */
    private $client;

    /**
     * ApiLocationsRepository constructor.
     *
     * @param StubClient $client
     */
    public function __construct(StubClient $client)
    {
        $this->client = $client;
    }

    /**
     * @inheritdoc
     */
    public function get(?int $limit = null, ?int $offset = null): array
    {
        try {
            return $this->client->getLocations($limit, $offset)->getData()->getLocations();
        } catch (StubClientUnavailableException $exception) {
            throw new LocationsRepositoryUnavailableException(
                'Location repository unavailable', 0, $exception
            );
        }
    }
}
