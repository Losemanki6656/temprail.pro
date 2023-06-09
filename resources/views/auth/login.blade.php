@extends('layouts.app_v2')

@section('content')
    <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
        <!-- Header -->
        <div class="mb-2 text-center">
            <a class="link-fx fw-bold fs-1" href="">
                <span class="text-dark">Temp</span><span class="text-primary">Rail</span>
            </a>
            <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
        </div>
        <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="text" class="form-control form-control-alt" id="login-username" name="email"
                    value="{{ old('email') }}" placeholder="Username" required>
            </div>
            <div class="mb-4">
                <input type="password" class="form-control form-control-alt" id="login-password" name="password"
                    placeholder="Password" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="btn w-100 btn-hero btn-primary">
                    <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Sign In
                </button>
            </div>
        </form>
        <!-- END Sign In Form -->
    </div>
@endsection
