<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use Storage;

class NoticiasController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrar()
    {
        $noticias = Noticia::all();
        return view('welcome')->with(['noticias' => $noticias]);
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
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);

        //dd($request->titulo,$request->descripcion);

        
         $noticia = new Noticia();
         $noticia->titulo = $request->titulo;
         $noticia->descripcion = $request->descripcion;
         //$noticia->urlimg = $request->null;
         $img = $request->file('urlimg');
         $file_rote = time().'_'.$img->getClientOriginalName();

         Storage::disk('image')->put($file_rote, file_get_contents($img->getRealPath() ));
         $noticia->urlimg = $file_rote;

         if($noticia->save()){

            return back()->with('msj','Datos guardados');

         }else{

            return back()->with('errormsj', 'No se almacenaron los datos');

         }

         //dd("datos guardados");
          //redireciona sin necesidad de recargar la pagina
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
        $noticia = Noticia::findOrFail($id);
        //redireccionando
        return view('home')->with(['edit'=> true, 'noticia' => $noticia]); //condición para no mostrar la tabla list y agregar solo modificar con los datos retornados
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

        $this->validate($request, [
            'titulo' => 'required',
            'descripcion' => 'required'
        ]);

        $noticia = Noticia::find($id);

        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request->descripcion;
        //$noticia->urlimg = $request->null;
        $img = $request->file('urlimg');
        $file_rote = time().'_'.$img->getClientOriginalName();

        Storage::disk('image')->put($file_rote, file_get_contents($img->getRealPath() ));
        Storage::disk('image')->delete($request->img);
        $noticia->urlimg = $file_rote;

        if($noticia->save()){

           return redirect('home');

        }else{

           return back()->with('errormsj', 'No se almacenaron los datos');

        }

        
        //dd("update");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$noticia = Noticia::findOrFail($id);
        //return redirec('home');
        Noticia::destroy($id);
        return back();
       
    }
}
