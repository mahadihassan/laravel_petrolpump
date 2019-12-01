@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-warning">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{$category}}+</h3>
                                <span class="font-weight-bold text-uppercase">Category</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-settings white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-success">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{$blog}}+</h3>
                                <span class="font-weight-bold text-uppercase">Blog</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-list white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-danger">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{$user}}+</h3>
                                <span class="font-weight-bold text-uppercase">Total User</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-user white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card bg-gradient-directional-primary">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body white text-left">
                                <h3>{{ $signal }}+</h3>
                                <span class="font-weight-bold text-uppercase">Total Signal</span>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-rocket white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-basic">Signal Statistic</h4>
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


                            <div class="row">
                                <div class="col-md-12">
                                    <!-- small box -->
                                    <div class="small-box">
                                        <canvas id="lineChart" style="width: auto; height: auto"></canvas>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!---ROW-->


@stop
@section('scripts')

    <script type="text/javascript" src="{{ asset('assets/admin/js/Chart.min.js') }}"></script>

    <script language="JavaScript">
        displayLineChart();
        function displayLineChart() {
            var data = {
                labels: [
                    @foreach($dL as $l)
                            '{{ $l }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: "Prime and Fibonacci",
                        fillColor: "#3dbcff",
                        strokeColor: "#0099ff",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [
                            @foreach($dV as $d)
                                    '{{ $d }}',
                            @endforeach
                        ]
                    }
                ]
            };
            var ctx = document.getElementById("lineChart").getContext("2d");
            var options = {
                responsive: true
            };
            var lineChart = new Chart(ctx).Line(data, options);
        }
    </script>
@endsection