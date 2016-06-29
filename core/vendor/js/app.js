function perguntaExcluir(url, comando) {
    if (window.confirm("Deseja REALMENTE excluir?"))
        return salvarAjax(url, comando);
    else
        return false;
}

function salvarAjax(url, comando) {
    var dados = $('#formCadastro').serialize() + "&comando=" + comando;

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
            $(document).on('closed.fndtn.reveal', '[data-reveal]', function () {
                var redirecao = url.split("&");
                window.location.href = redirecao[0] + '&method=showList';
            });
            $('#myModal').foundation('reveal', 'open');
        },
        failure: function (response) {
            $("#myModal").html(response.resposta);
            $('#myModal').foundation('reveal', 'open');
        }
    });

    return false;
}

function retornarCategoriasJson() {
    nome = $("#nome").val();
    operacao = $("input[name='operacao']:checked").val();
    $.getJSON("Request.php?class=app\\controller\\CategoriaCtr&method=retornarCategoriasJson&nome=" + nome + "&operacao=" + operacao,
            function (result) {
                $("#tabelaGrande").empty();
                $("#tabelaPequena").empty();
                $.each(result, function (index, value) {
                    op = "Crédito";
                    if (value.operacao == "D")
                        op = "Débito";
                    $("#tabelaGrande").append("<tr><td>" + value.idcategoria + "</td><td>" + value.nomecategoria + "</td><td>" + op + "</td><td>R$ " + value.total + "</td><td><a class='button tiny info radius' href='Request.php?class=app\\controller\\CategoriaCtr&method=showView&id=" + value.idcategoria + "'>VER</a></td></tr>");
                    $("#tabelaPequena").append("<tr><td>" + value.idcategoria + "</td><td>" + value.nomecategoria + "</td><td><a class='button tiny info radius' href='Request.php?class=app\\controller\\CategoriaCtr&method=showView&id=" + value.idcategoria + "'>VER</a></td></tr>");
                });
            }
    );
}