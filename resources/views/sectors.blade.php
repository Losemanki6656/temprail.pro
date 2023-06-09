@extends('layouts.master_v2')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold">Пикеты (км) Секторы</h1>
                <nav class="flex-shrink-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Главная страница</li>
                        <li class="breadcrumb-item active" aria-current="page">Пикеты (км) Секторы</li>
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
                <h2 class="content-heading mb-3">Пикеты (км) Секторы</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Сектор</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sectors as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#update{{$item->id}}"><i class="fa fa-edit"></i>
                                            Редактировать</button> </td>
                                </tr>
                                <div class="modal fade" id="update{{$item->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-block-popin" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-popin" role="document">
                                        <div class="modal-content">
                                            <div class="block block-rounded block-themed block-transparent mb-0">
                                                <div class="block-header bg-primary-dark">
                                                    <h3 class="block-title">Редактировать</h3>
                                                    <div class="block-options">
                                                        <button type="button" class="btn-block-option"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="fa fa-fw fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="block-content">
                                                    <form id="form" action="{{route('sector_update', ['id' => $item->id])}}" method="POST">
                                                        @csrf
                                                        <p>
                                                            <input class="form-control" type="text" value="{{$item->name}}" name="name" required>
                                                        </p>
                                                    </form>
                                                </div>
                                                <div class="block-content block-content-full text-end bg-body">
                                                    <button type="button" class="btn btn-sm btn-alt-secondary"
                                                        data-bs-dismiss="modal">Назад</button>
                                                    <button type="submit" class="btn btn-sm btn-primary" form="form"><i class="fa fa-save"></i> Сохранить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Full Table -->
    </div>
@endsection
