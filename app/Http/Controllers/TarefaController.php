<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schema_tarefa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    function index(){

        $buscar = request('titulo');

        if (empty($buscar)) {
            $tarefas = Schema_tarefa::all();
        } else {
            $tarefas = Schema_tarefa::where('titulo', 'LIKE', '%' . $buscar . '%')->get();
        }      

        return view('welcome',['tarefas'=>$tarefas]);
    }

    function eventcreate(){
        return view('create');
    }

    
    public function create(Request $request) {
        $tarefas = new Schema_tarefa;
        $tarefas->titulo = $request->titulo;
        $tarefas->descricao = $request->descricao;
        $tarefas->status = $request->status;
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extensao = $requestImage->extension();
            $imagePath = md5($requestImage->getClientOriginalName() . strtotime("now")) . '.' . $extensao;
    
            $requestImage->move(public_path('img/tarefas'), $imagePath);
            $tarefas->image = $imagePath;
        }

        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Você precisa estar autenticado para criar uma tarefa.');
        }

        $tarefas->user_id = $user->id;
    
        $tarefas->save();
    
        return redirect('/')->with('message', 'Tarefa adicionada com sucesso!!!');
    }

    public function detail($id){

        $tarefa = Schema_tarefa::findOrFail($id);
        $dono = User::where('id', $tarefa->user_id)->first();
        return view('detail', ['tarefa'=>$tarefa, 'dono'=>$dono]);

    }
    
    
    public function destroy($id){

        Schema_tarefa::findOrFail($id)->delete();
        return redirect('/')->with('message', 'Tarefa deletada com sucesso!!!');

    }

        
    public function edit($id){

        $tarefa = Schema_tarefa::findOrFail($id);
        return view('edit', ['tarefa'=>$tarefa]);

    }
    
            
    public function editconfirm(Request $request){

        Schema_tarefa::findOrFail($request->id)->update($request->all());
        return redirect('/')->with('message', 'Tarefa editada com sucesso!!!');

    }

}