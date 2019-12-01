<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BasicSetting;
use App\Balance;

class BalanceController extends Controller
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
        $data['page_title']="Balance History";
        $data['balances']=Balance::orderBy('id', 'desc')->get();
        return view('Balance.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Balance";
        return view('Balance.create', $data);
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
            'amount'=>'required|numeric',
            'type'=>'required',
            'note'=>'required'
        ]);
        
        $basic = BasicSetting::firstOrFail();
        if($request->type==1){
            $basic->balance= $basic->balance + $request->amount;
            $basic->save();
        }else if ($request->type == 2) {
            if ($basic->balance < $request->amount) {
                session()->flash('message', 'Not Enough Money.');
                session()->flash('type','warning');
                return redirect()->back();
            }else{
                $basic->balance= $basic->balance - $request->amount;
                $basic->save();
            }
        }else{
             if ($basic->balance < $request->amount) {
                session()->flash('message', 'Not Enough Money.');
                session()->flash('type','warning');
                return redirect()->back();
            }else{
                $basic->balance= $basic->balance - $request->amount;
                $basic->save();
            }
            
        }

        $balance= New Balance;
        $balance->type=$request->input('type');
        $balance->amount=$request->input('amount');
        $balance->note=$request->input('note');
        $balance->save();
        
        $basic->save();
        session()->flash('message', 'Balance Create Successfully.');
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

        $del=Balance::findOrFail($request->id);

        if($del->type==1){
            $bel=BasicSetting::firstOrFail();
            $bel->balance=$bel->balance - $del->amount;
            $bel->save();
        }
        elseif($del->type==2){
            $bel=BasicSetting::firstOrFail();
            $bel->balance=$bel->balance + $del->amount;
            $bel->save();
        }
        if($del->type==3){
            $bel=BasicSetting::firstOrFail();
            $bel->balance=$bel->balance + $del->amount;
            $bel->save();
        }
        $del->delete();
        session()->flash('message', 'Balance Delete Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
}
