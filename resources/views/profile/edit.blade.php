{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Profile') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">--}}
{{--            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-profile-information-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-password-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.delete-user-form')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

@extends('backend.master')

@section('main-content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Profile</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row" id="user-profile">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img-main rounded">
                                    <img src="assets/images/faces/6.jpg" alt="img" class="m-0 p-1 rounded hrem-6">
                                </div>
                                <div class="ms-4">
                                    <h4>Elena Gilbert</h4>
                                    <p class="text-muted mb-2">Member Since: November 2020</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-rss"></i> Follow</a>
                                    <a href="mail-inbox.html" class="btn btn-secondary btn-sm"><i class="fa fa-envelope"></i> E-mail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="d-md-flex flex-wrap justify-content-lg-end">
                                <div class="media m-3">
                                    <div class="media-icon bg-primary me-3 mt-1">
                                        <i class="fe fe-file-plus fs-20 text-white"></i>
                                    </div>
                                    <div class="media-body">
                                        <span class="text-muted">Posts</span>
                                        <div class="fw-semibold fs-25">
                                            328
                                        </div>
                                    </div>
                                </div>
                                <div class="media m-3">
                                    <div class="media-icon bg-info me-3 mt-1">
                                        <i class="fe fe-users  fs-20 text-white"></i>
                                    </div>
                                    <div class="media-body">
                                        <span class="text-muted">Followers</span>
                                        <div class="fw-semibold fs-25">
                                            937k
                                        </div>
                                    </div>
                                </div>
                                <div class="media m-3">
                                    <div class="media-icon bg-warning me-3 mt-1">
                                        <i class="fe fe-wifi fs-20 text-white"></i>
                                    </div>
                                    <div class="media-body">
                                        <span class="text-muted">Following</span>
                                        <div class="fw-semibold fs-25">
                                            2,876
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tab Header --}}
                <div class="border-top">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu1">
                                <ul class="nav">
                                    <li><a href="#editProfile" data-bs-toggle="tab">Edit Profile</a></li>
                                    <li><a href="#accountSettings" data-bs-toggle="tab">Account Settings</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tab Content --}}
            <div class="tab-content">
                {{-- Edit Profile --}}
                <div class="tab-pane" id="editProfile">
                    <div class="card">
                        <div class="card-body border-0">
                            <form class="form-horizontal" method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')


                                <p class="mb-1 text-17">Profile Information</p>
                                <span class="mb-4 text-gray">Update your account's profile information and email address</span>

                                {{-- Name --}}
                                <div class="form-group mt-5">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="email" class="form-label">Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="name" name="name"  value="{{auth()->user()->name}}">
                                        </div>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="form-group">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="email" class="form-label">Email</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="email" name="email"  value="{{auth()->user()->email}}">
                                        </div>
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <div class="form-group">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for=""></label>
                                        </div>
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-md btn-primary-gradient">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Account Settion --}}
                <div class="tab-pane" id="accountSettings">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" data-select2-id="11" method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <div class="mb-4 main-content-label">Account</div>
                                <span class="mb-4 text-gray">Update your account is using a long, random password to stay secure</span>

                                {{-- Current Password --}}
                                <div class="form-group mt-5">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="current_password" class="form-label">Current Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" id="current_password" name="current_password">
                                        </div>
                                    </div>
                                </div>

                                {{-- New Password --}}
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="password" class="form-label">New Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                    </div>
                                </div>


                                {{-- Confirm Password --}}
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>

                                {{-- Save --}}
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            </div>
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-info my-1" >Change Password</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                            {{-- Delete Account --}}

                            <div class="form-group float-end">
                                <div class="row row-sm">
                                    <div class="col-md-12">
                                        <button class="btn btn-outline-danger my-1 mx-2" onclick="openConfirmModal()">Delete Account</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->

    {{-- delete modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                <div class="modal-content p-4">

                    <div class="modal-body">
                        <h2 class="fw-semibold fs-6 mb-2 text-dark">
                            Are you sure you want to delete your account?
                        </h2>
                        <p class="text-secondary small mb-4">
                            Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.
                        </p>

                        @csrf
                        @method('delete')
                        <input type="password" name="password" class="form-control mb-4" placeholder="Password" />

                        <div class="d-flex justify-content-end gap-3">
                            <button type="button" class="btn btn-light text-secondary fw-semibold px-3 py-2" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-danger fw-semibold px-4 py-2">
                                Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openConfirmModal() {
            $('#deleteModal').modal('show');
        }
    </script>
@endsection

