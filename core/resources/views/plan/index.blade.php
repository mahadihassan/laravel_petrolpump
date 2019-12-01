@extends('layouts.dashboard')
@section('style')
<link rel="stylesheet" href="{{asset('public/assets/admin/css/pricing.css')}}">
@endsection
@section('content')

<section id="horizontal-form-layouts">

    <div class="row no-gutters">
        @foreach($plan as $k => $p)
        <div class="col-md-4 pr-1">
            <div class="list-group text-center my-3">
                <div class="list-group-item text-white bg-dark">
                    <h4 class="text-center text-uppercase font-weight-bold my-1">{{$p->name}}</h4>
                </div>
                <div class="list-group-item text-uppercase font-weight-bold">
                    <h3>
                    @if($p->price_type == 0)
                        FREE
                    @else
                        {{$basic->symbol}}{{$p->price}}
                    @endif
                    </h3>
                </div>
                @if($p->plan_type == 0)
                <a href="#" class="list-group-item">
                    <h4>{{$p->duration}} - Days</h4>
                </a>
                @else
                    <a href="#" class="list-group-item">
                        <h4>Unlimited</h4>
                    </a>
                @endif
                <a href="#" class="list-group-item">
                    <h4>Support - {{$p->support}}</h4>
                </a>
                <a href="#" class="list-group-item">
                    <h4>Telegram Alert - {{$p->telegram_status == 1 ? 'YES' : 'NO'}}</h4>
                </a>
                <a href="#" class="list-group-item">
                    <h4>Email Alert - {{$p->email_status == 1 ? 'YES' : 'NO'}}</h4>
                </a>
                <a href="#" class="list-group-item">
                    <h4>SMS Alert - {{$p->sms_status == 1 ? 'YES' : 'NO'}}</h4>
                </a>
                <a href="#" class="list-group-item">
                    <h4>Coaching Status - {{$p->coaching_status == 1 ? 'YES' : 'NO'}}</h4>
                </a>
                <a href="#" class="list-group-item">
                    <h4>Call Consulting - {{$p->call_status == 1 ? 'YES' : 'NO'}}</h4>
                </a>
                <a href="#" class="list-group-item">
                    <h4>{{$p->status == 1 ? 'ACTIVE' : 'DEACTIVE'}}</h4>
                </a>

                <div class="list-group-item">
                    <a href="{{url('admin/plan-edit/'.$p->id)}}" class="btn btn-secondary btn-lg btn-block text-truncate"><i class="fa fa-edit"></i> EDIT PLAN</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section><!---ROW-->






{{--
    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title bold" id="myModalLabel"> <i class='fa fa-exclamation-triangle'></i> Confirmation !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('plan-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="abir_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>--}}

@endsection
@section('scripts')

    {{--<script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $(".abir_id").val(id);
            });
            
        });
    </script>

    <script>
        $(document).ready(function (e) {
            $(document).on("click", '.publish_button', function (e) {
                var id = $(this).data('id');
                $(".confirm_id").val(id);
            });
        });
    </script>--}}

@endsection
