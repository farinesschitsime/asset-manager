@extends("layout")

@section("additional_styles")
<link rel="stylesheet" href="{{ asset('vendor/apexcharts/dist/apexcharts.css')}}">
@stop

@section('page-content')
<div class="px-4 pt-4">
                <div>
                    <h3>Dashboard</h3>
                    <div class="mt-4">
<div class="row">
                                                    <div class="col">
                                <div class="card shadow-sm rounded-0">
                                    <div class="card-body">
                                        <h4>10</h4>
                                        <p class="mt-4">
                                            Users
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm rounded-0">
                                    <div class="card-body">
                                        <h4>5</h4>
                                        <p class="mt-4">
                                            Institutions
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="row">
                            <div class="col-8">
                                <div class="card" style="min-height: 30em">
                                    <div class="card-body">
                                        <h4>System Usage</h4>
                                        <div class="mt-4">
                                          <div id="chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card" style="min-height: 30em">
                                    <div class="card-body">
                                        <h4>Top Institutions</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item">Organization 1</li>
                                            <li class="list-group-item">Organization 2</li>
                                            <li class="list-group-item">Organization 3</li>
                                            <li class="list-group-item">Organization 4</li>
                                            <li class="list-group-item">Organization 5</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop


@section("additional_scripts")
<script src="{{ asset('vendor/apexcharts/dist/apexcharts.min.js')}}"></script>
		<script>
		 
		 var options = {
          series: [{
          data: [ 
			@foreach($institutions as $institution)
			{{$institution->getAssets()->count()}},
			@endforeach
		  ]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: [
			@foreach($institutions as $institution)
			"{{$institution->name}}",
			@endforeach
          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
		</script>
@stop