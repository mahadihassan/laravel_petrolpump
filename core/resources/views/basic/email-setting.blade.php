@extends('layouts.dashboard')
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


                            {!! Form::model($email,['route'=>['email-update',$email->id],'method'=>'PUT','class'=>'form form-horizontal']) !!}

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Email Driver </strong></label>
                                                <div class="col-md-12">
                                                    <select name="driver" id="driver" class="form-control">
                                                        @if($email->driver == 'mail')
                                                            <option value="mail" selected>PHP Mailer</option>
                                                            <option value="smtp">SMTP Mailer</option>
                                                        @else
                                                            <option value="mail">PHP Mailer</option>
                                                            <option value="smtp" selected>SMTP Mailer</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Sender Email </strong></label>
                                                <div class="col-md-12">
                                                    <input name="email" value="{{ $email->email }}" class="form-control input-lg" placeholder="Sender Email" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-12"><strong style="text-transform: uppercase;">Sender Name </strong></label>
                                                <div class="col-md-12">
                                                    <input name="name" value="{{ $email->name }}" class="form-control input-lg" placeholder="Sender name" required/>
                                                </div>
                                            </div>
                                            <div id="smtp" style="display: {{ $email->driver == 'smtp' ? 'block' : 'none' }}">
                                                <hr>

                                                    <label><strong style="text-transform: uppercase;">SMTP Status : </strong>
                                                        @if($email->smtp_status == 0)
                                                            <strong style="text-transform: uppercase;" class="red"> (<i class="fa fa-times"></i>Not Verified)</strong>
                                                        @else
                                                            <strong style="text-transform: uppercase;" class="su"> (<i class="fa fa-check"></i>Verified)</strong>
                                                        @endif
                                                    </label>
                                                <hr>
                                                <div class="form-group row">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">SMTP Host </strong></label>
                                                    <div class="col-md-12">
                                                        <input name="host" value="{{ $email->host }}" class="form-control input-lg" placeholder="SMTP Host"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">SMTP Host Port </strong></label>
                                                    <div class="col-md-12">
                                                        <input name="port" value="{{ $email->port }}" class="form-control input-lg" placeholder="SMTP Host Port"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">SMTP Username </strong></label>
                                                    <div class="col-md-12">
                                                        <input name="username" value="{{ $email->username }}" class="form-control input-lg" placeholder="SMTP Username"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">SMTP Password </strong></label>
                                                    <div class="col-md-12">
                                                        <input name="pass" value="{{ $email->password }}" class="form-control input-lg" placeholder="SMTP Password" type="text"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-12"><strong style="text-transform: uppercase;">SMTP Encryption </strong></label>
                                                    <div class="col-md-12">
                                                        <input name="encryption" value="{{ $email->encryption }}" class="form-control input-lg" placeholder="SMTP Encryption"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary btn-block bold btn-lg text-uppercase"><i class="fa fa-send"></i> Update Setting</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->
@endsection
@section('scripts')
    <script>
        $("#driver").on('change',function(e){
            e.preventDefault();
            if($(this).val()== 'smtp'){
                $('#smtp').show();
            }else{
                $('#smtp').hide();
            }
        });
    </script>
@endsection