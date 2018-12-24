<?php

declare(strict_types=1);

namespace App\Domain\Services\LocationsGetter;

use App\Domain\Exceptions\Repositories\Locations\LocationsRepositoryUnavailableException;
use App\Domain\Repositories\ILocationsRepository;
use App\Domain\Services\LocationsGetter\Dto\RequestDto;
use App\Domain\Services\LocationsGetter\Dto\ResponseDto;
use App\Domain\Services\LocationsGetter\Exception\LocationsReceivingFailedException;

/**
 * Class LocationsGetter
 *
 * @package App\Domain\Services\LocationsGetter
 */
class LocationsGetter
{
    /**
     * @var ILocationsRepository 
     */
    private $locationsRepository;

    /**
     * LocationsGetter constructor.
     *
     * @param ILocationsRepository $locationsRepository
     */
    public function __construct(ILocationsRepository $locationsRepository)
    {
        $this->locationsRepository = $locationsRepository;
    }

    /**
     * @param RequestDto $request
     *
     * @return ResponseDto
     * @throws LocationsReceivingFailedException
     */
    public function execute(RequestDto $request): ResponseDto
    {
        try {
             return new ResponseDto($this->locationsRepository->get($request->getLimit(), $request->getOffset()));
        } catch (LocationsRepositoryUnavailableException $exception) {
            \Log::error($exception->getMessage());
            throw new LocationsReceivingFailedException('Locations receiving failed', 0, $exception);
        }
    }
}
