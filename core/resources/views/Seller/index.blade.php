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

                            <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">

                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Branch</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Change Password</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($sellers as $k => $seller)
                                    <tr>
                                        <td>{{ ++$k }}</td>
                                        <td>{{$seller->branch->name}}</td>
                                        <td>{{$seller->name}}</td>
                                        <td>{{$seller->phone}}</td>
                                        <td>{{$seller->email}}</td>
                                        <td>{{$seller->address}}</td>
                                        <td>
                                            @if($seller->status == 1)
                                                <div class="badge badge-success text-uppercase font-weight-bold">
                                                    <i class="fa fa-check"></i> Publish
                                                </div>
                                            @else
                                                <div class="badge badge-warning text-uppercase font-weight-bold">
                                                    <i class="fa fa-times"></i> Unpublish
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger bold uppercase password_button"
                                                    data-toggle="modal" data-target="#passwordModal"
                                                    data-id="{{ $seller->id }}" title="Change-Password">
                                                <i class='fa fa-key'></i> Change
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('seller-edit',$seller->id) }}" class="btn btn-sm btn-primary bold uppercase"><i class="fa fa-edit"></i> Edit</a>
                                            <button type="button" class="btn btn-sm btn-danger bold uppercase delete_button"
                                                    data-toggle="modal" data-target="#DelModal"
                                                    data-id="{{ $seller->id }}" title="Delete">
                                                <i class='fa fa-trash'></i> Delete
                                            </button>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->

    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-share-square"></i>Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="frmProducts" action="{{ route('seller-change-password') }}" method="post" name="frmProducts" class="form-horizontal">

                        {!! csrf_field() !!}

                        <input type="hidden" name="id" class="delete_id" value="0">
            
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 text-right control-label bold uppercase">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control has-error bold " name="password" required="" placeholder="New Password" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-3 text-right control-label bold uppercase">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control has-error bold " required="" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-8 offset-3">
                                <button type="submit" class="btn btn-primary btn-block bold uppercase"><i class="fa fa-send"></i>Change Password</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <!-- Modal for DELETE -->

    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-exclamation-triangle'></i> Confirmation !</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{ route('seller-delete') }}" class="form-inline">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="id" class="delete_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
@section('scripts')

    <script>
        $(document).ready(function () {

            $(document).on("click", '.delete_button,.password_button',  function (e) {
                var id = $(this).data('id');
                $(".delete_id").val(id);
            });
            
        });
    </script>

@endsection
