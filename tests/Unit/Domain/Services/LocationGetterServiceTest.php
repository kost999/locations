<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\Services;

use App\Domain\Exceptions\Repositories\Locations\LocationsRepositoryUnavailableException;
use App\Domain\Repositories\ILocationsRepository;
use App\Domain\Services\LocationsGetter\Dto\RequestDto as LocationsGetterRequest;
use App\Domain\Services\LocationsGetter\Exception\LocationsReceivingFailedException;
use App\Domain\Services\LocationsGetter\LocationsGetter;
use App\Domain\ValueObjects\Location;
use App\Domain\ValueObjects\Point;
use phpmock\phpunit\PHPMock;
use Tests\TestCase;

/**
 * Class LocationGetterServiceTest
 *
 * @package Tests\Unit\Domain\Services
 */
class LocationGetterServiceTest extends TestCase
{
    use PHPMock;
    
    public function testUnavailableRepository(): void
    {
        $locationRepositoryMock = $this->mockObjects(ILocationsRepository::class);
        $locationRepositoryMock->shouldReceive('get')->andThrow(LocationsRepositoryUnavailableException::class);
        
        $locationsGetter = new LocationsGetter($locationRepositoryMock);
        
        $this->expectException(LocationsReceivingFailedException::class);
        $locationsGetter->execute(new LocationsGetterRequest());
    }
    
    public function testSuccess(): void
    {
        $locationRepositoryMock = $this->mockObjects(ILocationsRepository::class);
        $locationRepositoryMock->shouldReceive('get')->andReturn(
            [
                new Location(
                    'test',
                    new Point(
                        21.12,
                        23.32
                    )
                )
            ]
        );
        $locationsGetter = new LocationsGetter($locationRepositoryMock);
        $locationsGetter->execute(new LocationsGetterRequest());
    }
}
