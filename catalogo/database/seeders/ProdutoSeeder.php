<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoSeeder extends Seeder
{
    public function run()
    {
        $produtos = [
            [
                'nome' => 'Smartphone Samsung Galaxy',
                'descricao' => 'Smartphone com tela de 6.5 polegadas, 128GB de armazenamento',
                'preco' => 1299.99,
                'categoria' => 'Eletrônicos'
            ],
            [
                'nome' => 'Notebook Dell Inspiron',
                'descricao' => 'Notebook com processador Intel i5, 8GB RAM, SSD 256GB',
                'preco' => 2499.90,
                'categoria' => 'Eletrônicos'
            ],
            [
                'nome' => 'Camiseta Nike Dri-FIT',
                'descricao' => 'Camiseta esportiva com tecnologia Dri-FIT',
                'preco' => 89.90,
                'categoria' => 'Roupas'
            ],
            [
                'nome' => 'Tênis Adidas Ultraboost',
                'descricao' => 'Tênis de corrida com tecnologia Boost',
                'preco' => 599.99,
                'categoria' => 'Esportes'
            ],
            // Adicione mais produtos conforme necessário
        ];

        foreach ($produtos as $produtoData) {
            $categoria = Categoria::where('nome', $produtoData['categoria'])->first();
            
            Produto::create([
                'nome' => $produtoData['nome'],
                'descricao' => $produtoData['descricao'],
                'preco' => $produtoData['preco'],
                'categoria_id' => $categoria->id
            ]);
        }
    }
}