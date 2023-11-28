@extends('layouts.commonMaster')

@section('authentication')

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">

            <div class="card">

                <div class="card-body">

                   <!-- Logo -->
                   <div class="app-brand justify-content-center mb-4 mt-2">
                    <a class="app-brand-link gap-2">
                      <span class="app-brand-logo demo">
                        <img src="/images/sigmaa-icon.png" alt="siggmaa icon" width="30">
                      </span>
                      <span class="app-brand-text demo text-body fw-bold ms-1">SIGGMAA</span>
                    </a>
                  </div>
                  <!-- /Logo -->

                  <p class="mb-4">Enter your mail to get reset link ✉️</p>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">

                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="mb-3">
                          <button type="submit" class="btn btn-primary d-grid w-100">
                            {{ __('Send Password Reset Link') }}
                          </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
