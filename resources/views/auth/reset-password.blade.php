@extends('layouts.master')

@section('main-content')


    <!-- PAGE -->
    <div class="page">
        <div>
            <!-- CONTAINER OPEN -->
            <div class="col mx-auto text-center">
                <a href="index.html">
                    <img src="assets/images/brand/logo.png" class="header-brand-img" alt="">
                </a>
            </div>
            <div class="col-12 container-login100">
                <div class="row">
                    <div class="col col-login mx-auto">
                        <form class="card shadow-none" method="POST" action="{{route('password.reset.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="text-center">
											<span class="login100-form-title">
												Reset Password
											</span>
                                    <p class="text-muted">Enter the new password registered on your account</p>

                                </div>



                                {{-- Error Showing --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="pt-3" id="forgot">
                                    {{-- Email --}}
                                    <div class="form-group">
                                        <label class="form-label" for="eMail">E-Mail:</label>

                                        <input class="form-control" id="eMail" name="email" value="{{session()->get('email')}}"  placeholder="Enter Your Email" type="email">
                                    </div>

                                    {{-- New Password --}}
                                    <div class="form-group">
                                        <label class="form-label" for="newPassword">New Password:</label>
                                        <input class="form-control" id="newPassword" name="new_password"  placeholder="New Password" type="password">
                                    </div>

                                    {{-- Confirm Password --}}
                                    <div class="form-group">
                                        <label class="form-label" for="confirmPassword">Confirm Password:</label>
                                        <input class="form-control" id="confirmPassword" name="new_password_confirmation"  placeholder="Confirm Your Password" type="password">
                                    </div>

                                    {{-- Submit --}}
                                    <div class="submit">
                                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    </div>

                                    <div class="text-center mt-4">
                                        <p class="text-dark mb-0">Forgot It?<a class="text-primary ms-1" href="{{ url()->previous() }}">Send me Back</a></p>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>
    <!--END PAGE -->

@endsection
