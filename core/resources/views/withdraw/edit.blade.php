@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
@endsection
@section('content')


    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">{{$page_title}}</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-12"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-10 offset-1">

                                    {!! Form::model($withdraw,['route'=>['withdraw-update',$withdraw->id],'method'=>'put','role'=>'form', 'class'=>'form-horizontal', 'files'=>true]) !!}
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Method Name :</b> </label>
                                            <div class="col-sm-12">
                                                <input name="name" value="{{ $withdraw->name }}" class="form-control input-lg" type="text" required placeholder="Plan Name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Display Image</strong></label>
                                            <div class="col-md-12">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 250px; height: 140px;" data-trigger="fileinput">
                                                        <img style="width: 250px" src="{{ asset('assets/images/withdraw') }}/{{$withdraw->image}}" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 140px"></div>
                                                    <div>
                                                    <span class="btn btn-info btn-file bg-softwarezon-y border-0">
                                                        <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                        <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                        <input type="file" name="image" accept="image/*">
                                                    </span>
                                                        <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                                    </div>
                                                    <b style="color: red;">Image Type PNG,JPEG,JPG. Resize - (290X190)</b><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Withdraw Charge : </b></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input name="charge" value="{{$withdraw->charge}}" class="form-control input-lg" type="text" placeholder="Withdraw Charge" >
                                                            <span class="input-group-addon"><strong>{{$basic->currency}}</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Duration : </b></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input name="duration" value="{{$withdraw->duration}}" class="form-control input-lg" type="text" required placeholder="Duration" >
                                                            <span class="input-group-addon"><strong>Days</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Withdraw Minimum : </b></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input name="withdraw_min" value="{{ $withdraw->withdraw_min }}" class="form-control input-lg" type="text" placeholder="Withdraw Minimum" >
                                                            <span class="input-group-addon"><strong>{{$basic->currency}}</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"><b>Withdraw Maximum : </b></label>
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <input name="withdraw_max" value="{{$withdraw->withdraw_max}}" class="form-control input-lg" type="text" placeholder="Withdraw Maximum" >
                                                            <span class="input-group-addon"><strong>{{$basic->currency}}</strong></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>Publication Status : </b></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" {{ $withdraw->status == 1 ? 'checked' : '' }} data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary bg-softwarezon-x btn-lg btn-block "> <i class="fa fa-send"></i> Update Withdraw Method</button>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->


@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
@endsection
