🛒 Catálogo de Produtos - Laravel
Sistema de catálogo de produtos desenvolvido em Laravel com filtros dinâmicos via AJAX, interface responsiva e design moderno.
📋 Sobre o Projeto
Este projeto foi desenvolvido como parte de um teste técnico para vaga de estágio em desenvolvimento Full Stack. O sistema permite o cadastro, listagem e filtragem de produtos com uma interface moderna e responsiva.
✨ Funcionalidades Principais

📦 Listagem de Produtos: Visualização em cards responsivos
🔍 Filtros Dinâmicos: Busca por nome e categoria via AJAX
➕ Cadastro de Produtos: Modal para adicionar novos produtos
📱 Interface Responsiva: Layout adaptativo para desktop e mobile
⚡ Carregamento Assíncrono: Sem recarregamento da página
🎨 Design Moderno: Interface limpa com Bootstrap 5

🚀 Tecnologias Utilizadas

Backend: Laravel 10.x, PHP 8.0+
Frontend: HTML5, CSS3, JavaScript (jQuery)
Database: MySQL 8.0+
UI Framework: Bootstrap 5
Icons: Font Awesome 6

📋 Pré-requisitos
Antes de começar, certifique-se de ter instalado:

PHP (versão 8.0 ou superior)
Composer
MySQL (versão 8.0 ou superior)
Node.js (opcional, para compilar assets)


# instruções

2.Instale as Dependências
composer install

2. Configure o Ambiente
bash# Copie o arquivo de configuração
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate


crie o arquivo .env usando como exemplo o arquivo .env.example

utilize o comando "php artisan migrate" para rodar as migrações

utilize o comando "php artisan db:seed" para gravar os produtos no banco

utilize o comando "php artisan serve" para startar o sisema