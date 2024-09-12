<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Receta;
use App\Models\Categoria;
use App\Models\Etiqueta;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(29)->create();

        User::factory()->create([
            'name' => 'Alex Rodriguez',
            'email' => 'arodriguez@deus.com',
        ]);

        Categoria::factory(10)->create();
        Receta::factory(100)->create();
        Etiqueta::factory(50)->create();


        //Relacion Muchos a Muchos
        $recetas = receta::all();
        $etiquetas = etiqueta::all();

        foreach ($recetas as $receta) { 
            $receta->etiquetas()->attach($etiquetas->random(rand(2,4)));
        }
    }
}
