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
                            <form action="{{ route('load-store') }}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                 <div class="form-body">

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Machine Name</strong></label>
                                        <div class="col-md-12">
                                            <select name="machine_id" id="machine_id" class="form-control" required>
                                                <option value="">Select Machine</option>
                                                @foreach($machine as $machines)
                                                    <option value="{{$machines->id}}">{{$machines->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Fuel Name</strong></label>
                                        <div class="col-md-12">
                                            <input type="text" name="fuel_name" readonly="readonly" id="fuel_name" class="form-control input-lg" required/>
                                        </div>
                                    </div>

                                    <input type="hidden" name="fuel_id" id="fuel_id">
                                    

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Fuel Current Store</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input type="text" name="fuel_store" readonly="readonly" id="fuel_store" class="form-control input-lg" required/>
                                                <span class="input-group-addon"><strong>{{$basic->unit}}</strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Quantity</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                               <input type="text" name="quantity" id="quantity" class="form-control input-lg" placeholder="Quantity" required/>
                                                <span class="input-group-addon"><strong>{{$basic->unit}}</strong></span>
                                            </div>
                                            
                                        </div>
                                    </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-block bold btn-lg uppercase" disabled="disabled" id="subBtn"><i class="fa fa-send"></i> Submit</button>
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

    <script>
        $(document).ready(function(){
            $(document).on('change','#machine_id',function(e){
                var ln_id = e.target.value;
                var url = '{{ url('/') }}';
                $.get(url + '/admin/get-fuel?ln_id=' + ln_id,function (data) {
                    console.log(data);
                    $('#fuel_id').val(data.fuel_id);
                    $('#fuel_name').val(data.fuel_name);
                    $('#fuel_store').val(data.store);
                })
            })
            $(document).on('input','#quantity',function(e){

                var fuel_store = $('#fuel_store').val();
                var quantity = $("#quantity").val();

                if(quantity>fuel_store){
                    toastr.warning('Quantity is large then Sore.');
                    document.getElementById('subBtn').disabled = true;
                }
                else{
                    document.getElementById('subBtn').disabled = false;
                }
            })
            
        });
    </script>

@endsection
