<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use App\Branch;
use App\Seller;

class SellerController extends Controller
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
        $data['page_title']="Seller Index";
        $data['sellers']=Seller::all();
        return view('Seller.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']='Seller Create';
        $data['branchs']=Branch::all();
        return view('Seller.create', $data);
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
            'branch_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);
        $seller=New Seller;
        $seller->branch_id=$request->input('branch_id');
        $seller->name=$request->input('name');
        $seller->phone=$request->input('phone');
        $seller->email=$request->input('email');
        $seller->address=$request->input('address');
        $seller->password=Hash::make($request->password);
        $seller->status=$request->input('status')== 'on' ? 1 : 0 ;
        $seller->save();
        session()->flash('message', 'Seller Create Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function ChangePassword(Request $request)
    {
        
        $request->validate([
            'password'=>'required|confirmed'
        ]);

        $seller=Seller::findOrFail($request->id);
        $seller->password=Hash::make($request->password);
        $seller->save();
        session()->flash('message', 'Seller Password Change Successfully.');
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
        $data['page_title']="Seller Edit";
        $data['branchs']=Branch::all();
        $data['seller']=Seller::find($id);
        return view('Seller.edit',$data);
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
        $seller=Seller::find($id);
        $seller->branch_id=$request->input('branch_id');
        $seller->name=$request->input('name');
        $seller->phone=$request->input('phone');
        $seller->email=$request->input('email');
        $seller->address=$request->input('address');
        $seller->status=$request->input('status')== 'on' ? 1 : 0 ;
        $seller->save();
        session()->flash('message', 'Seller Update Successfully.');
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
            'id' => 'required'
        ]);

        Seller::destroy($request->id);
        session()->flash('message', 'Seller Delete Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
}
