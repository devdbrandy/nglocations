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

    public function zones()
    {
        $file = database_path('csv/gp_zones.csv');
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            $gpZone = new Zone;
            $gpZone->code = $record['CODE'];
            $gpZone->zone = $record['GP-ZONE'];
            $gpZone->save();
        }
    }

    public function states()
    {
        $file1 = database_path('csv/states.csv');
        $csv1 = Reader::createFromPath($file1, 'r');

        $file2 = database_path('csv/states_capital.csv');
        $csv2 = Reader::createFromPath($file2, 'r');
        $csv2->setHeaderOffset(0);

        foreach ($csv2 as $key => $record) {
            $csv1->setHeaderOffset($key);

            $gpZone = new State;
            $gpZone->code = $record['CODE'];
            $gpZone->name = $record['STATE'];
            $gpZone->capital = $record['CAP'];
            $gpZone->zone_code = $csv1->getHeader()[2];
            $gpZone->lat = $record['LAT'];
            $gpZone->lon = $record['LON'];
            $gpZone->save();
        }
    }

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
