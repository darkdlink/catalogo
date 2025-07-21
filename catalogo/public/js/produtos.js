$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#nome').on('input', function() {
        const nome = $(this).val();
        const filtrarBtn = $('#filtrar-btn');
        
        if (nome.length >= 3 || nome.length === 0) {
            // Habilitar botão se tem 3+ chars ou está vazio
            filtrarBtn.prop('disabled', false);
            filtrarBtn.removeClass('disabled');
        } else if (nome.length > 0 && nome.length < 3) {
            filtrarBtn.prop('disabled', true);
            filtrarBtn.addClass('disabled');
        }
    });

    $('#filtrar-btn').on('click', function() {
        const nome = $('#nome').val();
        
        if (nome.length > 0 && nome.length < 3) {
            mostrarAlerta('Digite pelo menos 3 caracteres para buscar por nome.', 'warning');
            return;
        }
        
        filtrarProdutos();
    });

    $('#limpar-btn').on('click', function() {
        $('#filtro-form')[0].reset();
        $('#filtrar-btn').prop('disabled', false).removeClass('disabled');
        filtrarProdutos();
    });

    function filtrarProdutos() {
        const nome = $('#nome').val();
        const categoriaId = $('#categoria_id').val();

        mostrarLoading(true);

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
        
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    }

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

    $('#cadastroModal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
    });

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