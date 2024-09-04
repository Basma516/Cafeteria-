@extends('dashboard.layouts.app')

@section('content')

<div class="analytics-sparkle-area" style="margin-top: 45px;">
    <div class="container-fluid">
        <div class="row">
            <!-- Example of a dashboard card -->
            @foreach ($users as $user)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>{{ $user->name }}</h5>
                            <h2> <span class="tuition-fees">Tuition Fees</span></h2>
                            <span class="text-success">%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" >
                                    <span class="sr-only">% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="product-sales-chart">
                    <div class="portlet-title">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="caption pro-sl-hd">
                                    <span class="caption-subject"><b>Admission Statistics</b></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="actions graph-rp actions-graph-rp">
                                    <a href="#" class="btn btn-dark btn-circle active tip-top" data-toggle="tooltip" title="Refresh">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-blue-grey btn-circle active tip-top" data-toggle="tooltip" title="Delete">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-inline cus-product-sl-rp">
                        <li>
                            <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Python</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #933EC5;"></i>PHP</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Java</h5>
                        </li>
                    </ul>
                    <div id="morris-area-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
