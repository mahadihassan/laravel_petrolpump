<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Image;


class ExpenseController extends Controller
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
        $data['page_title']='';
        $data['expenses']=Expense::all();
        return view('Expense.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Expense Create";
        return view('Expense.create',$data);
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
            'cost'=>'required'
        ]);
        $expense= New Expense;
        $expense->name=$request->input('name');
        $expense->cost=$request->input('cost');
        $expense->status=$request->input('status')=='on'? 1 : 0;
        $expense->save();
        session()->flash('message', 'Branch Create Successfully.');
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
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        Expense::destroy($request->id);
        session()->flash('message', 'Expense Delete Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
}
