@extends('layouts.dashboard')
@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary bold uppercase" data-toggle="modal" data-target="#DelModal"><i class='fa fa-send'></i> Create New Backup</button>
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

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Database Name</th>
                                    <th>Backup At</th>
                                    <th>Backup Age</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($backup as $key => $product)
                                    <tr id="product{{$product->id}}">
                                        <td>{{++$key}}</td>
                                        <td> {{$product->name}}</td>
                                        <td> {{ \Carbon\Carbon::parse($product->created_at)->format('dS-F-Y h:i A') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('database-backup-download',$product->id) }}" class="btn btn-success bold uppercase"> <i class='fa fa-download'></i> Download</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="text-right">
                                {!! $backup->links('basic.pagination') !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->


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
                    <strong>Are you Confirm you want to This ?</strong>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default bold uppercase" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>&nbsp;
                    <a href="{{ route('backup-submit') }}" class="btn btn-success deleteButton bold uppercase"><i class="fa fa-send"></i> Confirm</a>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')


@endsection