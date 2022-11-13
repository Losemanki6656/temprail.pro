@extends('layouts.master')

@section('content')
    <div class="row">
        @foreach ($items as $item)
            <div class="col-md-1">
                <div class="card">
                    <div class="card">
                        {{ $item->id }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
@endsection
