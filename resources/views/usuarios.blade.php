<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<style>
    #botao {
        text-align: center;
    }

    h1 {
        text-align: center;
    }
</style>

<body>

    <h1 class="mb-5">
        <div class="jumbotron">
            Lista de Usuários Cadastrados
    </h1>
    <a class="btn btn-primary" href="{{'/user'}}">
        <i class=""></i> Cadastro de Usuário
    </a>
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


    <table class="table">
        <thead>
            <tr>
               
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">CPF</th>
                <th scope="col">Cep</th>
                <th scope="col">Rua</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Data da criação</th>

            </tr>
        </thead>
        <tbody>
            @foreach($usuario as $user)
            <tr>
                
                <td>{{$user->nome}}</td>
                <td>{{$user->email}}</td>
                <td>{{date( 'd/m/Y' , strtotime($user->dt_nascimento))}}</td>
                <td>{{$user->cpf}}</td>
                <td>{{$user->cep}}</td>
                <td>{{$user->rua}}</td>
                <td>{{$user->bairro}}</td>
                <td>{{$user->cidade}}</td>
                <td>{{$user->uf}}</td>
                <td>{{date ( 'd/m/y' , strtotime ($user->created_at))}}</td>
                <td>
                    <form method="post" action="/excluir/{{ $user->id}}" onsubmit="return confirm('Tem certeza que deseja remover {{$user->nome}}  ?')">

                        <a class="btn btn-warning btn-sm" href="{{url('editar/'.$user->id)}}"><i class="fas fa-edit"></i></a>
                        @csrf




                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>

                    </form>
                </td>
            </tr>
            @endforeach

    </table>

    <script>


    </script>


</body>