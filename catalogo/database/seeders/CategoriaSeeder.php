<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            'Eletrônicos',
            'Roupas',
            'Casa e Jardim',
            'Esportes',
            'Livros',
            'Beleza',
            'Automotivo',
            'Brinquedos'
        ];

        foreach ($categorias as $categoria) {
            Categoria::create(['nome' => $categoria]);
        }
    }
}