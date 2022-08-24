<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="//unpkg.com/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>

</head>

<style>
    #botao {
        text-align: center;
    }
</style>


<body>
    <form action="/editar/{{ $usuario->id}}" method="post">
       @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputnome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{$usuario->nome}}" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="inputemail">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$usuario->email}}" placeholder="" required="">
            </div>
        </div>

        <h1>Informações pessoais</h1>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputdata">Data de nascimento</label>
                <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" value="{{$usuario->dt_nascimento}}" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="inputcpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{$usuario->cpf}}" placeholder="">
            </div>
        </div>

        <h1>Endereço</h1>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="cep">CEP</label>
                <input name="cep" type="text" id="cep" name="cep" value="{{$usuario->cep}}" class="form-control" onblur="pesquisacep(this.value);" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="rua">RUA</label>
                <input name="rua" type="text" id="rua" name="rua" value="{{$usuario->rua}}" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="bairro">Bairro</label>
                <input name="bairro" type="text" id="bairro" name="bairro" value="{{$usuario->bairro}}" class="form-control" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="cidade">Cidade</label>
                <input name="cidade" type="text" id="cidade" name="cidade" value="{{$usuario->cidade}}" class="form-control" placeholder="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="estado">ESTADO</label>
                <input name="uf" type="text" id="uf" name="uf" value="{{$usuario->uf}}" class="form-control" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="complemento">Complemento</label>
                <input name="complemento" type="text" id="complemento" name="complemento" value="{{$usuario->complemento}}" class="form-control" placeholder="" required>
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
        VMasker(document.getElementById("cpf")).maskPattern("999.999.999-99");

    </script>
</body>