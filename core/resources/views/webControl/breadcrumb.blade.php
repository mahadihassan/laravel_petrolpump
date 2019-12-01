@extends('layouts.dashboard')
@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@endsection
@section('content')


    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">{{$page_title}}</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
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
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" id="horz-layout-basic">Change Image</h4>
                                        </div>
                                        <div class="card-content collpase show">
                                            <div class="card-body">

                                            {!! Form::open(['files'=>true]) !!}

                                            <div class="row">

                                                <div class="form-group">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Change Breadcrumb</strong></label>
                                                    <div class="col-sm-12">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="input-group input-large">
                                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                    <span class="fileinput-filename"> </span>
                                                                </div>
                                                                <span class="input-group-addon btn default btn-file">
                                                                            <span class="fileinput-new bold"> Change Breadcrumb </span>
                                                                            <span class="fileinput-exists bold"> Change </span>
                                                                            <input type="file" name="breadcrumb"> </span>
                                                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                            <code>Breadcrumb Mimes Type : png,jpeg,jpg | Resize 1970X650</code>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i> UPDATE</button>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" id="horz-layout-basic">Currenct Image</h4>
                                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
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
                                                <img class="img-responsive" width="100%" src="{{ asset('assets/images') }}/{{ $basic->breadcrumb }}" alt="logo">
                                            </div>
                                        </div>
                                    </div>
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
@endsection
