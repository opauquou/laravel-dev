@extends('layouts.app')

@section('title', 'Morris Charts')

@section('others_styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">
@endsection

@section('inline_styles')

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Morris Charts
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Line Chart</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="form-group col-md-3">
                            <label>Vols</label>
                            <select class="form-control select2" id="selectVol" style="width: 100%;">
                                @if($data->vols->count() == 0)
                                <option value="">Aucun vol</option>
                                @endif
                                @foreach($data->vols as $vol)
                                <option value="{{ $vol->numero }}">Vol vers {{ $vol->destination }}</option>
                                @endforeach
                            </select>
                        </div><!-- /.form-group -->
                        <div id="container"></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col (RIGHT) -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@endsection

@section('others_scripts')
    <!-- Select2 -->
    <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/hightcharts/highcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/hightcharts/modules/series-label.js') }}"></script>
    <script src="{{ asset('assets/plugins/hightcharts/modules/exporting.js') }}"></script>
    <script src="{{ asset('assets/plugins/hightcharts/modules/export-data.js') }}"></script>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();

            getDataForChart();

            $('#selectVol').on('change', function () {

                getDataForChart();

            });

            function getDataForChart(){

                var url = '', numVol = $('#selectVol').val(), lang = window.location.pathname.split('/', 9999)[1];
                console.log(lang);
                if(lang === 'en'){
                    url = '/en/datatable/charts/stats';
                }else{
                    url = '/datatable/charts/stats';
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    data: {numVol: numVol},
                })
                .done(function (data) {
                    if(data.success)
                    {
                        chartConstruct(data)
                    }
                    else
                    {
                        $.notify({
                            message: data.msg
                        },{

                            type: data.level,
                            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert"><span data-notify="message">{2}</span></div>',

                        });
                    }

                })
                .fail(function (result) {
                    $.notify({
                        message: result.msg
                    },{
                        element: '.content-wrapper',
                        type: result.level,
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert"><span data-notify="message">{2}</span></div>',

                    });
                })

            }


            function chartConstruct(data){
                var chartOptions, bDate, jsDate = JSON.stringify(data.begin).split('":"', 2)[1].split('"',2)[0];
                bDate = Date.parse(jsDate);

                chartOptions = {
                    chart: {
                        type: 'spline',
                        scrollablePlotArea: {
                            minWidth: 500,
                            scrollPositionX: 1
                        }
                    },
                    title: {
                        text: 'Wind speed during two days'
                    },
                    subtitle: {
                        text: '13th & 14th of February, 2018 at two locations in Vik i Sogn, Norway'
                    },
                    xAxis: {
                        type: 'datetime',
                        dateTimeLabelFormats: {
                            day: '%e. %b'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Vue(s) / Clicks (1 = 100)'
                        },
                        minorGridLineWidth: 0,
                        gridLineWidth: 0,
                        alternateGridColor: null,
                        plotBands: [{ // Light air
                            from: 0.3,
                            to: 1.5,
                            color: 'rgba(68, 170, 213, 0.1)',
                        }, { // Light breeze
                            from: 1.5,
                            to: 3.3,
                            color: 'rgba(0, 0, 0, 0)',
                        }, { // Gentle breeze
                            from: 3.3,
                            to: 5.5,
                            color: 'rgba(68, 170, 213, 0.1)',
                        }, { // Moderate breeze
                            from: 5.5,
                            to: 8,
                            color: 'rgba(0, 0, 0, 0)',
                        }, { // Fresh breeze
                            from: 8,
                            to: 11,
                            color: 'rgba(68, 170, 213, 0.1)',
                        }, { // Strong breeze
                            from: 11,
                            to: 14,
                            color: 'rgba(0, 0, 0, 0)',
                        }, { // High wind
                            from: 14,
                            to: 15,
                            color: 'rgba(68, 170, 213, 0.1)',
                        }]
                    },
                    tooltip: {
                        /*valueSuffix: ' click(s)'*/
                    },
                    plotOptions: {
                        spline: {
                            lineWidth: 4,
                            states: {
                                hover: {
                                    lineWidth: 5
                                }
                            },
                            marker: {
                                enabled: false
                            },
                            pointInterval: 24 * 3600 * 1000, // one day
                            pointStart: Date.UTC(2018, 7, 19)
                        }
                    },
                    series: [{
                        name: 'Reservation(s)',
                        data: data.series,
                        pointStart: bDate,
                        pointInterval: 24 * 3600 * 1000 // two day

                    },{
                        name: 'Other Chart',
                        data: [4, 7, 1, 5, 0, 3, 9],
                        pointStart: bDate,
                        pointInterval: 24 * 3600 * 1000 // one day

                    }],
                    navigation: {
                        menuItemStyle: {
                            fontSize: '10px'
                        }
                    }
                };

                new Highcharts.chart('container', chartOptions);
            }

        });

    </script>
@endsection