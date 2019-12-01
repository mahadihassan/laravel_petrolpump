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

                                    {!! Form::open(['url' => '/admin/plan-create', 'method'=>'post', 'role'=>'form', 'class'=>'form-horizontal', 'files'=>true]) !!}
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Plan Name :</b> </label>
                                            <div class="col-sm-12">
                                                <input name="name" value="" class="form-control input-lg" type="text" required placeholder="Plan Name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Plan Duration Type : </b></label>
                                            <div class="col-sm-12">
                                                <select name="plan_type" id="plan_type" class="form-control input-lg font-weight-bold">
                                                    <option value="" class="font-weight-bold">Select One</option>
                                                    <option value="0" class="font-weight-bold">Limited</option>
                                                    <option value="1" class="font-weight-bold">Unlimited</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="duration" style="display: none">
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label"><b>Duration : </b></label>
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input name="duration" value="" class="form-control input-lg" type="text" required placeholder="Duration" >
                                                        <span class="input-group-addon"><strong>Days</strong></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Price Type : </b></label>
                                            <div class="col-sm-12">
                                                <select name="price_type" id="price_type" class="form-control input-lg font-weight-bold">
                                                    <option value="" class="font-weight-bold">Select One</option>
                                                    <option value="0" class="font-weight-bold">FREE Plan</option>
                                                    <option value="1" class="font-weight-bold">PAID Plan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group" id="price" style="display: none">
                                            <label class="col-sm-12 control-label"><b>Plan Price : </b></label>
                                            <div class="col-sm-12">
                                            <div class="input-group">
                                                <input name="price" value="" class="form-control input-lg" type="text" placeholder="Plan Price" >
                                                <span class="input-group-addon"><strong>{{$basic->currency}}</strong></span>
                                            </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-12 control-label"><b>Support : </b></label>
                                            <div class="col-sm-12">
                                            <div class="input-group">
                                                <input name="support" value="" class="form-control input-lg" type="text" required placeholder="Support" >
                                                <span class="input-group-addon"><strong><i class="fa fa-question-circle"></i></strong></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>Telegram Alert : </b></label>
                                            <div class="col-md-12">
                                                   <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="telegram_status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>Email Alert : </b></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="email_status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>SMS Alert : </b></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="sms_status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>One On One Coaching : </b></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="coaching_status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>On Call Consulting  : </b></label>
                                            <div class="col-md-12">
                                                <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="call_status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 control-label"><b>Publication Status : </b></label>
                                            <div class="col-md-12">
                                                   <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off" data-width="100%" type="checkbox" name="status">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block "> <i class="fa fa-send"></i> Create New Plan</button>
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
    <script>
        $(document).ready(function () {
            $(document).on("change", '#plan_type', function (e) {
                var type = $(this).val();
                if (type == "0"){
                    var duration = document.getElementById('duration');
                    duration.style.display='block';
                }else if (type == "1"){
                    var duration = document.getElementById('duration');
                    duration.style.display='none';
                }
            });
            $(document).on("change", '#price_type', function (e) {
                var type = $(this).val();
                if (type == "0"){
                    var duration = document.getElementById('price');
                    duration.style.display='none';
                }else if (type == "1"){
                    var duration = document.getElementById('price');
                    duration.style.display='block';
                }
            });
        });
    </script>
@endsection
