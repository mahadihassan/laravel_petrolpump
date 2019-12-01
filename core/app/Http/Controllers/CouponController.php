<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkInstaller');
        $this->middleware('basicView');
        $this->middleware('auth:admin');
    }

    public function create()
    {
        $data['page_title'] = "Create New Coupon";
        return view('coupon.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|unique:coupons,name',
            'code' => 'required|unique:coupons,code',
        ]);
        $in = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? 1 : 0;
        Coupon::create($in);
        session()->flash('message','Coupon Created Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function show()
    {
        $data['page_title'] = 'All Coupon';
        $data['coupon'] = Coupon::latest()->paginate(10);
        return view('coupon.all',$data);
    }

    public function edit($id)
    {
        $data['page_title'] = "Coupon Title";
        $data['coupon'] = Coupon::findOrFail($id);
        return view('coupon.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $coupon = Coupon::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:coupons,name,'.$coupon->id,
            'code' => 'required|unique:coupons,code,'.$coupon->id,
        ]);
        $in = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? 1 : 0;
        $coupon->update($in);
        session()->flash('message','Coupon Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Coupon::destroy($id);
        session()->flash('message','Coupon Deleted Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
}
