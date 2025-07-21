@extends('layouts.app')

@section('title', 'Catálogo de Produtos')

@section('content')
<div class="row">
    <!-- Seção de Filtros -->
    <div class="col-md-4 col-lg-3 mb-4">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="card-title mb-0">
                    <i class="fas fa-filter me-2"></i>Filtros
                </h5>
            </div>
            <div class="card-body">
                <form id="filtro-form">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nome" name="nome" 
                               placeholder="Digite pelo menos 3 caracteres...">
                        <div class="form-text">Busca a partir da 3ª letra</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select class="form-select" id="categoria_id" name="categoria_id">
                            <option value="">Todas as categorias</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="button" id="filtrar-btn" class="btn btn-primary w-100">
                        <i class="fas fa-search me-2"></i>Filtrar
                    </button>
                    
                    <button type="button" id="limpar-btn" class="btn btn-outline-secondary w-100 mt-2">
                        <i class="fas fa-refresh me-2"></i>Limpar Filtros
                    </button>
                </form>
                
                <hr>
                
                <!-- Botão para abrir modal de cadastro -->
                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#cadastroModal">
                    <i class="fas fa-plus me-2"></i>Novo Produto
                </button>
            </div>
        </div>
    </div>
    
    <!-- Seção de Produtos -->
    <div class="col-md-8 col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Produtos</h2>
            <span id="total-produtos" class="badge bg-primary">{{ count($produtos) }} produto(s)</span>
        </div>
        
        <div id="produtos-container" class="row g-3">
            @forelse($produtos as $produto)
                <div class="col-sm-6 col-lg-4 produto-card">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <p class="card-text">{{ Str::limit($produto->descricao, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-success mb-0">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                                <span class="badge bg-secondary">{{ $produto->categoria->nome }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i>
                        Nenhum produto encontrado.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Modal de Cadastro -->
<div class="modal fade" id="cadastroModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus me-2"></i>Cadastrar Produto
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="modal-nome" class="form-label">Nome *</label>
                        <input type="text" class="form-control" id="modal-nome" name="nome" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="modal-descricao" class="form-label">Descrição *</label>
                        <textarea class="form-control" id="modal-descricao" name="descricao" rows="3" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="modal-preco" class="form-label">Preço (R$) *</label>
                        <input type="number" class="form-control" id="modal-preco" name="preco" step="0.01" min="0" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="modal-categoria" class="form-label">Categoria *</label>
                        <select class="form-select" id="modal-categoria" name="categoria_id" required>
                            <option value="">Selecione uma categoria</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection