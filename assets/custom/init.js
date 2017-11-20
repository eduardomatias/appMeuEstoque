/* CONFIG */
myApp.c.setAppConfig({
    appLogo: './assets/img/logo.png',
    appName: 'MeuEstoque',
    appSlogan: 'tudo sob controle',
    pages: ['meuEstoque', 'movimentacao', 'produto', 'fornecedor', 'perfil'],
    indexPage: 'meuEstoque.html',
    urlApi: './backend/',
    urlImg: './backend/img/'
});

myApp.c.setPanelLeft([
    {href: 'meuEstoque.html', label: 'Meu estoque', ico: 'cubes'},
    {href: 'movimentacao.html', label: 'Movimentação', ico: 'exchange'},
    {href: 'produto.html', label: 'Produto', ico: 'inbox'},
    {href: 'fornecedor.html', label: 'Fornecedor', ico: 'truck'},
    {href: 'perfil.html', label: 'Perfil', ico: 'user-circle-o'},
    {label: 'Sair', ico: 'close', class: 'my-logout'}
]);

/* INIT */
myApp.c.init();
