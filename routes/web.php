<?php
Route::get('/','Portal\HomeController@index');
Auth::routes();
Route::get('/admin', 'Admin\AuthController@dashboard')->name('admin');
Route::get('/admin/login', 'Admin\AuthController@showLoginForm')->name('admin.login');
Route::get('/admin/logout', 'Admin\AuthController@logout')->name('admin.logout');    
Route::post('/admin/login/do', 'Admin\AuthController@login')->name('admin.login.do');  
Route::resource('utilizadores', 'Admin\UtilizadorController');
Route::get('/perfil', 'Admin\UtilizadorController@perfil');
Route::resource('formador', 'Admin\FormadorController');
Route::get('/formadores', 'Admin\FormadorController@formadores')->name('formadores.ver');
Route::get('/contacto', 'Admin\ContactoController@contacto');
Route::resource('academia', 'Admin\AcademiaController');
Route::get('/acadmeuscursos', 'Admin\FormadorController@meusCursosAcademia');
Route::get('/pdf', 'Admin\CertificadoController@certificado');
Route::get('/meusalunos', 'Admin\FormadorController@alunosCursos');
Route::get('/termos', 'Admin\TermosController@index');


//negocio
Route::get('/alunos/{id}', 'Admin\FormadorController@alunosCurso');
Route::get('/formanegocio', 'Admin\FormadorController@meusCursos');
Route::get('/formanegocio/{id}', 'Admin\FormadorController@meusModulos');
Route::get('/formaform', 'Admin\FormadorController@registar');
Route::get('/modulonegocio/{id}', 'Admin\ModuloController@aulasModulo');
Route::get('/carrinhos', 'Admin\CarrinhoController@index')->name('carrinho.index');
Route::delete('/carrinho/remover','Admin\CarrinhoController@remover')->name('carrinho.remover');
Route::post('/carrinho/concluir','Admin\CarrinhoController@concluir')->name('carrinho.concluir');
Route::get('/carrinho/compras', 'Admin\CarrinhoController@compras')->name('carrinho.compras');
Route::post('/carrinho/cancelar', 'Admin\CarrinhoController@cancelar')->name('carrinho.cancelar');
Route::get('/pagamento', 'Admin\PagamentoController@pagamento')->name('pagamento.index');
Route::resource('estudantenegocio','Admin\AlunoController');
Route::post('/carrinho/adicionar', 'Admin\CarrinhoController@adicionar')->name('carrinho.adicionar');
Route::get('/carrinho/adicionar', function() {
    return redirect()->route('carrinho.index');
});
Route::resource('/novoCurso', 'Admin\novoCursoController');

Route::resource('cursos', 'Admin\CursoController');
Route::any('cursosss/busca', 'Admin\CursoController@busca')->name('cursos.busca');
Route::any('blog/search', 'Admin\BlogController@search')->name('blog.search');
Route::resource('servicos', 'Admin\ServicosController');
Route::resource('cat_blog', 'Admin\CatBlogController');
Route::get('/cursonegocio', 'Admin\CursoController@cursos');
Route::get('/cursocat/{id}', 'Admin\CursoController@cursoCategorias');
Route::resource('modulos', 'Admin\ModuloController');
Route::resource('aula', 'Admin\AulaController');
Route::resource('cursoestudante','Admin\EstudanteCursoController');
Route::resource('aulaestudante','Admin\EstudanteAulaController');
Route::resource('categoria', 'Admin\CategoriaController');
Route::resource('sobre','Admin\SobreController');
Route::get('/sobr/detalhes','Admin\AulaController@detalhes')->name('sobre.detalhes');
Route::get('/detalhes/{var}', 'Admin\CursoController@detalhes')->name('detalhes');
Route::resource('banner', 'Admin\BannerController');
Route::resource('financa', 'Admin\FinancaController');
Route::resource('blog', 'Admin\BlogController');
Route::resource('newslater', 'Admin\NewslaterController');
Route::get('/blogcat/{id}', 'Admin\BlogController@listaBlogcateg');
Route::get('/blogfront', 'Admin\BlogController@blog');
Route::get('/blogfront/{id}', 'Admin\BlogController@blogsingle');
//Route::get('/registar', 'Admin\RegistarController@index');
Route::post('/registar/store', 'Admin\RegistarController@store')->name('admin.registar');
Route::resource('faqs', 'Admin\FaqsController');
Route::get('/perguntas', 'Admin\FaqsController@faqs');
Route::resource('contactos', 'Admin\ContactoController');
Route::resource('publicacao', 'Admin\PublicacaoController');
Route::post('/comentario', 'Admin\ComentarioController@store')->name('comentario.store');
Route::post('/editarperfil/{id}', 'Admin\UtilizadorController@editarPerfil');
Route::get('/academias/yeto', 'Admin\AcademiaController@academiasfront');

