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
                            <form action="{{ route('repayment-store') }}" method="post" class="form-horizontal">
                                {{csrf_field()}}
                                 <div class="form-body">

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Supplier Name</strong></label>
                                        <div class="col-md-12">
                                            <select name="supplier_id" id="supplier_id" class="form-control" required>
                                                <option value="">Select Supplier</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Balance</strong></label>
                                        <div class="col-md-12">
                                            <input type="text" name="balance" id="balance" readonly="readonly" class="form-control input-lg" placeholder="Balance" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Payment</strong></label>
                                        <div class="col-md-12">
                                            <input type="text" name="payment" id="payment" class="form-control input-lg" placeholder="Payment" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">After Payment</strong></label>
                                        <div class="col-md-12">
                                            <input type="text" name="after_payment" readonly="" id="after_payment" class="form-control input-lg" placeholder="Payment" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Note</strong></label>
                                        <div class="col-md-12">
                                            <input type="text" name="note" class="form-control input-lg" placeholder="Note" required/>
                                        </div>
                                    </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-block bold btn-lg uppercase"><i class="fa fa-send"></i> Submit</button>
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
            $(document).on('change','#supplier_id',function(e){
                var ln_id = e.target.value;
                var url = '{{ url('/') }}';
                $.get(url + '/admin/get-supplier?ln_id=' + ln_id,function (data) {
                    $('#balance').val(data);
                    var payment = $("#payment").val();
                    $('#after_payment').val(data - payment);
                })
            })

            $(document).on('input','#payment',function(e){
                var balance = $('#balance').val();
                var payment = $("#payment").val();
                $('#after_payment').val(balance - payment);
            })

            
        });
    </script>
@endsection
