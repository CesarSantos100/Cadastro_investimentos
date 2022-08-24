<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Investimento extends Controller
{

    public function login()
    {
        return view('auth');
    }




    public function index(Request $request)
    {
        $usuario = usuario::all();

        return view('usuarios')->with(
            [
                'usuario' => $usuario,

            ]

        );
        //return view('usuarios', compact('usuario'));
    }

    public function lista(Request $request)
    {

        return view('cadastro');
    }

    public function create(Request $request)
    {
         {

            $usuario = Usuario::create(
                [
                    'nome' => $request->nome,
                    'email' => $request->email,
                    'dt_nascimento' => $request->dt_nascimento,
                    'cpf' => $request->cpf,
                    'cep' => $request->cep,
                    'rua' => $request->rua,
                    'bairro' => $request->bairro,
                    'cidade' => $request->cidade,
                    'uf' => $request->uf,
                    'complemento' => $request->complemento
                ]

            );
        }
        return redirect('/')->with('sucesso', 'Usuário criado com sucesso.');
    }




    public function editar($id)
    {

        $usuario = usuario::find($id);
        return view('editar', compact('usuario'));
    }



    public function store(Request $request, $id)
    {

        $usuario = Usuario::find($id);
        $usuario->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'dt_nascimento' => $request->dt_nascimento,
            'cpf' => $request->cpf,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'uf' => $request->uf,
            'complemento' => $request->complemento

        ]);
        return redirect('/')->with('sucesso', 'Usuário alterado com sucesso');;
    }

    public function delete(request $request, $id)
    {
        //$user = $request->id;
        // $usuario = usuario::find($request->id);
        //$usuario->id = $user;
        //$usuario->delete();

        $usuario = usuario::find($id);
        $usuario->delete();
        //Request::session()->flash('sucesso'.$usuario->nome.' foi removido com sucesso!');


        return redirect('/')->with('sucesso', 'Usuário Excluido com sucesso');
    }
}
