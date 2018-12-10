<?php

use App\Lab;
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
        $this->createLab('4W19');
        $this->createLab('4W35');

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

        $this->createGlasswareForVolumes('roundbottom', $volumes);
        $this->createGlasswareForVolumes('erlenmeyer', $volumes);
        $this->createGlasswareForVolumes('separation funnel', $volumes);
        $this->createGlasswareForVolumes('measuring cylinder', $volumes);
        $this->createGlasswareForVolumes('beaker', $volumes);
    }

    /**
     * Create a new Lab
     *
     * @return void
     */

    public function createLab($lab)
    {
        Lab::create([
          'name' => $lab
        ]);
    }

    /**
     * Add a new glassware type
     * With a defined set of volumes 
     * @return void
     */

    public function createGlasswareForVolumes($type, array $volumes)
    {
        foreach (Lab::all() as $lab) {
          foreach ($volumes as $volume) {
            Glassware::create([
              'name'    =>  $volume,
              'type'    => $type,
              'lab_id'  => $lab->id,
            ]);  
          }
        }
    }

}
