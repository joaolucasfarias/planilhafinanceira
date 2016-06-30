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

function validarCamposModal(elementos, url, comando) {
    elementos = elementos.split(",");
    for (var i = 0; i < elementos.length; i++)
        if ($("#" + elementos[i]).val() == "" || $("#" + elementos[i]).val() == "0") {
            window.alert("Há campos em branco!");
            return false;
        }

    return salvarAjax(url, comando);
}

function retornarCategoriasJson() {
    $("#tabelaGrande").empty();
    $("#tabelaPequena").empty();
    nome = $("#nome").val();
    operacao = $("input[name='operacao']:checked").val();
    $.getJSON("Request.php?class=app\\controller\\CategoriaCtr&method=retornarCategoriasJson&nome=" + nome + "&operacao=" + operacao,
            function (result) {
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

function retornarCategoriasJsonModal() {
    $("#tabelaGrande").empty();
    $("#tabelaPequena").empty();
    nome = $("#nome").val();
    operacao = $("input[name='operacao']:checked").val();
    $.getJSON("Request.php?class=app\\controller\\CategoriaCtr&method=retornarCategoriasJson&nome=" + nome + "&operacao=" + operacao,
            function (result) {
                $.each(result, function (index, value) {
                    op = "Crédito";
                    if (value.operacao == "D")
                        op = "Débito";
                    $("#tabelaGrande").append("<tr><td>" + value.idcategoria + "</td><td>" + value.nomecategoria + "</td><td>" + op + "</td><td>R$ " + value.total + "</td><td><a class='button tiny info radius' onclick='selecionarCategoria(" + value.idcategoria + ", \"" + value.nomecategoria + "\")' href='#'>ESCOLHER</a></td></tr>");
                    $("#tabelaPequena").append("<tr><td>" + value.idcategoria + "</td><td>" + value.nomecategoria + "</td><td><a class='button tiny info radius' onclick='selecionarCategoria(" + value.idcategoria + ", \"" + value.nomecategoria + "\")' href='#'>ESCOLHER</a></td></tr>");
                });
            }
    );
}

function selecionarCategoria(idCategoria, nomeCategoria) {
    $("#idcategoria").val(idCategoria);
    $("#nomecategoria").val(nomeCategoria);
    $('#myModal').foundation('reveal', 'close');
}

function retornarItensJson() {
    $("#tabelaGrande").empty();
    $("#tabelaPequena").empty();
    nome = $("#nome").val();
    parametro = $("#parametro").val();
    valor = $("#valor").val();
    $.getJSON("Request.php?class=app\\controller\\ItemCtr&method=retornarItensJson&nome=" + nome + "&parametro=" + parametro + "&valor=" + valor,
            function (result) {
                $.each(result, function (index, value) {
                    op = "Crédito";
                    if (value.operacao == "D")
                        op = "Débito";
                    $("#tabelaGrande").append("<tr><td>" + value.iditem + "</td><td>" + value.nomeitem + "</td><td>R$ " + value.valorbase + "</td><td><a class='button tiny info radius' href='Request.php?class=app\\controller\\ItemCtr&method=showView&id=" + value.iditem + "'>VER</a></td></tr>");
                    $("#tabelaPequena").append("<tr><td>" + value.iditem + "</td><td>" + value.nomeitem + "</td><td><a class='button tiny info radius' href='Request.php?class=app\\controller\\ItemCtr&method=showView&id=" + value.iditem + "'>VER</a></td></tr>");
                });
            }
    );
}