<?php

declare(strict_types=1);

namespace App\Providers;

use App\Application\Repositories\ApiLocationsRepository;
use App\Domain\Repositories\ILocationsRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class LocationsGetterProvider
 *
 * @package App\Providers
 */
class LocationsGetterProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->app->bind(
            ILocationsRepository::class,
            ApiLocationsRepository::class
        );
    }
}
