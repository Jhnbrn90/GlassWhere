<?php

use App\Glassware;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $volumes = [
          '10 mL',
          '25 mL',
          '50 mL',
          '100 mL',
          '250 mL',
          '500 mL',
          '1 L',
          '2 L'
        ];

        foreach ($volumes as $volume) {
          Glassware::create([
            'name'  =>  $volume,
            'type'  => 'roundbottom',
          ]);  
        }

        foreach ($volumes as $volume) {
          Glassware::create([
            'name'  =>  $volume,
            'type'  => 'erlenmeyer',
          ]);  
        }

        foreach ($volumes as $volume) {
          Glassware::create([
            'name'  =>  $volume,
            'type'  => 'separation funnel',
          ]);  
        }

        foreach ($volumes as $volume) {
          Glassware::create([
            'name'  =>  $volume,
            'type'  => 'measuring cylinder',
          ]);  
        }

        foreach ($volumes as $volume) {
          Glassware::create([
            'name'  =>  $volume,
            'type'  => 'beaker',
          ]);  
        }
        
    }
}
