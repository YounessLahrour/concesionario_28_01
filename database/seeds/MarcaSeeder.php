<?php
use Illuminate\Database\Seeder;
use App\Marca;
class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      /*  DB::table('marcas')->insert([
            'nombre'=>'seat',
            'pais'=>'Espala'
        ]);*/
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('marcas')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        
        Marca::create([
            'nombre'=>'renault',
            'pais'=>'Francia'
        ]);

        Marca::create([
            'nombre'=>'citroen',
            'pais'=>'Francia'
        ]);

        Marca::create([
            'nombre'=>'mercedes',
            'pais'=>'Alemania'
        ]);

        Marca::create([
            'nombre'=>'bmw',
            'pais'=>'Alemania'
        ]);

        Marca::create([
            'nombre'=>'Opel',
            'pais'=>'Alemania'
        ]);

        Marca::create([
            'nombre'=>'ford',
            'pais'=>'USA'
        ]);

    }
}
