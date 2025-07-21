$(document).ready(function() {
    // Configurar token CSRF para requisições AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Variável para controlar o timer do filtro de nome
    let searchTimer;

    // Filtro por nome - buscar após 3 caracteres
    $('#nome').on('input', function() {
        const nome = $(this).val();
        
        clearTimeout(searchTimer);
        
        if (nome.length >= 3) {
            searchTimer = setTimeout(function() {
                filtrarProdutos();
            }, 500); // Aguarda 500ms após parar de digitar
        } else if (nome.length === 0) {
            // Se o campo estiver vazio, limpar filtros
            filtrarProdutos();
        }
    });

    // Filtro por categoria
    $('#categoria_id').on('change', function() {
        filtrarProdutos();
    });

    // Botão filtrar
    $('#filtrar-btn').on('click', function() {
        filtrarProdutos();
    });

    // Botão limpar filtros
    $('#limpar-btn').on('click', function() {
        $('#filtro-form')[0].reset();
        filtrarProdutos();
    });

    function filtrarProdutos() {
        const nome = $('#nome').val();
        const categoriaId = $('#categoria_id').val();

        // Mostrar loading
        mostrarLoading(true);

        // Fazer requisição AJAX
        $.ajax({
            url: '/api/produtos',
            type: 'GET',
            data: {
                nome: nome,
                categoria_id: categoriaId
            },
            success: function(response) {
                renderizarProdutos(response);
                atualizarContador(response.length);
            },
            error: function(xhr, status, error) {
                console.error('Erro ao filtrar produtos:', error);
                mostrarAlerta('Erro ao carregar produtos. Tente novamente.', 'danger');
            },
            complete: function() {
                // Esconder loading
                mostrarLoading(false);
            }
        });
    }

    function renderizarProdutos(produtos) {
        const container = $('#produtos-container');
        
        if (produtos.length === 0) {
            container.html(`
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i>
                        Nenhum produto encontrado.
                    </div>
                </div>
            `);
            return;
        }

        let html = '';
        produtos.forEach(function(produto, index) {
            const precoFormatado = formatarPreco(produto.preco);
            const descricaoLimitada = limitarTexto(produto.descricao, 80);
            
            html += `
                <div class="col-sm-6 col-lg-4 produto-card" style="animation-delay: ${index * 0.1}s">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">${produto.nome}</h5>
                            <p class="card-text">${descricaoLimitada}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-success mb-0">R$ ${precoFormatado}</span>
                                <span class="badge bg-secondary">${produto.categoria.nome}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

        container.html(html);
    }

    function mostrarLoading(show) {
        if (show) {
            $('#loading-spinner').removeClass('d-none');
        } else {
            $('#loading-spinner').addClass('d-none');
        }
    }

    function atualizarContador(total) {
        $('#total-produtos').text(`${total} produto(s)`);
    }

    function formatarPreco(preco) {
        return parseFloat(preco).toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function limitarTexto(texto, limite) {
        if (texto.length <= limite) {
            return texto;
        }
        return texto.substring(0, limite) + '...';
    }

    function mostrarAlerta(mensagem, tipo = 'info') {
        const alerta = `
            <div class="alert alert-${tipo} alert-dismissible fade show" role="alert">
                ${mensagem}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        
        $('main .container').prepend(alerta);
        
        // Auto-remover após 5 segundos
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    }

    // Validação do formulário de cadastro
    $('#cadastroModal form').on('submit', function(e) {
        const nome = $('#modal-nome').val().trim();
        const descricao = $('#modal-descricao').val().trim();
        const preco = $('#modal-preco').val();
        const categoriaId = $('#modal-categoria').val();

        if (!nome || !descricao || !preco || !categoriaId) {
            e.preventDefault();
            mostrarAlerta('Por favor, preencha todos os campos obrigatórios.', 'warning');
            return false;
        }

        if (parseFloat(preco) < 0) {
            e.preventDefault();
            mostrarAlerta('O preço deve ser um valor positivo.', 'warning');
            return false;
        }
    });

    // Limpar formulário quando modal for fechado
    $('#cadastroModal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
    });

    // Animação suave para cards
    $(window).on('scroll', function() {
        $('.produto-card').each(function() {
            const elementTop = $(this).offset().top;
            const elementBottom = elementTop + $(this).outerHeight();
            const viewportTop = $(window).scrollTop();
            const viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate__fadeInUp');
            }
        });
    });
});