@extends('layouts.master_v2')

@section('content')
    <div class="content">
        <div
            class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
            <div>
                <h1 class="h3 mb-1">
                    Главная страница
                </h1>
                <p class="fw-medium mb-0 text-muted">
                    Добро пожаловать , {{ auth()->user()->name }}! здесь можно посмотреть <a class="fw-medium"
                        href="javascript:void(0)"> Статистику</a>.
                </p>
            </div>
            <div class="mt-4 mt-md-0">
                <div class="col-lg-12 space-y-2">
                    <div class="row row-cols-lg-auto g-3 align-items-center">
                        <div class="col-12">
                            <select class="js-select2 form-select" id="sector_select" name="sector_select">
                                <option value="">Выберите сектор...</option>
                                @foreach ($sectors as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == request('sector_select')) selected @endif>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-sm btn-alt-primary" href="javascript:void(0)">
                                <i class="fa fa-cog"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-sm btn-alt-primary px-3"
                                    id="dropdown-analytics-overview" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    За текущий месяц <i class="fa fa-fw fa-angle-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end fs-sm"
                                    aria-labelledby="dropdown-analytics-overview">
                                    <a class="dropdown-item" href="javascript:void(0)">На этой неделе</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)">В этом году</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <div class="row items-push">
            <div class="col-sm-6 col-xl-3">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-temperature-arrow-up fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold"> {{ number_format($maxTemp->temp, 2, '.', '.') }} °C</div>
                        <div class="text-muted mb-3">Максимальная температура</div>
                        @if ($dMax >= 0)
                            <div
                                class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light">
                                <i class="fa fa-caret-up me-1"></i>
                                {{ $dMax }}
                            </div>
                        @else
                            <div
                                class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-danger bg-danger-light">
                                <i class="fa fa-caret-down me-1"></i>
                                {{ $dMax }}
                            </div>
                        @endif
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                        <a class="fw-medium" href="javascript:void(0)">
                            Посмотреть все
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-temperature-arrow-down fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold">{{ number_format($minTemp->temp, 2, '.', '.') }} °C</div>
                        <div class="text-muted mb-3">Минимальная температура</div>
                        @if ($dMin >= 0)
                            <div
                                class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light">
                                <i class="fa fa-caret-up me-1"></i>
                                {{ $dMin }}
                            </div>
                        @else
                            <div
                                class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-danger bg-danger-light">
                                <i class="fa fa-caret-down me-1"></i>
                                {{ $dMin }}
                            </div>
                        @endif

                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                        <a class="fw-medium" href="javascript:void(0)">
                            Посмотреть все
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-sitemap fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold">{{ $sectors->count() }}</div>
                        <div class="text-muted mb-3">Секторы</div>
                        <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-success bg-success-light">
                            <i class="fa fa-caret-up me-1"></i>
                            7.9%
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                        <a class="fw-medium" href="javascript:void(0)">
                            Посмотреть все
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-map-pin fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold">{{ $onlineSectorsCount }}</div>
                        <div class="text-muted mb-3">Онлайн Секторы</div>
                        <div class="d-inline-block px-3 py-1 rounded-pill fs-sm fw-semibold text-danger bg-danger-light">
                            <i class="fa fa-caret-down me-1"></i>
                            0.3%
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light fs-sm">
                        <a class="fw-medium" href="javascript:void(0)">
                            Посмотреть все
                            <i class="fa fa-arrow-right ms-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    График
                </h3>
                <div class="block-options">
                    <div class="input-group">
                        <input type="date" class="form-control" name="date_chart" id="date_chart"
                            value="{{ request('date_chart') ?? now()->format('Y-m-d') }}">
                        <button type="button" onclick="filterFunc()" class="btn btn-primary"><i
                                class="fa fa-arrows-rotate"></i></button>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-md-2 col-xl-2 d-md-flex align-items-md-center">
                        <div class="p-md-2 p-lg-3">
                            <div class="py-3">
                                <div class="fs-1 fw-bold">{{$allTemps}}</div>
                                <div class="fw-semibold">Количество входящих данных в этот день.</div>
                                <div class="py-3 d-flex align-items-center">
                                    <div class="bg-success-light p-2 rounded me-3">
                                        <i class="fa fa-fw fa-arrow-up text-success"></i>
                                    </div>
                                    <p class="mb-0">
                                        Максимальная температура <span class="fw-semibold text-success"> {{ $maxChartTemp }} °C</span>
                                    </p>
                                </div>
                            </div>
                            <div class="py-3">
                                <div class="fs-1 fw-bold">{{$timeMaxTemp}}</div>
                                <div class="fw-semibold">Время максимальной температуры</div>
                                <div class="py-3 d-flex align-items-center">
                                    <div class="bg-success-light p-2 rounded me-3">
                                        <i class="fa fa-fw fa-arrow-down text-success"></i>
                                    </div>
                                    <p class="mb-0">
                                        Минимальная температура <span class="fw-semibold text-success"> {{ $minChartTemp }} °C</span> 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 col-xl-10 d-md-flex align-items-md-center">
                        <div class="p-md-2 p-lg-3 w-100">
                            <canvas id="js-chartjs-analytics-bars"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        function filterFunc() {
            let date_chart = document.getElementById('date_chart').value;

            let url = '{{ route('home') }}';
            window.location.href =
                `${url}?date_chart=${date_chart}`;
        }
    </script>
    <script>
        Dashmix.onLoad((() => class {
            static initChartsBars() {
                Chart.defaults.color = "#818d96", Chart.defaults.scale.grid.color = "transparent", Chart
                    .defaults.scale.grid.zeroLineColor = "transparent", Chart.defaults.scale.beginAtZero = !
                    0, Chart.defaults.elements.line.borderWidth = 1, Chart.defaults.plugins.legend.labels
                    .boxWidth = 12;
                let r, a, o = document.getElementById("js-chartjs-analytics-bars");
                a = {
                    labels: [{!! implode(',', $categories) !!}],
                    datasets: {!! $series !!}
                }, null !== o && (r = new Chart(o, {
                    type: "bar",
                    data: a,
                    options: {
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(r) {
                                        return r.dataset.label + ": " + r.parsed.y +
                                            " °C"
                                    }
                                }
                            }
                        }
                    }
                }))
            }
            static init() {
                this.initChartsBars()
            }
        }.init()));
    </script>
@endsection
