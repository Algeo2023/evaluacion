<?php

namespace App\Http\Controllers;

use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
 

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('tipos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
       try { 
        $sql = DB::insert("insert into tipos(id,nombre)values(?,?)", [
            $request->txtid,
            $request->txtnombre
        ]);

       } catch (\Throwable $th) {
        $sql=0;
       }
        if ($sql == true){
            return back()->with('correcto',"Producto registrado correctamente");
        } else {
            return back()->with('incorrecto',"Error al registrar");
        }
        
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
    public function update(Request $request)
    {
        try { 
            $sql = DB::update(" update tipos set nombre=? acciones=? where id=?", [
                $request->txtnombre,
                $request->acciones,
                $request->txtid,
                
            ]);
            if ($sql==0) {
                $sql==1;
            }
           } catch (\Throwable $th) {
            $sql = 0;
           }
            if ($sql == true) {
                return back()->with('correcto',"Producto modificado correctamente");
            } else {
                return back()->with('incorrecto',"Error al modificar");
            }
            
        }
    


/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try { 
            $sql = DB::destroy(" delete from tipos where id=$id");
    
           } catch (\Throwable $th) {
            $sql=0;
           }
            if ($sql == true){
                return back()->with('correcto',"Producto registrado correctamente");
            } else {
                return back()->with('incorrecto',"Error al registrar");
            }  
    }
}

