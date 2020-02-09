<?php

namespace App\Http\Controllers;

use App\Coche;
use Illuminate\Http\Request;
use App\Marca;
use App\Rules\Matricula;
use Illuminate\Support\Facades\Storage;
class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $tipos=['Diesel', 'Gasolina', 'Hibrido', 'Eléctrico', 'Gas'];
        $marca=$request->get('marca_id');
        $tipo=$request->get('tipo');
        $marcas=Marca::orderBy('nombre')->get();
        $coches=Coche::orderBy('marca_id')
        ->marca_id($marca)
        ->tipo($tipo)
        ->paginate(2);
        return view('coches.index', compact('coches','marcas','request', 'tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=Marca::orderBy('nombre')->get();
        return view('coches.crear', compact('marcas'));
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
            'matricula'=>['required','unique:coches,matricula',new Matricula()],
            'modelo'=>['required']
        ]);
        //compruebo si he subido archivo
        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            //Todo bien hemos subido un archivo y es de imagen
            $file=$request->file('foto');
            //creo un nombre
            $nombre='coches/'.time().' '.$file->getClientOriginalName();
            //guardo ek archivo imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //guardo el coche pero la imagn estaria mal
            $coche=Coche::create($request->all());
            //actualiza el registro foto del coche guardado
            $coche->update(['foto'=>"img/$nombre"]);
        }
        else{
            Coche::create($request->all());
        }

        return redirect()->route('coches.index')->with('mensaje','Coche guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function show(Coche $coch)
    {
        return view('coches.show', compact('coch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function edit(Coche $coch)
    {
        //
        $marcas=Marca::orderBy('nombre')->get();
        $tipos=['Diesel', 'Gasolina', 'Hibrido', 'Eléctrico', 'Gas'];
        return view('coches.editar', compact('coch', 'marcas', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coche $coch)
    {
        $foto=$coch->foto;
        $request->validate([
            'matricula'=>['required','unique:coches,matricula,'.$coch->id,new Matricula()],
            'modelo'=>['required']
        ]);
        //compruebo si he subido archivo
        if($request->has('foto')){
            $request->validate([
                'foto'=>['image']
            ]);
            //compruebo que no sea la default
            
            if(basename($foto)!="default.jpg"){
                //la borro No es default.jpg
                unlink($foto);
            }
            //Todo bien hemos subido un archivo y es de imagen
            $file=$request->file('foto');
            //creo un nombre
            $nombre='coches/'.time().' '.$file->getClientOriginalName();
            //guardo ek archivo imagen
            Storage::disk('public')->put($nombre, \File::get($file));
            //guardo el coche pero la imagn estaria mal
            $coch->update($request->all());
            //actualiza el registro foto del coche guardado
            $coch->update(['foto'=>"img/$nombre"]);
        }
        else{
            $coch->update($request->all());
            
        }

        return redirect()->route('coches.index')->with('mensaje','Coche modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coche $coch)
    {
        //Dos cosas borrar la imagen si no es defalt.jpg
        //y borrar registro
        $foto=$coch->foto;
        if(basename($foto)!="default.jpg"){
            //la borro No es default.jpg
            unlink($foto);
        }
        //en cualquier caso borro el registro
        $coch->delete();
        return redirect()->route('coches.index')->with('mensaje','Coche borrado correctamente');
    }
}
