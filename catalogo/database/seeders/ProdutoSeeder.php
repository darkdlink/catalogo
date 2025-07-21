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
            // ELETRÔNICOS
            [
                'nome' => 'iPhone 14 Pro Max',
                'descricao' => 'iPhone com tela Super Retina XDR de 6.7", chip A16 Bionic, câmera pro de 48MP',
                'preco' => 8999.99,
                'categoria' => 'Eletrônicos'
            ],
            [
                'nome' => 'Smartphone Samsung Galaxy S23',
                'descricao' => 'Galaxy S23 com tela Dynamic AMOLED de 6.1", 128GB, câmera tripla de 50MP',
                'preco' => 3499.90,
                'categoria' => 'Eletrônicos'
            ],
            [
                'nome' => 'Notebook Dell Inspiron 15',
                'descricao' => 'Notebook com Intel Core i7, 16GB RAM, SSD 512GB, GeForce RTX 3050',
                'preco' => 4299.00,
                'categoria' => 'Eletrônicos'
            ],
            [
                'nome' => 'MacBook Air M2',
                'descricao' => 'MacBook Air com chip M2, 8GB RAM, SSD 256GB, tela Liquid Retina de 13.6"',
                'preco' => 12999.99,
                'categoria' => 'Eletrônicos'
            ],
            [
                'nome' => 'iPad 10ª Geração',
                'descricao' => 'iPad com tela Liquid Retina de 10.9", chip A14 Bionic, 64GB Wi-Fi',
                'preco' => 3199.00,
                'categoria' => 'Eletrônicos'
            ],
            [
                'nome' => 'Smart TV Samsung 55" 4K',
                'descricao' => 'Smart TV Crystal UHD 4K 55", HDR, Tizen OS, Alexa Built-in',
                'preco' => 2899.99,
                'categoria' => 'Eletrônicos'
            ],
            [
                'nome' => 'PlayStation 5',
                'descricao' => 'Console PS5 com SSD 825GB, controle DualSense, suporte 4K e Ray Tracing',
                'preco' => 4199.90,
                'categoria' => 'Eletrônicos'
            ],

            // ROUPAS
            [
                'nome' => 'Camiseta Nike Dri-FIT',
                'descricao' => 'Camiseta esportiva masculina com tecnologia Dri-FIT para absorção do suor',
                'preco' => 129.99,
                'categoria' => 'Roupas'
            ],
            [
                'nome' => 'Calça Jeans Levis 501',
                'descricao' => 'Calça jeans masculina corte reto, 100% algodão, tradicional Levi\'s 501',
                'preco' => 349.90,
                'categoria' => 'Roupas'
            ],
            [
                'nome' => 'Vestido Floral Primavera',
                'descricao' => 'Vestido feminino midi com estampa floral, tecido viscose, manga curta',
                'preco' => 189.99,
                'categoria' => 'Roupas'
            ],
            [
                'nome' => 'Jaqueta de Couro Preta',
                'descricao' => 'Jaqueta de couro legítimo unissex, forro interno, zíperes metálicos',
                'preco' => 899.00,
                'categoria' => 'Roupas'
            ],
            [
                'nome' => 'Blazer Social Feminino',
                'descricao' => 'Blazer alfaiataria feminino, tecido crepe, corte slim, ideal para trabalho',
                'preco' => 299.99,
                'categoria' => 'Roupas'
            ],
            [
                'nome' => 'Camisa Social Masculina',
                'descricao' => 'Camisa social branca, 100% algodão, corte slim fit, colarinho italiano',
                'preco' => 159.90,
                'categoria' => 'Roupas'
            ],

            // CASA E JARDIM
            [
                'nome' => 'Sofá 3 Lugares Cinza',
                'descricao' => 'Sofá retrátil e reclinável, estofado em tecido suede, estrutura de madeira',
                'preco' => 1899.99,
                'categoria' => 'Casa e Jardim'
            ],
            [
                'nome' => 'Mesa de Jantar 6 Lugares',
                'descricao' => 'Mesa de jantar em madeira maciça com acabamento verniz, tampo 160x90cm',
                'preco' => 1299.00,
                'categoria' => 'Casa e Jardim'
            ],
            [
                'nome' => 'Aspirador de Pó Robô',
                'descricao' => 'Robô aspirador inteligente com mapeamento, WiFi, bateria 2600mAh',
                'preco' => 799.99,
                'categoria' => 'Casa e Jardim'
            ],
            [
                'nome' => 'Jogo de Panelas Antiaderente',
                'descricao' => 'Kit com 5 peças: panelas e frigideiras com revestimento cerâmico antiaderente',
                'preco' => 329.90,
                'categoria' => 'Casa e Jardim'
            ],
            [
                'nome' => 'Luminária de Mesa LED',
                'descricao' => 'Abajur moderno com LED regulável, carregamento USB, base em madeira',
                'preco' => 189.99,
                'categoria' => 'Casa e Jardim'
            ],
            [
                'nome' => 'Vaso Decorativo Cerâmica',
                'descricao' => 'Vaso decorativo grande em cerâmica esmaltada, design minimalista, 40cm altura',
                'preco' => 159.90,
                'categoria' => 'Casa e Jardim'
            ],

            // ESPORTES
            [
                'nome' => 'Tênis Nike Air Max 270',
                'descricao' => 'Tênis masculino com tecnologia Air Max, solado em borracha, cabedal em mesh',
                'preco' => 699.99,
                'categoria' => 'Esportes'
            ],
            [
                'nome' => 'Bicicleta Mountain Bike Aro 29',
                'descricao' => 'Mountain bike com quadro de alumínio, 21 marchas Shimano, freios a disco',
                'preco' => 1899.00,
                'categoria' => 'Esportes'
            ],
            [
                'nome' => 'Kit Musculação Completo',
                'descricao' => 'Kit com halteres ajustáveis, barra, anilhas, banco regulável para treino em casa',
                'preco' => 1299.99,
                'categoria' => 'Esportes'
            ],
            [
                'nome' => 'Bola de Futebol Oficial FIFA',
                'descricao' => 'Bola oficial FIFA, couro sintético, tamanho oficial, costurada à mão',
                'preco' => 179.90,
                'categoria' => 'Esportes'
            ],
            [
                'nome' => 'Raquete de Tênis Profissional',
                'descricao' => 'Raquete de tênis Wilson, grafite, peso 300g, encordoamento incluído',
                'preco' => 899.99,
                'categoria' => 'Esportes'
            ],
            [
                'nome' => 'Esteira Elétrica Dobrável',
                'descricao' => 'Esteira elétrica com 12 programas, velocidade até 16km/h, monitor cardíaco',
                'preco' => 2499.00,
                'categoria' => 'Esportes'
            ],

            // LIVROS
            [
                'nome' => 'Dom Casmurro - Machado de Assis',
                'descricao' => 'Clássico da literatura brasileira, edição especial com capa dura e ilustrações',
                'preco' => 49.90,
                'categoria' => 'Livros'
            ],
            [
                'nome' => 'O Poder do Hábito - Charles Duhigg',
                'descricao' => 'Livro de autoajuda sobre como formar bons hábitos e quebrar os ruins',
                'preco' => 39.99,
                'categoria' => 'Livros'
            ],
            [
                'nome' => 'Sapiens - Yuval Noah Harari',
                'descricao' => 'Uma breve história da humanidade, bestseller mundial sobre evolução humana',
                'preco' => 59.90,
                'categoria' => 'Livros'
            ],
            [
                'nome' => 'Harry Potter - Coleção Completa',
                'descricao' => 'Box com os 7 livros da saga Harry Potter, edição especial com capa dura',
                'preco' => 299.99,
                'categoria' => 'Livros'
            ],
            [
                'nome' => 'Algoritmos - Cormen',
                'descricao' => 'Introdução aos Algoritmos, 3ª edição, referência em Ciência da Computação',
                'preco' => 299.00,
                'categoria' => 'Livros'
            ],

            // BELEZA
            [
                'nome' => 'Perfume Masculino Hugo Boss',
                'descricao' => 'Eau de toilette masculino 100ml, fragrância amadeirada e sofisticada',
                'preco' => 329.99,
                'categoria' => 'Beleza'
            ],
            [
                'nome' => 'Kit Skincare Facial Feminino',
                'descricao' => 'Kit completo: cleanser, tônico, sérum vitamina C, hidratante e protetor solar',
                'preco' => 189.90,
                'categoria' => 'Beleza'
            ],
            [
                'nome' => 'Shampoo e Condicionador Profissional',
                'descricao' => 'Duo para cabelos ressecados com óleo de argan, sem sulfato, 500ml cada',
                'preco' => 89.99,
                'categoria' => 'Beleza'
            ],
            [
                'nome' => 'Paleta de Maquiagem 120 Cores',
                'descricao' => 'Paleta completa com sombras, blush e iluminador, cores matte e cintilantes',
                'preco' => 159.99,
                'categoria' => 'Beleza'
            ],
            [
                'nome' => 'Secador de Cabelo Profissional',
                'descricao' => 'Secador 2000W com tecnologia íons, 3 temperaturas, bico concentrador',
                'preco' => 249.90,
                'categoria' => 'Beleza'
            ],

            // AUTOMOTIVO
            [
                'nome' => 'Pneu Michelin Aro 16',
                'descricao' => 'Pneu radial 205/55R16, alta durabilidade, aderência superior em pista molhada',
                'preco' => 459.99,
                'categoria' => 'Automotivo'
            ],
            [
                'nome' => 'Óleo Motor Castrol 5W30',
                'descricao' => 'Óleo sintético para motor, 4 litros, proteção avançada e economia de combustível',
                'preco' => 89.90,
                'categoria' => 'Automotivo'
            ],
            [
                'nome' => 'GPS Automotivo 7 Polegadas',
                'descricao' => 'Navegador GPS com tela touchscreen, mapas atualizados, alertas de trânsito',
                'preco' => 399.99,
                'categoria' => 'Automotivo'
            ],
            [
                'nome' => 'Alarme Automotivo com Controle',
                'descricao' => 'Sistema de alarme com 2 controles, sensor de presença, sirene de 120dB',
                'preco' => 299.00,
                'categoria' => 'Automotivo'
            ],
            [
                'nome' => 'Bateria Automotiva 60Ah',
                'descricao' => 'Bateria selada livre de manutenção, 12V 60Ah, 2 anos de garantia',
                'preco' => 349.99,
                'categoria' => 'Automotivo'
            ],

            // BRINQUEDOS
            [
                'nome' => 'LEGO Creator 3 em 1',
                'descricao' => 'Set LEGO com 542 peças, constrói 3 modelos diferentes: casa, carro ou avião',
                'preco' => 299.99,
                'categoria' => 'Brinquedos'
            ],
            [
                'nome' => 'Boneca Barbie Fashionista',
                'descricao' => 'Boneca Barbie com roupas da moda, acessórios e sapatos, cabelo escovável',
                'preco' => 89.99,
                'categoria' => 'Brinquedos'
            ],
            [
                'nome' => 'Carrinho Hot Wheels Pack 20',
                'descricao' => 'Pack com 20 carrinhos Hot Wheels sortidos, escala 1:64, modelos exclusivos',
                'preco' => 199.90,
                'categoria' => 'Brinquedos'
            ],
            [
                'nome' => 'Quebra-cabeça 1000 Peças',
                'descricao' => 'Quebra-cabeça paisagem europeia, 1000 peças, tamanho 68x48cm quando montado',
                'preco' => 49.99,
                'categoria' => 'Brinquedos'
            ],
            [
                'nome' => 'Drone com Câmera HD',
                'descricao' => 'Mini drone para crianças com câmera HD, controle remoto, bateria 20 minutos',
                'preco' => 399.99,
                'categoria' => 'Brinquedos'
            ],
            [
                'nome' => 'Jogo de Tabuleiro War',
                'descricao' => 'Clássico jogo de estratégia e conquista, para 3 a 6 jogadores, idade 10+',
                'preco' => 89.90,
                'categoria' => 'Brinquedos'
            ]
        ];

        foreach ($produtos as $produtoData) {
            $categoria = Categoria::where('nome', $produtoData['categoria'])->first();
            
            if ($categoria) {
                Produto::create([
                    'nome' => $produtoData['nome'],
                    'descricao' => $produtoData['descricao'],
                    'preco' => $produtoData['preco'],
                    'categoria_id' => $categoria->id
                ]);
            }
        }
    }
}