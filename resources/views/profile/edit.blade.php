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
                            <form class="form-horizontal" data-select2-id="11">
                                <div class="mb-4 main-content-label">Account</div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="userName" class="form-label">User Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="userName" placeholder="User Name" value="Elena Gilbert">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="eMail" class="form-label">Email</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="eMail" placeholder="Email" value="info@elenagilbert.in">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group " data-select2-id="108">
                                    <div class="row" data-select2-id="107">
                                        <div class="col-md-3">
                                            <label for="language" class="form-label">Language</label>
                                        </div>
                                        <div class="col-md-9" data-select2-id="106">
                                            <select class="form-control select2" id="language" tabindex="-1" aria-hidden="true">
                                                <option >Us English</option>
                                                <option >Arabic</option>
                                                <option >Korean</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group " data-select2-id="10">
                                    <div class="row" data-select2-id="9">
                                        <div class="col-md-3">
                                            <label for="timeZone" class="form-label">Timezone</label>
                                        </div>
                                        <div class="col-md-9" data-select2-id="8">
                                            <select class="form-control select2" id="timeZone" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                <option value="Pacific/Midway" data-select2-id="6">(GMT-11:00) Midway Island, Samoa</option>
                                                <option value="America/Adak" data-select2-id="16">(GMT-10:00) Hawaii-Aleutian</option>
                                                <option value="Etc/GMT+10" data-select2-id="17">(GMT-10:00) Hawaii</option>
                                                <option value="Pacific/Marquesas" data-select2-id="18">(GMT-09:30) Marquesas Islands</option>
                                                <option value="Pacific/Gambier" data-select2-id="19">(GMT-09:00) Gambier Islands</option>
                                                <option value="America/Anchorage" data-select2-id="20">(GMT-09:00) Alaska</option>
                                                <option value="America/Ensenada" data-select2-id="21">(GMT-08:00) Tijuana, Baja California</option>
                                                <option value="Etc/GMT+8" data-select2-id="22">(GMT-08:00) Pitcairn Islands</option>
                                                <option value="America/Los_Angeles" data-select2-id="23">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                                <option value="America/Denver" data-select2-id="24">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                                <option value="America/Chihuahua" data-select2-id="25">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                                <option value="America/Dawson_Creek" data-select2-id="26">(GMT-07:00) Arizona</option>
                                                <option value="America/Belize" data-select2-id="27">(GMT-06:00) Saskatchewan, Central America</option>
                                                <option value="America/Cancun" data-select2-id="28">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                                <option value="Chile/EasterIsland" data-select2-id="29">(GMT-06:00) Easter Island</option>
                                                <option value="America/Chicago" data-select2-id="30">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                                <option value="America/New_York" data-select2-id="31">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                                <option value="America/Havana" data-select2-id="32">(GMT-05:00) Cuba</option>
                                                <option value="America/Bogota" data-select2-id="33">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                                <option value="America/Caracas" data-select2-id="34">(GMT-04:30) Caracas</option>
                                                <option value="America/Santiago" data-select2-id="35">(GMT-04:00) Santiago</option>
                                                <option value="America/La_Paz" data-select2-id="36">(GMT-04:00) La Paz</option>
                                                <option value="Atlantic/Stanley" data-select2-id="37">(GMT-04:00) Faukland Islands</option>
                                                <option value="America/Campo_Grande" data-select2-id="38">(GMT-04:00) Brazil</option>
                                                <option value="America/Goose_Bay" data-select2-id="39">(GMT-04:00) Atlantic Time (Goose Bay)</option>
                                                <option value="America/Glace_Bay" data-select2-id="40">(GMT-04:00) Atlantic Time (Canada)</option>
                                                <option value="America/St_Johns" data-select2-id="41">(GMT-03:30) Newfoundland</option>
                                                <option value="America/Araguaina" data-select2-id="42">(GMT-03:00) UTC-3</option>
                                                <option value="America/Montevideo" data-select2-id="43">(GMT-03:00) Montevideo</option>
                                                <option value="America/Miquelon" data-select2-id="44">(GMT-03:00) Miquelon, St. Pierre</option>
                                                <option value="America/Godthab" data-select2-id="45">(GMT-03:00) Greenland</option>
                                                <option value="America/Argentina/Buenos_Aires" data-select2-id="46">(GMT-03:00) Buenos Aires</option>
                                                <option value="America/Sao_Paulo" data-select2-id="47">(GMT-03:00) Brasilia</option>
                                                <option value="America/Noronha" data-select2-id="48">(GMT-02:00) Mid-Atlantic</option>
                                                <option value="Atlantic/Cape_Verde" data-select2-id="49">(GMT-01:00) Cape Verde Is.</option>
                                                <option value="Atlantic/Azores" data-select2-id="50">(GMT-01:00) Azores</option>
                                                <option value="Europe/Belfast" data-select2-id="51">(GMT) Greenwich Mean Time : Belfast</option>
                                                <option value="Europe/Dublin" data-select2-id="52">(GMT) Greenwich Mean Time : Dublin</option>
                                                <option value="Europe/Lisbon" data-select2-id="53">(GMT) Greenwich Mean Time : Lisbon</option>
                                                <option value="Europe/London" data-select2-id="54">(GMT) Greenwich Mean Time : London</option>
                                                <option value="Africa/Abidjan" data-select2-id="55">(GMT) Monrovia, Reykjavik</option>
                                                <option value="Europe/Amsterdam" data-select2-id="56">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                                <option value="Europe/Belgrade" data-select2-id="57">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                                <option value="Europe/Brussels" data-select2-id="58">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                <option value="Africa/Algiers" data-select2-id="59">(GMT+01:00) West Central Africa</option>
                                                <option value="Africa/Windhoek" data-select2-id="60">(GMT+01:00) Windhoek</option>
                                                <option value="Asia/Beirut" data-select2-id="61">(GMT+02:00) Beirut</option>
                                                <option value="Africa/Cairo" data-select2-id="62">(GMT+02:00) Cairo</option>
                                                <option value="Asia/Gaza" data-select2-id="63">(GMT+02:00) Gaza</option>
                                                <option value="Africa/Blantyre" data-select2-id="64">(GMT+02:00) Harare, Pretoria</option>
                                                <option value="Asia/Jerusalem" data-select2-id="65">(GMT+02:00) Jerusalem</option>
                                                <option value="Europe/Minsk" data-select2-id="66">(GMT+02:00) Minsk</option>
                                                <option value="Asia/Damascus" data-select2-id="67">(GMT+02:00) Syria</option>
                                                <option value="Europe/Moscow" data-select2-id="68">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                                <option value="Africa/Addis_Ababa" data-select2-id="69">(GMT+03:00) Nairobi</option>
                                                <option value="Asia/Tehran" data-select2-id="70">(GMT+03:30) Tehran</option>
                                                <option value="Asia/Dubai" data-select2-id="71">(GMT+04:00) Abu Dhabi, Muscat</option>
                                                <option value="Asia/Yerevan" data-select2-id="72">(GMT+04:00) Yerevan</option>
                                                <option value="Asia/Kabul" data-select2-id="73">(GMT+04:30) Kabul</option>
                                                <option value="Asia/Yekaterinburg" data-select2-id="74">(GMT+05:00) Ekaterinburg</option>
                                                <option value="Asia/Tashkent" data-select2-id="75">(GMT+05:00) Tashkent</option>
                                                <option value="Asia/Kolkata" data-select2-id="76">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                                <option value="Asia/Katmandu" data-select2-id="77">(GMT+05:45) Kathmandu</option>
                                                <option value="Asia/Dhaka" data-select2-id="78">(GMT+06:00) Astana, Dhaka</option>
                                                <option value="Asia/Novosibirsk" data-select2-id="79">(GMT+06:00) Novosibirsk</option>
                                                <option value="Asia/Rangoon" data-select2-id="80">(GMT+06:30) Yangon (Rangoon)</option>
                                                <option value="Asia/Bangkok" data-select2-id="81">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                                <option value="Asia/Krasnoyarsk" data-select2-id="82">(GMT+07:00) Krasnoyarsk</option>
                                                <option value="Asia/Hong_Kong" data-select2-id="83">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                                <option value="Asia/Irkutsk" data-select2-id="84">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                <option value="Australia/Perth" data-select2-id="85">(GMT+08:00) Perth</option>
                                                <option value="Australia/Eucla" data-select2-id="86">(GMT+08:45) Eucla</option>
                                                <option value="Asia/Tokyo" data-select2-id="87">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                <option value="Asia/Seoul" data-select2-id="88">(GMT+09:00) Seoul</option>
                                                <option value="Asia/Yakutsk" data-select2-id="89">(GMT+09:00) Yakutsk</option>
                                                <option value="Australia/Adelaide" data-select2-id="90">(GMT+09:30) Adelaide</option>
                                                <option value="Australia/Darwin" data-select2-id="91">(GMT+09:30) Darwin</option>
                                                <option value="Australia/Brisbane" data-select2-id="92">(GMT+10:00) Brisbane</option>
                                                <option value="Australia/Hobart" data-select2-id="93">(GMT+10:00) Hobart</option>
                                                <option value="Asia/Vladivostok" data-select2-id="94">(GMT+10:00) Vladivostok</option>
                                                <option value="Australia/Lord_Howe" data-select2-id="95">(GMT+10:30) Lord Howe Island</option>
                                                <option value="Etc/GMT-11" data-select2-id="96">(GMT+11:00) Solomon Is., New Caledonia</option>
                                                <option value="Asia/Magadan" data-select2-id="97">(GMT+11:00) Magadan</option>
                                                <option value="Pacific/Norfolk" data-select2-id="98">(GMT+11:30) Norfolk Island</option>
                                                <option value="Asia/Anadyr" data-select2-id="99">(GMT+12:00) Anadyr, Kamchatka</option>
                                                <option value="Pacific/Auckland" data-select2-id="100">(GMT+12:00) Auckland, Wellington</option>
                                                <option value="Etc/GMT-12" data-select2-id="101">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                                <option value="Pacific/Chatham" data-select2-id="102">(GMT+12:45) Chatham Islands</option>
                                                <option value="Pacific/Tongatapu" data-select2-id="103">(GMT+13:00) Nuku'alofa</option>
                                                <option value="Pacific/Kiritimati" data-select2-id="104">(GMT+14:00) Kiritimati</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3 col">
                                            <label class="form-label">Verification</label>
                                        </div>
                                        <div class="col-md-9 col d-flex">
                                            <div class="custom-checkbox custom-control mx-2">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="Email">
                                                <label for="Email" class="custom-control-label">Email</label>
                                            </div>
                                            <div class="custom-checkbox custom-control mx-2">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="Sms">
                                                <label for="Sms" class="custom-control-label">Sms</label>
                                            </div>
                                            <div class="custom-checkbox custom-control mx-2">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="Phone">
                                                <label for="Phone" class="custom-control-label">Phone</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 main-content-label">Secuirity Settings</div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Login Verification</label>
                                        </div>
                                        <div class="col-md-9"> <a href="#">Setup Verification</a> </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Password Verification</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-checkbox custom-control mx-2">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="personal">
                                                <label for="personal" class="custom-control-label">Required personal details</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-4 main-content-label">Notifications</div>
                                    <div class="form-group mb-0">
                                        <div class="row row-sm">
                                            <div class="col-md-3">
                                                <label class="form-label">Configure Notifications</label>
                                            </div>
                                            <div class="col-md-9">
                                                <label class="d-block">
                                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="text-muted ms-2">Allow all Notifications</span>
                                                </label>
                                                <label class="d-block">
                                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="text-muted ms-2">Disable all Notifications</span>
                                                </label>
                                                <label class="d-block">
                                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" checked>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="text-muted ms-2">Notification Sounds</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group float-end">
                                    <div class="row row-sm">
                                        <div class="col-md-12">
                                            <a class="btn btn-info my-1" href="#">Change Password</a>
                                            <a class="btn btn-outline-danger my-1" href="#">Deactivate Account</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->


@endsection

