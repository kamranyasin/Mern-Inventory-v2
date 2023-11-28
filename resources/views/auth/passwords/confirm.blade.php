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

                  <p class="mb-4">Confirm password 🔒</p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="mb-3 form-password-toggle">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <div class="input-group input-group-merge">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                          <button type="submit" class="btn btn-primary d-grid w-100">
                                    {{ __('Confirm Password') }}
                          </button>
                        </div>

                        <p class="text-center">
                          @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                              {{ __('Forgot Your Password?') }}
                            </a>
                          @endif
                        </p>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
