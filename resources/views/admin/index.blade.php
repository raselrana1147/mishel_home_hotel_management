@extends('layouts.admin')
@section('title','Admin Dashboard')
@section('main')
 <div class="page-body">
    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-yellow update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-8">
                            <h4 class="text-white">{{$total_room}}</h4>
                            <h6 class="text-white m-b-0">Total Rooms</h6>
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i></p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-green update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-8">
                            <h4 class="text-white">{{$total_room_type}}</h4>
                            <h6 class="text-white m-b-0">Total Room Type</h6>
                        </div>
                        <div class="col-4 text-right">
                            <canvas id="update-chart-2" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i></p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-pink update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-8">
                            <h4 class="text-white">{{$total_amentity}}</h4>
                            <h6 class="text-white m-b-0">Amentites</h6>
                        </div>
                        <div class="col-4 text-right">
                            <canvas id="update-chart-3" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i></p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-lite-green update-card">
                <div class="card-block">
                    <div class="row align-items-end">
                        <div class="col-8">
                            <h4 class="text-white">{{$restaurants}}</h4>
                            <h6 class="text-white m-b-0">Total services</h6>
                        </div>
                        <div class="col-4 text-right">
                            <canvas id="update-chart-4" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i></p>
                </div>
            </div>
        </div>
   

    </div>
</div>
@endsection