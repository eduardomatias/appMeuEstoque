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
        // listview
        myApp.c.listView ('produtoList.php', myApp.c.getLocalStorage(), 'produto', function (a) {
            
        }, true, false);
		
        // acoes do modal-form
        $('.open-modal').on('click', function(){
            myApp.c.openModal('modalFormProduto');
        });
        $('.close-modal').on('click', function(){
            myApp.c.closeModal('modalFormProduto');
        });
		
		// obj form
		var formProduto = new Form('form-produto');		
		// evento de submit
		$$(formProduto.form).on('submit', function () {
			myApp.c.ajaxApi ('produtoSave.php', $.extend({},formProduto.getFormData(),myApp.c.getLocalStorage()), function (a) {
				console.log(a);
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