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

                <h4 class="mb-1 pt-2">Verify your email ✉️</h4>


                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
