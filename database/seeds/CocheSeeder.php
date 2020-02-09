<?php

use Illuminate\Database\Seeder;
use App\Coche;

class CocheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('coches')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");

        Coche::create([
            'matricula'=>'1234-SDR',
            'modelo'=>'megane',
            'color'=>'Rojo',
            'tipo'=>'Diesel',
            'klms'=>'1236',
            'pvp'=>'14000',
            'marca_id'=>'1'
        ]);
        Coche::create([
            'matricula'=>'1244-ADR',
            'modelo'=>'trafic',
            'color'=>'Blanco',
            'tipo'=>'Gasolina',
            'klms'=>'1426',
            'pvp'=>'12000',
            'marca_id'=>'1'
        ]);
        Coche::create([
            'matricula'=>'9234-SDR',
            'modelo'=>'350 AMG',
            'color'=>'Negro',
            'tipo'=>'Diesel',
            'klms'=>'0000',
            'pvp'=>'40000',
            'marca_id'=>'3'
        ]);
        Coche::create([
            'matricula'=>'8426-SLR',
            'modelo'=>'4 Matic',
            'color'=>'Blanco',
            'tipo'=>'Diesel',
            'klms'=>'15',
            'pvp'=>'30000',
            'marca_id'=>'3'
        ]);
        Coche::create([
            'matricula'=>'1634-ÑPR',
            'modelo'=>'530D',
            'color'=>'Gris',
            'tipo'=>'Diesel',
            'klms'=>'1256',
            'pvp'=>'14000',
            'marca_id'=>'4'
        ]);
        Coche::create([
            'matricula'=>'1784-SDR',
            'modelo'=>'Astra',
            'color'=>'Azul',
            'tipo'=>'Diesel',
            'klms'=>'4502',
            'pvp'=>'1500',
            'marca_id'=>'5'
        ]);
        Coche::create([
            'matricula'=>'1785-SDR',
            'modelo'=>'Corsa',
            'color'=>'Negro',
            'tipo'=>'Gasolina',
            'klms'=>'4521',
            'pvp'=>'2000',
            'marca_id'=>'5'
        ]);


    }
}
