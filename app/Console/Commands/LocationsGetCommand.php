<?php

namespace App\Console\Commands;

use App\Domain\Services\LocationsGetter\Dto\RequestDto as LocationGetterRequest;
use App\Domain\Services\LocationsGetter\Exception\LocationsReceivingFailedException;
use App\Domain\Services\LocationsGetter\LocationsGetter;
use Illuminate\Console\Command;

class LocationsGetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'locations:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all available locations from stub';

    /**
     * @var LocationsGetter 
     */
    private $locationsGetter;

    /**
     * LocationsGetCommand constructor.
     *
     * @param LocationsGetter $locationsGetter
     */
    public function __construct(LocationsGetter $locationsGetter)
    {
        $this->locationsGetter = $locationsGetter;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $response = $this->locationsGetter->execute(new LocationGetterRequest());
            dd($response->getList());
        } catch (LocationsReceivingFailedException $exception) {
            $this->info($exception->getMessage());
        }
    }
}
