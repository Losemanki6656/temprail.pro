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
                    <th width="170px">
                    </th>
                    <th width="30px">
                    </th>
                    <th width="170px">
                    </th>
                    <th width="170px">
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                          <select class="js-example-basic-single" id="select_done" name="sel_done" style="width: 300px">
                            <option value=" ">All</option>
                            @foreach ($sectors as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>From</td>
                        <td>
                            <input type="date" class="form-control" style="width: 140px;" name="period"
                                value="{{ request('period') ?? now()->format('Y-m-d') }}"
                                class="form-control">
                        </td>
                        <td>To</td>
                        <td>
                            <input type="date" class="form-control" style="width: 140px;" name="sana"
                                value="{{ request('sana') ?? now()->format('Y-m-d') }}"
                                class="form-control">
                        </td>
                        <td>
                          <button class="btn btn-primary" type="submit"> <i class="fas fa-filter"></i> Filter</button>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>

            <div class="card-body p-0">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="table-responsive">
                            <div class="customer-scroll">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th><span>Sectors</span></th>
                                            <th><span>Temprature <a class="help"></a></span></th>
                                            <th><span>Date <a class="help"></a></span></th>
                                            <th><span>Time<a class="help"></a></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($temps as $temp)
                                            <tr>
                                                <td><strong>{{ $temp->okolotka($temp->okolotok_id) }}</strong></td>
                                                <td>{{ $temp->temp }} °C </td>
                                                <td>{{ $temp->updated_at->format('Y-m-d') }} </td>
                                                <td>{{ $temp->updated_at->format('H:i:s') }} </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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
