<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="//unpkg.com/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
</head>

<style>
    #botao {
        text-align: center;
    }

    #nome {
        text-transform: uppercase;
    }
</style>


<body>
    <h1 class="mb-5">
        <div class="jumbotron">
            Cadastro
    </h1>

    @if(session('sucesso'))
    <div class="alert alert-primary" role="alert">
        {{session('sucesso')}}
    </div>
    @endif

    @if(session('erro'))
    <div class="alert alert-danger" role="alert">
        {{session('erro')}}
    </div>
    @endif
    @csrf
    <hr>

    <a class="btn btn-danger" href="{{'/'}}">
        <i class="fas fa-check"></i> Voltar a tela Inicial
    </a>
    <br><br><br>
    <form id="form" action="{{url('cadastro')}}" method="POST" onsubmit=" salvarInvestimento(event)">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputnome">Produto ou Serviço</label>
                <input type="text" class="form-control" id="investimento" name="investimento" data-tipo="nome" placeholder="Digite o nome do produto ou serviço" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputemail">Data da compra</label>
                <input type="text" class="form-control" id="banco" name="banco" placeholder="Digite a data da compra" required="">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputnome">Valor Gasto</label>
                <input type="text" class="form-control" id="valor_investimento" name="valor_investimento" data-tipo="valor_investimento" placeholder="Digite o valor Gasto" required>
            </div>
        </div>

        <div class="col-md-9" id="botao" style="clear: both;">
            <input type="submit" class="btn btn-primary mr-1" name="botao" value="Salvar" />
            <a class="btn btn-danger" href="{{'/'}}">
                <i class="fas fa-check"></i> Cancelar
            </a>
        </div>


    </form>



    <script>
        var form = document.getElementById('form');

        function salvarInvestimento(event) {
            event.preventDefault();

            fetch("{{url('cadastro')}}", {
                    method: 'POST',
                    body: new FormData(form)

                })
                //.then(response => response.json())
                .then(response => {
                    alert('Produto ou serviço salvo com sucesso');
                    if (response.error) {
                        mostrarError(response.error)
                        return false;
                    }

                    window.location.reload();

                })

        }

        //salvarDados = () => {
        //$.ajax({
        //  url: "{{url('cadastro')}}",
        // type: 'post',
        // dataType: 'json',
        //}).then(r => { // o r é o retorno do php
        //   if (r.status == true) {
        //      alert('Salvo com sucesso!')
        //   } else {
        //       alert('Falha ao salvar!')

        //   }
        // })
        // }





        //function mostrarMensagem(msg) {
        // mensagem.classList.remove('d-none');
        // mensagem.innerHTML = msg;

        //}

        VMasker(document.getElementById("cpf")).maskPattern("999.999.999-99");

        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");

        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);

            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";


                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    </script>
</body>

</html>