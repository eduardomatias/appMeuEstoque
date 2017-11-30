class LoadPage {

    constructor() {
    }

    login(page) {
        var loginForm = new Form('login-form');
        loginForm.form.find('#btn-submit').on('click', function() {
            myApp.c.ajaxApi('login.php', loginForm.getFormData(), myApp.c.callbackLogin);
        });
    }
    
    meuEstoque(page) {
        myApp.c.listView ('meuEstoque.php', {}, 'meuEstoque', function (a) {
            
        }, true, false);
    }

    movimentacao(page) {
        // listview
        myApp.c.listView ('movimentacao.php', {}, 'movimentacao', function (a) {
            
        }, false, true);

        // acoes do modal-form
        $('.open-modal').on('click', function(){
            myApp.c.openModal('modalFormMovimentacao');
        });
        $('.close-modal').on('click', function(){
            myApp.c.closeModal('modalFormMovimentacao');
        });
    }

    produto(page) {
		// localStorage do app
		var lg = myApp.c.getLocalStorage();
		// obj form
		var formProduto = new Form('form-produto');	
		
        // listview
        myApp.c.listView ('produtoList.php', lg, 'produto', function (a) {
            // evento de edicao dos produto
			$('ul#target-produto').find('.action-editar-produto').on('click', function () {
				var dataEdit = $(this).data('produto');
				formProduto.setFormData(dataEdit);
				$(formProduto.form).find('.content-block-title').text('Alterar produto');
				myApp.c.openModal('modalFormProduto');
			});
        }, true, false);
		
        // abre modal-form para cadastrar produto
        $('.open-modal').on('click', function(){
			$(formProduto.form).find('.content-block-title').text('Novo produto');
			formProduto.clear();
            myApp.c.openModal('modalFormProduto');
        });
		
		// fechar modal-form
        $('.close-modal').on('click', function(){
            myApp.c.closeModal('modalFormProduto');
        });
		
		// evento de submit do form
		$$(formProduto.form).on('submit', function () {
			var formData = formProduto.getFormData(),
				editar = formData['TBL02_ID'] ? true : false;
			myApp.c.ajaxApi ('produtoSave.php', $.extend({TBL02_ID_EMPRESA: lg.TBL01_ID},formData), function (a) {
				if(editar) {
					// fecha modal
					myApp.c.closeModal('modalFormProduto');
					// reload listview
					myApp.c.reloadListView.produto();
				} else {
					// limpa o campo nome
					formProduto.setFormData({TBL02_NOME:""});
					// foca no campo nome
					formProduto.TBL02_NOME.focus();
					// add o item na lista
					myApp.c.appendListView.produto([a]);
				}
			});
		});
		
    }

    fornecedor(page) {
        // listview
        myApp.c.listView ('fornecedor.php', {}, 'fornecedor', function (a) {
            
        }, true, false);

        // acoes do modal-form
        $('.open-modal').on('click', function(){
            myApp.c.openModal('modalFormFornecedor');
        });
        $('.close-modal').on('click', function(){
            myApp.c.closeModal('modalFormFornecedor');
        });
    }

    perfil(page) {
        
    }

}