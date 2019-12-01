<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;

class BranchController extends Controller
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
        $data['page_title']="All Branch";
        $data['branch']=Branch::all();
        return view('Branch.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Branch Create";
        return view('Branch.create',$data);
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
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);
        $branch=New Branch;
        $branch->name=$request->input('name');
        $branch->phone=$request->input('phone');
        $branch->email=$request->input('email');
        $branch->address=$request->input('address');
        $branch->status=$request->input('status')== 'on' ? 1 : 0 ;
        $branch->save();
        session()->flash('message', 'Branch Create Successfully.');
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
        $data['page_title']="Branch Edit";
        $data['branch']=Branch::find($id);
        return view('Branch.edit', $data);
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
         $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required'
        ]);
        $branch=Branch::find($id);
        $branch->name=$request->input('name');
        $branch->phone=$request->input('phone');
        $branch->email=$request->input('email');
        $branch->address=$request->input('address');
        $branch->status=$request->input('status')== 'on' ? 1 : 0 ;
        $branch->save();
        session()->flash('message', 'Branch Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $request->validate([
            'id' => 'required'
        ]);

        Branch::destroy($request->id);
        session()->flash('message', 'Branch Delete Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
}
