<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = new categoria();
        $categoria->nombre = 'Presta Prenda';
        $categoria->save();

        $categoria2 = new categoria();
        $categoria2->nombre = 'Banco Azteca';
        $categoria2->save();

        $categoria3 = new categoria();
        $categoria3->nombre = 'Comercio';
        $categoria3->save();
    }
}
