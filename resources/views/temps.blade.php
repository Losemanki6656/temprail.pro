@extends('layouts.master')

@section('content')
    <div class="col">
        <div class="card table-card">
            <div class="card-header">
                <h5>Real Time</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i>
                                        collapse</span><span style="display:none"><i class="feather icon-plus"></i>
                                        expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-file-text"></i>
                                    Export</a></li>
                        </ul>
                    </div>
                </div>
                <table>
                    <thead>
                        <th width="320px">
                        </th>
                        <th width="50px">
                        </th>
                        <th width="200px">
                        </th>
                        <th width="30px">
                        </th>
                        <th width="200px">
                        </th>
                        <th width="170px">
                        </th>
                    </thead>
                    <tbody>
                        <form action="{{route('temps')}}" method="get">
                            <tr>
                                <td>
                                    <select class="js-example-basic-single" id="select_done" name="sector_id"
                                        style="width: 300px">
                                        <option value="">All</option>
                                        @foreach ($sectors as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == request('sector_id'))
                                                    selected
                                                @endif
                                                >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>From</td>
                                <td>
                                    <input type="date" class="form-control" style="width: 170px;" name="date1"
                                        value="{{ request('date1') ?? now()->format('Y-m-d') }}" class="form-control">
                                </td>
                                <td>To</td>
                                <td>
                                    <input type="date" class="form-control" style="width: 170px;" name="date2"
                                        value="{{ request('date2') ?? now()->format('Y-m-d') }}" class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit"> <i class="fas fa-filter"></i>
                                        Filter</button>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>

            <div class="card-body p-0">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="table-responsive">
                            <div class="customer-scroll">
                                <table class="table table-sm m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><span>Sectors</span></th>
                                            <th><span>Temprature <a class="help"></a></span></th>
                                            <th><span>Temprature 2<a class="help"></a></span></th>
                                            <th><span>Date <a class="help"></a></span></th>
                                            <th><span>Time<a class="help"></a></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($temps as $temp)
                                            <tr>
                                                <td>{{(($temps->currentPage() * request('paginate')) - request('paginate')) + $loop->index + 1}}</td>
                                                <td><strong>{{ $temp->sector->name }}</strong></td>
                                                <td>{{ $temp->temp }} °C </td>
                                                <td>{{ $temp->temp2 }} °C </td>
                                                <td>{{ $temp->updated_at->format('Y-m-d') }} </td>
                                                <td>{{ $temp->updated_at->format('H:i:s') }} </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th><span>Sectors</span></th>
                                            <th><span>Temprature <a class="help"></a></span></th>
                                            <th><span>Temprature 2<a class="help"></a></span></th>
                                            <th><span>Date <a class="help"></a></span></th>
                                            <th><span>Time<a class="help"></a></span></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                            <div class="row container mb-3">
                                <div class="col d-flex justify-content">
                                    <h6 class="mt-2 mr-2">Show</h6>
                                    <select class="form-control" style="width: 80px" name="select_paginate" id="select_paginate">
                                        <option value="10" @if (request('paginate') == 10) selected @endif>10</option>
                                        <option value="50" @if (request('paginate') == 50) selected @endif>50</option>
                                        <option value="100" @if (request('paginate') == 100) selected @endif>100</option>
                                        <option value="{{$temps->count()}}" @if (request('paginate') == $temps->count()) selected @endif>All</option>
                                    </select> <h6 class="mt-2 ml-2">entries</h6>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    {{ $temps->withQueryString()->links() }}
                                </div>
                                @push('scripts')
                                    <script>
                                        $('#select_paginate').change(function (e) {
                                            let paginate = $(this).val();
                                            let url = '{{ route('temps') }}';
                                            window.location.href = `${url}?paginate=${paginate}`;
                                        })
                                    </script>                       
                                @endpush
                            </div>

                        </div>
                    </div>

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
