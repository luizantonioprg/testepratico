<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Container;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias= Categoria::all();
        return view('create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cliente'=>'required|string|max:20',
            'numero'=>'required|string|max:11',
            'tipo'=>['required','integer', 'regex:(20|40)'],
            'status'=>['required','string', 'regex:(CHEIO|VAZIO)'],
            'categoria'=>'required|integer'
        ]);
        $container = new Container([
           'cliente' => $request->get('cliente'),
           'numero' => $request->get('numero'),
           'tipo' => $request->get('tipo'),
           'status' => $request->get('status'),
           'id_categoria' => $request->get('categoria')
        
        ]);
        $container->save();
        return redirect()->back()->withSuccess('Container Cadastrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categorias= Categoria::all();
        $container = Container::find($id);
        return view('edit',compact('categorias','container'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'cliente'=>'required|string|max:20',
            'numero'=>'required|string|max:11',
            'tipo'=>['required','integer', 'regex:(20|40)'],
            'status'=>['required','string', 'regex:(CHEIO|VAZIO)'],
            'categoria'=>'required|integer'
        ]);

        $container = Container::find($id);
        $container->cliente = $request->get('cliente');
        $container->numero = $request->get('numero');
        $container->tipo = $request->get('tipo');
        $container->status = $request->get('status');
        $container->id_categoria = $request->get('categoria');
        $container->save();
        return redirect()->back()->withSuccess('Container Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $container = Container::find($id);
        $container->delete();
        return redirect('/')->with('success', 'Container deletado!');
    }
    public function export(Request $request){
        $coluna = $request->get('coluna');
        $containers = Container::all()->groupBy($coluna);
       
        print_r($containers)."<br>";
    }
}
