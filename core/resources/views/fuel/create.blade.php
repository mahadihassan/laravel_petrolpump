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
                            <form action="{{ route('fuel-store') }}" method="post">
                                {{csrf_field()}}
                                 <div class="form-body">
                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Fuel Name</strong></label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" class="form-control input-lg" placeholder="Fuel Name" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Fuel Sell Rate</strong></label>
                                        <div class="col-md-12">
                                            <input type="number" name="rate" class="form-control input-lg" placeholder="Sell Rate" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Publication Status<span class="text-danger">*</span></strong></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle"  data-onstyle="success" data-offstyle="danger" data-on="Show" data-off="Hide" data-width="100%" type="checkbox" name="status">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button type="submit"class="btn btn-primary btn-block bold btn-lg uppercase"><i class="fa fa-send"></i>Create Fuel</button>
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
