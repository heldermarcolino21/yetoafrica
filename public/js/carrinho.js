function carrinhoRemoverProduto( idpedido, idcurso, item ) {
    $('#form-remover-produto input[name="pedido_id"]').val(idpedido);
    $('#form-remover-produto input[name="curso_id"]').val(idcurso);
    $('#form-remover-produto input[name="item"]').val(item);
    $('#form-remover-produto').submit();
}

function carrinhoAdicionarProduto( idproduto ) {
    $('#form-adicionar-produto input[name="id"]').val(idproduto);
    $('#form-adicionar-produto').submit();
}