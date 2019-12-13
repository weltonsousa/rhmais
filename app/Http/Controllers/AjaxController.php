<?php

namespace App\Http\Controllers;

use App\BeneficioEstagiario;
use Illuminate\Http\Request;
use DataTables;
use DB;


class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            // $data = BeneficioEstagiario::latest()->get();
            $data = DB::table('beneficio_estagiario')->where('folha_id','=', $request->id)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                        }
        return view('ajax-crud',compact('products'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               BeneficioEstagiario::updateOrCreate(['id' => $request->product_id],
                ['referencia' => $request->referencia, 'valor' => $request->valor,  'tipo' => $request->tipo]);
        return response()->json(['success'=>'Evento lançado.']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       BeneficioEstagiario::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BeneficioEstagiario::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
