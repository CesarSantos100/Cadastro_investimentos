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

       // return view('usuarios')->with(
           // [
            //    'usuario' => $usuario,

           // ]

        //);
        return view('usuarios', compact('usuario'));
    }

    public function lista(Request $request)
    {

        return view('cadastro');
    }

    public function create(Request $request)
    { {

            $usuario = Usuario::create(
                [
                    'investimento' => $request->investimento,
                    'banco' => $request->banco,
                    'valor_investimento' => $request->valor_investimento,

                ]

            );
        }
        return redirect('/')->with('sucesso', 'Investimento criado com sucesso.');
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
            'investimento' => $request->investimento,
            'banco' => $request->banco,
            'valor_investimento' => $request->valor_investimento,
        ]);
        return redirect('/')->with('sucesso', 'Investimento alterado com sucesso');;
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


        return redirect('/')->with('sucesso', 'Investimento Excluido com sucesso');
    }
}
