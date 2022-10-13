<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Error;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Traemos los datos de la tabla

        $articles = Article::all();
        return $articles;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_use)
    {
        //Creamos un nuevo articulo
         $id_user = User::findOrFail($id_use);
         $article = new Article();
        if($id_user->rol == "administrador"){
            $article->description=$request->description;
            $article->price=$request->price;
            $article->stock=$request->stock;
            $article->visibility=$request->visibility;
    
            $article->save();
        }
        else{
            return response()->json(['status' => 'usuario invalido']);
        }
       
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $user_id)
    {
       
        $articulo = Article::findOrFail($id);//Acá buscamos un articulo en especifico
        $articulo->description=$request->description;
        $articulo->price=$request->price;
        $articulo->stock=$request->stock;
        $articulo->visibility=$request->visibility;
        $articulo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $user_id)
    {
        //
            $id_user = User::findOrFail($user_id);
            if($id_user->rol=="administrador"){   
            $article= Article::destroy($id);
            return $id_user;
            }
            else{
                return response()->json(['status' => 'usuario invalido']);
            }
        
        
    
        
    }
}
