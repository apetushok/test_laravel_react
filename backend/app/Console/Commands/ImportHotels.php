<?php

namespace App\Console\Commands;

use App\Services\HotelService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ImportHotels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:hotels';

    /**
     * @var string
     */
    protected $description = 'Import hotels from a csv file';

    /**
     * @param HotelService $hotelService
     * @return int
     */
    public function handle(HotelService $hotelService)
    {
        try {
            $hotelService->importData(storage_path('app/private/hotels.csv'));
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return Command::FAILURE;
        }
    }
}
