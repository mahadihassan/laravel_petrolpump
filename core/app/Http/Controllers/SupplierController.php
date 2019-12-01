<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Repayment;
use Illuminate\Support\Facades\Input;

class SupplierController extends Controller
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
        $data['page_title']="Supplier index";
        $data['suppliers']=Supplier::all();
        return view('Supplier.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Supplier Create";
        return view('Supplier.create', $data);
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
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
        ]);
        $supplier=new Supplier;
        $supplier->name=$request->input('name');
        $supplier->email=$request->input('email');
        $supplier->phone=$request->input('phone');
        $supplier->address=$request->input('address');
        $supplier->status=$request->input('status')== 'on' ? 1 : 0 ;
        $supplier->save();
        session()->flash('message', 'Supplier Create Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title']="Supplier Edit";
        $data['supplier']=Supplier::find($id);
        return view('Supplier.edit', $data);
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
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
        ]);
        $supplier=Supplier::findOrFail($id);
        $supplier->name=$request->input('name');
        $supplier->email=$request->input('email');
        $supplier->phone=$request->input('phone');
        $supplier->address=$request->input('address');
        $supplier->status=$request->input('status')== 'on' ? 1 : 0 ;
        $supplier->save();
        session()->flash('message', 'Supplier Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
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
            'id'=>'required'
        ]);
        Supplier::destroy($request->id);
        session()->flash('message', 'Supplier Delete Successfully');
        session()->flash('type', 'success');
        return redirect()->back();
    }


    public function Repayment(Request $request)
    {
        $data['page_title']='Supplier Repayment';
        $data['suppliers']=Supplier::all();
        return view('Repayment.create', $data);
    }

    public function getBalance(Request $request)
    {
        $id = $request->input('ln_id');
        $supplier = Supplier::findOrFail($id);
        return $supplier->balance;
    }

    public function PutRepayment(Request $request){
        $this->validate($request, [
            'supplier_id'=>'required',
            'payment'=>'required',
            'note'=>'required'
        ]);

        $supplier = Supplier::findOrFail($request->supplier_id);
        $re = Input::except("_method",'_token','balance','after_payment');
        $re['old_balance'] = $supplier->balance;
        $re['payment'] = $request->payment;
        $re['new_balance'] = $supplier->balance - $request->payment;
        Repayment::create($re);
        $supplier->balance = $supplier->balance - $request->payment;
        $supplier->save();
        session()->flash('message', 'Payment Successfully.');
        session()->flash('type','success');
        return redirect()->back();

    }

    public function getRepayment()
    {
        $data['page_title']="Repayment History";
        $data['repayments']=Repayment::all();
        return view('Repayment.index', $data);
    }

    public function deleteRepayment(Request $request)
    {
        $request->validate([
            'id'=>'required'
        ]);
        Repayment::destroy($request->id);
        session()->flash('message', 'Repayment Delete Successfully.');
        session()->flash('type','success');
        return redirect()->back();

    }













}
