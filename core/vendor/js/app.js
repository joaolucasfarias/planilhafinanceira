function perguntaExcluir() {
    return window.confirm("Deseja REALMENTE excluir?");
}

function salvarAjax(url) {
    var dados = $('#formCadastro').serialize() + "&comando=salvar";

    var valida = dados.split('&');
    for (var i = 0; i < valida.length; i++)
        if (valida[i] != "id=" && valida[i].indexOf("=") == (valida[i].length - 1))
            return true;


    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        async: true,
        data: dados,
        success: function (response) {
            $("#myModal").html(response.resposta);
            $('#myModal').foundation('reveal', 'open');
        },
        failure: function (response) {
            $("#myModal").html(response.resposta);
            $('#myModal').foundation('reveal', 'open');
        }
    });
    return false;
}

function recarregar(erro) {
    if (!erro)
        location.reload();
}