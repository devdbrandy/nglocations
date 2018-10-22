<?php

use App\Models\LGA;
use App\Models\City;
use App\Models\Zone;
use App\Models\State;
use League\Csv\Reader;
use Illuminate\Database\Seeder;

class CsvDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->zones();
        $this->states();
        $this->lgas();
        $this->cities();
    }

    /**
     * Seed zones from csv file
     *
     * @return void
     */
    public function zones()
    {
        $file = database_path('csv/gp_zones.csv');
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            $zone = new Zone;
            $zone->code = $record['CODE'];
            $zone->name = $record['GP-ZONE'];
            $zone->save();
        }
    }

    /**
     * Seed states from csv file
     *
     * @return void
     */
    public function states()
    {
        $file1 = database_path('csv/states.csv');
        $csv1 = Reader::createFromPath($file1, 'r');

        $file2 = database_path('csv/states_capital.csv');
        $csv2 = Reader::createFromPath($file2, 'r');
        $csv2->setHeaderOffset(0);

        foreach ($csv2 as $key => $record) {
            $csv1->setHeaderOffset($key);

            $state = new State;
            $state->code = $record['CODE'];
            $state->name = $record['STATE'];
            $state->capital = $record['CAP'];
            $state->zone_code = $csv1->getHeader()[2];
            $state->lat = $record['LAT'];
            $state->lon = $record['LON'];
            $state->save();
        }
    }

    /**
     * Seed local government from csv file
     *
     * @return void
     */
    public function lgas()
    {
        $file = database_path('csv/lgas.csv');
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            $lga = new LGA;
            $lga->state_id = State::whereCode($record['CODE'])->first()->id;
            $lga->name = $record['LGA'];
            $lga->lat = $record['LAT'];
            $lga->lon = $record['LON'];
            $lga->save();
        }
    }

    /**
     * Seed cities from csv file
     *
     * @return void
     */
    public function cities()
    {
        $file = database_path('csv/cities.csv');
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            $city = new City;
            $city->state_id = State::whereCode($record['CODE'])->first()->id;
            $city->name = $record['CITY'];
            $city->save();
        }
    }
}
