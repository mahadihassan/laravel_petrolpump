<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel;
use App\StoreFuel;


class FuelController extends Controller
{

     public function __construct()
    {
        $this->middleware('checkInstaller');
        $this->middleware('basicView');
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title']="Index Fuel";
        $data['fuels']=Fuel::all();
        return view('fuel.index-fuel',$data);

    }
        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Fuel Create";
        return view('fuel.create',$data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'rate'=>'required'
        ]);
        $fuel=New Fuel;
        $fuel->name=$request->input('name');
        $fuel->rate=$request->input('rate');
        $fuel->status=$request->input('status') == 'on' ? 1 : 0;
        $fuel->save();
        session()->flash('message','Fuel Create Successfully.');
        session()->flash('type','success');
        return redirect()->back();

    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function FuelEdit($id)
    {
        $data["page_title"]="Edit Fuel";
        $data['fuels']=Fuel::find($id);
        return view('fuel.edit-fuel', $data);
    }
     public function FuelUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'rate'=>'required'
        ]);
        $fuel=Fuel::find($id);
        $fuel->name=$request->input('name');
        $fuel->rate=$request->input('rate');
        $fuel->status=$request->input('status') == 'on' ? 1 : 0;
        $fuel->save();
        session()->flash('message','Fuel Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();

    }

     public function delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        Fuel::destroy($request->id);
        session()->flash('message', 'Fuel Delete Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }


}
