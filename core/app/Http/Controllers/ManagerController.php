<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Manager;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Session;
class ManagerController extends Controller
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
        $data['page_title']="All Manager";
        $data['managers']=Manager::all();
        $data['branchs']=Branch::all();
        return view('Manager.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title']="Manager Create";
        $data['branchs']=Branch::all();
        return view('Manager.create',$data);
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
            'branch'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'image'=>'required',
            'file'=>'required',
            'address'=>'required',
            'password'=>'required|confirmed'
        ]);

        $manager=New Manager;
        $manager->branch_id=$request->input('branch');
        $manager->name=$request->input('name');
        $manager->phone=$request->input('phone');
        $manager->email=$request->input('email');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename =time().'.'.$image->getClientOriginalExtension();
            $location = "assets/images/manager/$filename";
            Image::make($image)->save($location);
            $manager->image=$filename;
        }
        if ($request->hasFile('file')){
            $nid = $request->file('file');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = "./assets/images/manager/";
            $nid->move($location,$filename);
            $manager->nid = $filename;
        }
        $manager->address=$request->input('address');
        $manager->password=Hash::make($request->password);
        $manager->status=$request->input('status')== 'on' ? 1 : 0 ;
        $manager->save();
        session()->flash('message', 'Manager Created Successfully.');
        Session::flash('type', 'success');
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
        $data['page_title']="Manager Edit";
        $data['branchs']=Branch::all();
        $data['managers']=Manager::find($id);
        return view('Manager.edit', $data);
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
        $manager=Manager::find($id);
        $manager->branch_id=$request->input('branch');
        $manager->name=$request->input('name');
        $manager->phone=$request->input('phone');
        $manager->email=$request->input('email');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename =time().'.'.$image->getClientOriginalExtension();
            $location = "assets/images/manager/$filename";
            Image::make($image)->save($location);
            $manager->image=$filename;
        }
        if ($request->hasFile('file')){
            $nid = $request->file('file');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = "./assets/images/manager/";
            $nid->move($location,$filename);
            $manager->nid = $filename;
        }
        $manager->address=$request->input('address');
        $manager->status=$request->input('status')== 'on' ? 1 : 0 ;
        $manager->save();
        session()->flash('message', 'Manager Update Successfully.');
        Session::flash('type', 'success');
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

        Manager::destroy($request->id);
        session()->flash('message', 'Manager Delete Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function reset(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $manager=Manager::findOrFail($request->id);
        $manager->password=Hash::make('123456');
        $manager->save();
        session()->flash('message', 'Manager Reset Password Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
}
