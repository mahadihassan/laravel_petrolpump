<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\StoreFuel;
use App\Supplier;
use App\Fuel;

class StoreFuelController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkInstaller');
        $this->middleware('basicView');
        $this->middleware('auth:admin');
    }
    public function index()
    {
    	$data['page_title']="History Fuel";
        $data['fuels']=Fuel::all();
        $data['storefuels']=StoreFuel::orderBy('id', 'desc')->get();
        return view('StoreFuel.index', $data);
    }

    public function create()
    {
    	$data['page_title']="Store Create";
        $data['suppliers']=Supplier::all();
        $data['fuels']=Fuel::all();
        return view('StoreFuel.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'supplier_id'=>'required',
            'fuel_id'=>'required',
            'buy_rate'=>'required',
            'quantity'=>'required'
        ]);

        $fuel = Fuel::findOrFail($request->fuel_id);
        $fuel->store = $fuel->store + $request->quantity;
        $fuel->save();
        $store=New StoreFuel;
        $store->supplier_id=$request->input('supplier_id');
        $store->fuel_id=$request->input('fuel_id');
        $store->buy_rate=$request->input('buy_rate');
        $store->quantity=$request->input('quantity');
        $store->amount=$request->buy_rate * $request->quantity;
        $store->status=$request->input('status')== 'no' ? 1 : 0;
        $store->save();
        $supplier= Supplier::findOrFail($request->supplier_id);
        $supplier->balance=$supplier->balance + $request->buy_rate*$request->quantity;
        $supplier->save();
        session()->flash('message','Create StoreFuel Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        
        $request->validate([
            'id' => 'required'
        ]);
        $log = StoreFuel::findOrFail($request->id);
        $fuel = Fuel::findOrFail($log->fuel_id);
        $fuel->store=$fuel->store - $log->quantity;
        $fuel->save();
        $supplier=Supplier::findOrFail($log->supplier_id);
        $supplier->balance=$supplier->balance - $log->amount;
        $supplier->save();
        $log->delete();
        session()->flash('message', 'Fuel Delete Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    
}
