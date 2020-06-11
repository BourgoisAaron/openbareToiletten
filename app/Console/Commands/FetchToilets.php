<?php

namespace App\Console\Commands;

use App\Toilet;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class FetchToilets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:toilets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets the toilets from the API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $jsonUrl = 'http://opendata.visitflanders.org/accessibility/services-facilities/public_toilet_v2.json';
        $json = file_get_contents($jsonUrl);
        $toilets = json_decode($json, true);
        foreach ($toilets as $toilet){
            if($toilet['deleted'] == 1 ){
                $toilet['is_active'] = 0;
            }else{
                $toilet['is_active'] = 1;
            }

            Toilet::updateOrCreate(
                ['business_product_id' => $toilet['business_product_id']],
                $toilet
            );
        }
    }
}
