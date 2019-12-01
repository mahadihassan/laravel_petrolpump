<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Softwarezon Script Installer</title>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://www.softwarezon.com/assets/images/favicon.png">
    <link rel="shortcut icon" href="http://www.softwarezon.com/assets/images/favicon.png">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/fonts/font-awesome/css/font-awesome.css') }}">
    <link href="{{ asset('assets/admin/css/installer.css') }}" rel="stylesheet" type="text/css" />
</head>
<body {{--style="background-image: url('{{ asset('assets/images/installer-bg.png') }}')"--}}>
<div class="container">
    <!-- External toolbar sample -->
    <div class="row d-flex pt-3 align-items-center text-white-50">
        <div class="col-md-12">
            <div class="sw-header">
                <p>softwarezon Script Installer</p>
                <a href="mailto:softwarezon@hotmail.com?Subject=Product%20Installation%20Support" target="_top"><i class="fa fa-handshake-o"></i> Get Support</a>
            </div>
        </div>
    </div>

    <!-- SmartWizard html -->
    <div class="sw-main sw-theme-arrows">

        <ul class="nav nav-tabs step-anchor">
            <li class="nav-item active"><a href="#" class="nav-link font-weight-bold text-uppercase">Step #1<br><small class="font-weight-bold">Terms of Use</small></a></li>
            <li class="nav-item active"><a href="#" class="nav-link font-weight-bold text-uppercase">Step #2<br><small class="font-weight-bold">Server Requirement</small></a></li>
            <li class="nav-item active"><a href="#" class="nav-link font-weight-bold text-uppercase">Step #3<br><small class="font-weight-bold">Folder Permission</small></a></li>
            <li class="nav-item active"><a href="#" class="nav-link font-weight-bold text-uppercase">Step #4<br><small class="font-weight-bold">Database Information</small></a></li>
            <li class="nav-item active"><a href="#" class="nav-link font-weight-bold text-uppercase">Step #5<br><small class="font-weight-bold">Purchase Validation</small></a></li>
            <li class="nav-item"><a href="#" class="nav-link font-weight-bold text-uppercase">Step #6<br><small class="font-weight-bold">Installation Complete</small></a></li>
        </ul>

        {!! Form::open(['route' => 'submit-purchase','method'=>'post', 'role'=>'form', 'class'=>'form-horizontal','id'=>'databaseForm']) !!}

        <div class="sw-container tab-content">


            <div class="tab-pane step-content" style="display: block;">
                <h2 class="pb-1 pt-2 text-center font-weight-bold text-uppercase sw-border" style="border-bottom: 2px solid #302e2e">Check Purchase Validation</h2>

                <div class="ml-1 mr-1 pb-1 pt-1">

                    @if($error)
                        <div class="row">
                            <div class="col-md-10 offset-1">
                                <div class="alert alert-warning text-center" role="alert">
                                    <h4><strong>Warning : </strong> Purchase Validation Failed. Again Check Credential.</h4>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endif

                    <div class="form-body">

                        <div class="form-group row">
                            <label for="databaseName" class="col-sm-3 col-form-label font-weight-bold text-uppercase text-right">Envato Username : </label>
                            <div class="col-sm-8">
                                <input type="text" name="username" class="form-control" id="databaseName" placeholder="Envato Username" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="databaseName" class="col-sm-3 col-form-label font-weight-bold text-uppercase text-right">Purchase Code : </label>
                            <div class="col-sm-8">
                                <input type="text" name="code" class="form-control" id="databaseName" placeholder="Purchase Code" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="databaseName" class="col-sm-3 col-form-label font-weight-bold text-uppercase text-right">How Find Purchase code : </label>
                            <div class="col-sm-8">
                                <a class="btn btn-success btn-block" target="_blank" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code">https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code</a>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>


        <div class="row btn-toolbar sw-toolbar sw-toolbar-bottom">
            <div class="col-sm-6">
                <p class="text-uppercase font-weight-bold text-left ml-1" style="margin-top: 7px;">&copy All Copyright reserve by Softwarezon</p>
            </div>
            <div class="col-sm-6">

                <button class="btn btn-success font-weight-bold mr-1 text-uppercase pull-right" type="submit">
                    <i class="fa fa-send"></i> Submit & Continue
                </button>

            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>


</body>
</html>
