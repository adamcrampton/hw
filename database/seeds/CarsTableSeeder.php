<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

use App\Models\Car;
use App\Models\Series;
use App\Models\Type;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainline = Type::where('name', 'Mainline')->first()->id;

        Car::insert([
            [
                'number' => '',
                'name' => '',
                'colour' => '',
                'year' => 2020,
                'type_id' => $mainline,
                'series_id' => Series::where('name', '')->first()->id,
                'series_number' => '',
                'treasure_hunt' => 0,
                'super_treasure_hunt' => 0,
                'owned' => 0,
                'notes' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
