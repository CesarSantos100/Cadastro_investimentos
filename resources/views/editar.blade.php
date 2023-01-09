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
                <label for="inputnome">Investimento</label>
                <input type="text" class="form-control" id="investimento" name="investimento" value="{{$usuario->investimento}}" data-tipo="nome" placeholder="Digite o nome do investimento" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputemail">banco</label>
    
                <input type="banco" class="form-control" id="banco" name="banco" value="{{$usuario->banco}}" placeholder="Digite o nome do banco" required="">
            </div>
            
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
                <label for="inputnome">Valor do investimento</label>
                <input type="text" class="form-control" id="valor_investimento" name="valor_investimento" value="{{$usuario->valor_investimento}}" data-tipo="valor_investimento" placeholder="Digite o valor investido" required>
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