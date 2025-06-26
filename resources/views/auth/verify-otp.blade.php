@extends('layouts.master')

@section('main-content')

    <!-- PAGE -->
    <div class="page">
        <div>
            <!-- CONTAINER OPEN -->
            <div class="col mx-auto text-center">
                <a href="index.html">
                    <img src=" {{asset('/')}}assets/images/brand/logo.png" class="header-brand-img" alt="">
                </a>
            </div>

            <div class="col-12 container-login100">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <form class="card shadow-none" method="POST" action="{{ route('verify.otp') }}">
                            @csrf
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="login100-form-title">Verify OTP</span>
                                    <p class="text-muted">Enter the verify otp verify on your account</p>
                                </div>

                                @if(session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif


                            @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- OTP Input -->
                                <div class="pt-3" id="forgot">
                                    <div class="form-group">
                                        <label class="form-label" for="otp">OTP:</label>
                                        <input type="hidden" name="email" value="{{ session()->get('email') }}">
                                        <input class="form-control" id="otp" name="otp" placeholder="Enter Your 6 Digit OTP" type="text">
                                    </div>
                                    <div class="submit">
                                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    </div>

                                    <!-- Visible Resend Link -->
                                    <div class="text-center mt-4">
                                        <p class="text-dark mb-0">
                                            OTP?
                                            <a href="#" class="text-primary ms-1" id="resendLink">resend</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- ❗Hidden Resend OTP Form: must be OUTSIDE the main form -->
                        <form action="{{ route('resend.otp.email') }}" method="POST" id="submitForm" style="display: none;">
                            @csrf
                            <input type="hidden" name="email" value="{{ session()->get('email') }}">
                        </form>

                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--END PAGE -->

    <!-- jQuery must be loaded for this to work -->
    <script>
        document.getElementById('resendLink').addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('submitForm').submit();
        });
    </script>

@endsection
