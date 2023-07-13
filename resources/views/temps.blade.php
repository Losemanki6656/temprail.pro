@extends('layouts.master_v2')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold">Температуры</h1>
                <nav class="flex-shrink-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Главная страница</li>
                        <li class="breadcrumb-item active" aria-current="page">Температуры</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Full Table -->
        <div class="block block-rounded">
            <div class="block-content">
                <h2 class="content-heading mb-0">Температуры</h2>
                <div class="row mb-3 mt-3">
                    <div class="col-lg-12 space-y-2">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <select class="js-select2 form-select" id="sector_select" name="sector_select"
                                    data-placeholder="Choose one..">
                                    <option value="">Выберите сектор...</option>
                                    @foreach ($sectors as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($item->id == request('sector_select')) selected @endif>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="date" class="form-control" name="date1" id="date1"
                                    value="{{ request('date1') }}">
                            </div>
                            <div class="col-12">
                                <input type="date" class="form-control" name="date2" id="date2"
                                    value="{{ request('date2') }}">
                            </div>
                            <div>
                                <button type="button" onclick="filterFunc()" class="btn btn-primary"><i
                                        class="fa fa-filter"></i> Филтер</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Сектор</th>
                                <th>Температура (°C)</th>
                                <th>Время</th>
                                <th>Дата</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($temps as $temp)
                                <tr>
                                    <td>{{ $temps->currentPage() * $temps->perPage() - $temps->perPage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ $temp->sector->name }}</td>
                                    <td class="fw-bold">{{ number_format($temp->temp, 2, '.', '.') }}</td>
                                    <td>{{ $temp->updated_at->format('H:i:s') }} </td>
                                    <td>{{ $temp->updated_at->format('Y-m-d') }} </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Сектор</th>
                                <th>Температура (°C)</th>
                                <th>Время</th>
                                <th>Дата</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 space-y-2 mb-2">
                        <select class="form-select" style="width: 80px" name="paginate_select" id="paginate_select">
                            <option value="10" @if ($temps->perPage() == 10) selected @endif>10
                            </option>
                            <option value="50" @if ($temps->perPage() == 50) selected @endif>50
                            </option>
                            <option value="100" @if ($temps->perPage() == 100) selected @endif>100
                            </option>
                            <option value="{{ $temps->count() }}" @if ($temps->perPage() == $temps->total()) selected @endif>
                                All
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6 text-end"> <label
                            for="">{{ $temps->onEachSide(1)->withQueryString()->links() }}</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
@endsection
@section('scripts')
    <script>
        $('#sector_select').change(function(e) {
            filterFunc();
        });

        $('#paginate_select').change(function(e) {
            filterFunc();
        });

        function filterFunc() {
            let sector_select = document.getElementById('sector_select').value;
            let date1 = document.getElementById("date1").value;
            let date2 = document.getElementById("date2").value;
            let paginate_select = document.getElementById('paginate_select').value;

            let url = '{{ route('temps') }}';
            window.location.href =
                `${url}?sector_select=${sector_select}&date1=${date1}&date2=${date2}&paginate_select=${paginate_select}&`;
        }
    </script>
@endsection
