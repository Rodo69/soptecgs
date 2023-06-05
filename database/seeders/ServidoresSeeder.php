<?php

namespace Database\Seeders;

use App\Models\servidores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServidoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servidores = new servidores();
        $servidores->nombre = 'Servidor de base de datos';
        $servidores->sucursalasig = '';
        $servidores->ip = '1932304';
        $servidores->mascara = '255.255.255';
        $servidores->gateway = ' 873NEJI8I3';
        $servidores->dns = ' 873NEJI8I3';
        $servidores->imagen = 'file';
        $servidores->status = 'activo';
        $servidores->save();

    }
}
