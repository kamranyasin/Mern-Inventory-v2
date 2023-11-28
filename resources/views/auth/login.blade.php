@extends('layouts.commonMaster')

@section('authentication')


@section('page-script')
  <script>
    element.addEventListener('input',function(){this.value=this.value.toLowerCase()});​​
  </script>
@endsection


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

                  <p class="mb-4">Please sign-in to your account and start the adventure</p>

                    <form method="POST" action="{{ route('login') }}" class="mb-3" id="formAuthentication">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>

                            <input id="email" type="email" oninput="this.value=this.value.toLowerCase()" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                              @error('email')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror

                        </div>

                        <div class="mb-3 form-password-toggle">

                          <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                            <a href="{{ route('password.request') }}">
                              <small>Forgot Password?</small>
                            </a>
                          </div>

                          <div class="input-group input-group-merge">

                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                          </div>

                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                  {{ __('Remember Me') }}
                                </label>
                            </div>

                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary d-grid w-100">
                                {{ __('Login') }}
                            </button>
                        </div>

                    </form>

                    <p class="text-center">
                      <span>New on our platform?</span>
                      <a href="{{ route('register') }}">
                        <span>Create an account</span>
                      </a>
                    </p>

                </div>

            </div>
        </div>
    </div>
</div>



@endsection
