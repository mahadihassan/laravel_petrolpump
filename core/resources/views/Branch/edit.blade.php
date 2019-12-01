@extends('layouts.dashboard')

@section('style')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-tagsinput.css')}}">
    <link href="{{ asset('assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
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
                            <form action="{{ route('branch-update',$branch->id)}}" method="post">
                                {{csrf_field()}}
                                 <div class="form-body">
                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Name</strong></label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" class="form-control input-lg" value="{{$branch->name}}" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Phone</strong></label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone" class="form-control input-lg" value="{{$branch->phone}}" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Email</strong></label>
                                        <div class="col-md-12">
                                            <input type="Email" name="email" class="form-control input-lg" value="{{$branch->email}}" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Address</strong></label>
                                        <div class="col-md-12">
                                            <textarea name="address" class="form-control" rows="3" placeholder="Address" >{{$branch->address}}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Status<span class="text-danger">*</span></strong></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle"  {{$branch->status == 1 ? 'checked' : ''}}  data-onstyle="success" data-offstyle="danger" data-on="Show" data-off="Hide" data-width="100%" type="checkbox" name="status">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-block bold btn-lg uppercase"><i class="fa fa-send"></i> Update Branch</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->


@endsection
@section('scripts')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
    <script src="{{asset('assets/admin/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/nicEdit.js') }}"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true,iconsPath : '{{ asset('assets/admin/js/nicEditorIcons.gif') }}'}).panelInstance('area1');
        });
    </script>

@endsection
