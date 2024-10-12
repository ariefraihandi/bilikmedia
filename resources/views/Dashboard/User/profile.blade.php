@extends('Dashboard.Index.appDashboard')

@section('content')       
    <div class="dashboard__inner d-flex">

        
        <div class="dashboard-body">
            <!-- Cover Photo Start -->
            <div class="cover-photo position-relative z-index-1 overflow-hidden">
                <div class="avatar-upload">                    
                    <div class="avatar-preview">
                        <div id="imagePreviewTwo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-body__content profile-content-wrapper z-index-1 position-relative mt--100">                
                <div class="profile">
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-xl-4">
                            <div class="profile-info">
                                <div class="profile-info__inner mb-40 text-center">

                                    <div class="avatar-upload mb-2">                                        
                                        <div class="avatar-preview">
                                            <img id="uiAvatar" src="" alt="Avatar" />
                                        </div>
                                    </div>                                    
                                    
                                    <h5 class="profile-info__name mb-1">
                                        @if($userDetail)
                                            {{ $userDetail->name }}
                                        @else
                                           Bilik Media User
                                        @endif
                                    </h5>
                                    <span class="profile-info__designation font-14">
                                        {{ $user->username }}
                                    </span>
                                    
                                </div>

                                <ul class="profile-info-list">
                                    <li class="profile-info-list__item">
                                        <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                            <img src="{{ asset('assets') }}/images/icons/profile-info-icon1.svg" alt="" class="icon">
                                            <span class="text text-heading fw-500">Username</span>
                                        </span>
                                        <span class="profile-info-list__info">{{ $user->username }}</span>
                                    </li>
                                    <li class="profile-info-list__item">
                                        <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                            <img src="{{ asset('assets') }}/images/icons/profile-info-icon2.svg" alt="" class="icon">
                                            <span class="text text-heading fw-500">Email</span>
                                        </span>
                                        <span class="profile-info-list__info">{{ $user->email }}</span>
                                    </li>
                                    @if($userDetail)
                                        <li class="profile-info-list__item">
                                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                                <img src="{{ asset('assets') }}/images/icons/profile-info-icon3.svg" alt="" class="icon">
                                                <span class="text text-heading fw-500">Phone</span>
                                            </span>
                                            <span class="profile-info-list__info">  {{ $userDetail->phone }}</span>
                                        </li>         
                                        <li class="profile-info-list__item">
                                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                                <img src="{{ asset('assets') }}/images/icons/profile-info-icon5.svg" alt="" class="icon">
                                                <span class="text text-heading fw-500">Credit</span>
                                            </span>
                                            <span class="profile-info-list__info">
                                                {{ $userDetail->kredit }}
                                                <!-- Bungkus "Get Credit" dengan anchor tag -->
                                                <a href="{{ route('credit.dashboard') }}" style="text-decoration: none; color: inherit;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| + Get Credit</a>
                                            </span>
                                        </li>
                                        <li class="profile-info-list__item">
                                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                                <img src="{{ asset('assets') }}/images/icons/sidebar-icon5.svg" alt="" class="icon">
                                                <span class="text text-heading fw-500">Refferal</span>
                                            </span>
                                            <span class="profile-info-list__info">
                                                <a href="{{ route('refferal.list') }}" style="text-decoration: none; color: inherit;">
                                                    {{ $reffCount }} User
                                                </a>
                                            </span>
                                        </li>
                                        
                                        <li class="profile-info-list__item">
                                            <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                                <img src="{{ asset('assets') }}/images/icons/download.svg" alt="" class="icon">
                                                <!-- Ubah span menjadi anchor tag (link) -->
                                                <a href="{{ route('show.downloadHistory') }}" class="text text-heading fw-500" style="text-decoration: none; color: inherit;">
                                                    Download
                                                </a>
                                            </span>
                                            <span class="profile-info-list__info">
                                                <a href="{{ route('show.downloadHistory') }}" style="text-decoration: none; color: inherit;">
                                                    {{ $emailCount }} items
                                                </a>
                                            </span>
                                        </li>
                                                                                            
                                    @endif                                   
                                  
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    
                                    <li class="profile-info-list__item">
                                        <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                            <img src="{{ asset('assets') }}/images/icons/profile-info-icon6.svg" alt="" class="icon">
                                            <span class="text text-heading fw-500">Member Since</span>
                                        </span>
                                        <span class="profile-info-list__info">{{ Carbon::parse($user->created_at)->format('M Y') }}</span>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="col-xxl-9 col-xl-8">
                            <div class="dashboard-card">
                                <div class="dashboard-card__header pb-0">
                                    <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                        <button class="nav-link font-18 font-heading active" id="pills-personalInfo-tab" data-bs-toggle="pill" data-bs-target="#pills-personalInfo" type="button" role="tab" aria-controls="pills-personalInfo" aria-selected="true">Personal Info</button>
                                        </li>
                                       
                                        {{-- <li class="nav-item" role="presentation">
                                        <button class="nav-link font-18 font-heading" id="pills-changePassword-tab" data-bs-toggle="pill" data-bs-target="#pills-changePassword" type="button" role="tab" aria-controls="pills-changePassword" aria-selected="false">Change Password</button>
                                        </li> --}}
                                    </ul>
                                </div>

                                <div class="profile-info-content">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-personalInfo" role="tabpanel" aria-labelledby="pills-personalInfo-tab" tabindex="0">
                                            <form action="{{ route('update.profile') }}" method="POST" autocomplete="off">
                                                @csrf
                                                <div class="row gy-4">
                                                    <div class="col-sm-6 col-xs-6">
                                                        <label for="username" class="form-label mb-2 font-18 font-heading fw-600">Username</label>
                                                        <input type="text" class="common-input border" id="username" name="username" value="{{ $user->username }}" disabled>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-6">
                                                        <label for="email" class="form-label mb-2 font-18 font-heading fw-600">e-Mail</label>
                                                        <input type="text" class="common-input border" id="email" name="email" value="{{ $user->email }}" disabled>
                                                    </div>
                                                    @if(!$userDetail)
                                                        <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px; margin-bottom: 10px; text-align: center;">
                                                            Please complete your personal info to get your first credit.
                                                        </div>
                                                    @endif
                                                                                                
                                                    <div class="col-sm-6 col-xs-6">
                                                        <label for="name" class="form-label mb-2 font-18 font-heading fw-600">Name</label>
                                                        <input type="text" class="common-input border" id="name" name="name"
                                                            @if(!$userDetail) 
                                                                placeholder="John Doe"
                                                            @else 
                                                                placeholder="{{ $userDetail->name }}"
                                                            @endif>
                                                    </div>  
                                                    <div class="col-sm-6 col-xs-6">
                                                        <label for="phone" class="form-label mb-2 font-18 font-heading fw-600">Phone</label>
                                                        <input type="tel" class="common-input border" name="phone" id="phone" 
                                                            @if(!$userDetail) 
                                                                placeholder="+123"
                                                            @else 
                                                                placeholder="{{ $userDetail->phone }}"
                                                            @endif>
                                                    </div>                                                    
                                                    
                                                    <div class="col-sm-12 text-end">
                                                        <button class="btn btn-main btn-lg pill mt-4"> Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    
                                        <div class="tab-pane fade" id="pills-changePassword" role="tabpanel" aria-labelledby="pills-changePassword-tab" tabindex="0"> 
                                            <form action="#" autocomplete="off">
                                                <div class="row gy-4">

                                                    <div class="col-12">
                                                        <label for="current-password" class="form-label mb-2 font-18 font-heading fw-600">Current Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="common-input common-input--withIcon common-input--withLeftIcon " id="current-password" placeholder="************">
                                                            <span class="input-icon input-icon--left"><img src="{{ asset('assets') }}/images/icons/key-icon.svg" alt=""></span>
                                                            <span class="input-icon password-show-hide fas fa-eye la-eye-slash toggle-password-two" id="#current-password"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <label for="new-password" class="form-label mb-2 font-18 font-heading fw-600">New Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="common-input common-input--withIcon common-input--withLeftIcon " id="new-password" placeholder="************">
                                                            <span class="input-icon input-icon--left"><img src="{{ asset('assets') }}/images/icons/lock-two.svg" alt=""></span>
                                                            <span class="input-icon password-show-hide fas fa-eye la-eye-slash toggle-password-two" id="#new-password"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xs-6">
                                                        <label for="confirm-password" class="form-label mb-2 font-18 font-heading fw-600">Current Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="common-input common-input--withIcon common-input--withLeftIcon " id="confirm-password" placeholder="************">
                                                            <span class="input-icon input-icon--left"><img src="{{ asset('assets') }}/images/icons/lock-two.svg" alt=""></span>
                                                            <span class="input-icon password-show-hide fas fa-eye la-eye-slash toggle-password-two" id="#confirm-password"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12 text-end">
                                                        <button class="btn btn-main btn-lg pill mt-4"> Update Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>                
            </div>                               
        </div>
    </div>
@endsection
