<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FuelMachine;
use App\Fuel;
use App\LoadFuel;
use Response;

class LoadFuelController extends Controller
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
        $data['page_title']="LoadFuel Index";
        $data['loadfuels']=LoadFuel::all();
        return view('LoadFuel.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getfuel(Request $request)
    {
        $id = $request->input('ln_id');
        $loadfuel = FuelMachine::findOrFail($id);
        $rr['fuel_name'] = $loadfuel->fuel->name;
        $rr['fuel_id'] = $loadfuel->fuel_id;
        $rr['store'] = $loadfuel->fuel->store;
        return Response::json($rr);
    }


    public function create()
    {
        $data['page_title']="LoadFuel Create";
        $data['machine']=FuelMachine::all();
        return view('LoadFuel.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'machine_id'=>'required',
            'fuel_id'=>'required',
            'quantity'=>'required'
        ]);
        $loadfuel=New LoadFuel;
        $loadfuel->machine_id=$request->input('machine_id');
        $loadfuel->fuel_id=$request->input('fuel_id');
        $loadfuel->quantity=$request->input('quantity');
        $loadfuel->save();
        session()->flash('message', 'LoadFuel Create Successfully.');
        session()->flash('type','success');
        return redirect()->back();

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
    public function update(Request $request, $id)
    {
        //
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
    }
}
