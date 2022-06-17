@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-3 md-6">
                <label>Organizations</label>
                <select name="" id="" class="js-example-basic-single" style="width: 100%">
                    <option value="">All</option>
                    @foreach ($organizations as $organ)
                        <option value="">{{$organ->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 md-6">
                <label>Sectors</label>
                <select name="" id="" class="js-example-basic-single" style="width: 100%">
                    <option value="">All</option>
                    @foreach ($sectors as $sector)
                        <option value="">{{$sector->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-body">
                <h6 class="text-white">{{$maxTemps[3]->sector->name}}</h6>
                <h2 class="text-end text-white"><i
                        class="fas fa-temperature-high"></i><span>{{$maxTemps[3]->temp}}</span></h2>
                <p class="m-b-0"><span class="float-end">{{$maxTemps[3]->created_at->format('Y-m-d')}}</span></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-body">
                <h6 class="text-white">{{$maxTemps[2]->sector->name}}</h6>
                <h2 class="text-end text-white"><i
                        class="fas fa-temperature-high"></i><span>{{$maxTemps[2]->temp}}</span></h2>
                <p class="m-b-0"><span class="float-end">{{$maxTemps[2]->created_at->format('Y-m-d')}}</span></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-body">
                <h6 class="text-white">{{$maxTemps[1]->sector->name}}</h6>
                <h2 class="text-end text-white"><i
                        class="fas fa-temperature-high"></i><span>{{$maxTemps[1]->temp}}</span></h2>
                <p class="m-b-0"><span class="float-end">{{$maxTemps[1]->created_at->format('Y-m-d')}}</span></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-red order-card">
            <div class="card-body">
                <h6 class="text-white">{{$maxTemps[0]->sector->name}}</h6>
                <h2 class="text-end text-white"><i
                        class="fas fa-temperature-high"></i><span>{{$maxTemps[0]->temp}}</span></h2>
                <p class="m-b-0"><span class="float-end">{{$maxTemps[0]->created_at->format('Y-m-d')}}</span></p>
            </div>
        </div>
    </div>


    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5>Unique Visitor</h5>
            </div>
            <div class="card-body ps-0 pb-0">
                <div id="unique-visitor-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body bg-patern">
                        <div class="row">
                            <div class="col-auto">
                                <span>Customers</span>
                            </div>
                            <div class="col text-end">
                                <h2 class="mb-0">826</h2>
                                <span class="text-c-green">8.2%<i
                                        class="feather icon-trending-up ms-1"></i></span>
                            </div>
                        </div>
                        <div id="customer-chart"></div>
                        <div class="row mt-3">
                            <div class="col">
                                <h3 class="m-0"><i class="fas fa-circle f-10 m-r-5 text-success"></i>674
                                </h3>
                                <span class="ms-3">New</span>
                            </div>
                            <div class="col">
                                <h3 class="m-0"><i class="fas fa-circle text-primary f-10 m-r-5"></i>182
                                </h3>
                                <span class="ms-3">Return</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card bg-primary text-white">
                    <div class="card-body bg-patern-white">
                        <div class="row">
                            <div class="col-auto">
                                <span>Customers</span>
                            </div>
                            <div class="col text-end">
                                <h2 class="mb-0 text-white">826</h2>
                                <span class="text-white">8.2%<i
                                        class="feather icon-trending-up ms-1"></i></span>
                            </div>
                        </div>
                        <div id="customer-chart1"></div>
                        <div class="row mt-3">
                            <div class="col">
                                <h3 class="m-0 text-white"><i
                                        class="fas fa-circle f-10 m-r-5 text-success"></i>674</h3>
                                <span class="ms-3">New</span>
                            </div>
                            <div class="col">
                                <h3 class="m-0 text-white"><i
                                        class="fas fa-circle f-10 m-r-5 text-white"></i>182</h3>
                                <span class="ms-3">Return</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12 col-lg-4">
        <div class="card seo-card overflow-hidden">
            <div class="card-body seo-statustic">
                <i class="feather icon-save f-20 text-c-red"></i>
                <h5 class="mb-1">65%</h5>
                <p>Memory</p>
            </div>
            <div class="seo-chart">
                <div id="seo-card1"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-blue">8.62k</span> Subscribers</h4>
                <p class="m-b-20">Your main list is growing</p>
                <button class="btn btn-primary btn-sm btn-round">Manage List</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-body text-center">
                <i class="fab fa-twitter text-c-green d-block f-40"></i>
                <h4 class="m-t-20"><span class="text-c-blgreenue">+40</span> Followers</h4>
                <p class="m-b-20">Your main list is growing</p>
                <button class="btn btn-success btn-sm btn-round">Check them out</button>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
