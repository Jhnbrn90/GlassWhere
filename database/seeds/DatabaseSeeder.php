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
          '2 L',
        ];

        $this->createGlasswareForVolumes('roundbottom', $volumes);
        $this->createGlasswareForVolumes('erlenmeyer', array_merge($volumes, ['3 L']));
        $this->createGlasswareForVolumes('separation funnel', array_merge($volumes, ['3 L']));
        $this->createGlasswareForVolumes('measuring cylinder', $volumes);
        $this->createGlasswareForVolumes('beaker', array_merge($volumes, ['3 L']));
        
        $this->createGlasswareForVolumes(
          'dropping funnel', 
          ['10 mL', '25 mL', '50 mL', '100 mL', '250 mL', '500 mL']
        );

        $this->createGlasswareForVolumes(
          'bottle', 
          ['100 mL', '250 mL', '500 mL', '1000 mL']
        );

        $this->createGlasswareForVolumes(
          'stopper', 
          ['NS14', 'NS29', 'other']
        );
        
        $this->createGlasswareForVolumes(
          'schlenk', 
          ['10 mL', '25 mL', '50 mL', '100 mL', '250 mL', '500 mL', '1 L']
        );
        
        $this->createGlasswareForVolumes(
          'three-neck', 
          ['10 mL', '25 mL', '50 mL', '100 mL', '250 mL', '500 mL', '1 L']
        );

        $this->createGlasswareForVolumes(
          'column', 
          ['< 1 cm', '1 - 3 cm', '3 - 4 cm', '4 - 6 cm', '6 - 10 cm', '10+ cm']
        );
        
        $this->createGlasswareForVolumes('schlenk-adapter', ['NS14', 'NS29', 'other']);
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
