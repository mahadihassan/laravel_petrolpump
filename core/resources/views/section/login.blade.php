@extends('layouts.dashboard')

@section('style')

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
                            {!! Form::open(['route'=>'login-section','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-10 offset-1">

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Login Title</strong></label>
                                            <div class="col-md-12">
                                                <input name="login_title" type="text" class="form-control input-lg" value="{{$section->login_title}}" placeholder="Title" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Login Description</strong></label>
                                            <div class="col-md-12">
                                                <textarea name="login_description" id="area2" cols="10" rows="3" class="form-control input-lg" placeholder="Description" required>{{ $section->login_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Previous Login Image</strong></label>
                                            <div class="col-md-12">
                                                <img src="{{ asset('assets/images') }}/{{$section->login_image}}"
                                                     alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12"><strong style="text-transform: uppercase;">Login Image</strong></label>
                                            <div class="col-md-12">
                                                <input name="login_image" type="file" class="form-control input-lg" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- row -->
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('scripts')

@endsection
