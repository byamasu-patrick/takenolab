@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    @include('admin.header')
    <div class="col-10">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <span class="btn material-icons-outlined" data-toggle="modal" data-target="#form">New Account</span>                   
                        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#" class="u-image u-logo u-image-1" data-image-width="500" data-image-height="500">
                                        <img src="{{ asset('images/logo.png') }}" width="50" height="50" class="u-logo-image u-logo-image-1" data-image-width="64">
                                        </a>
                                    </div>
                                    <div class="col-9">
                                        <h5 class="modal-title" id="exampleModalLabel">Create an Account</h5>

                                    </div>
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                
                            </div>
                <div class="card" style="padding: 20px;">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="_name" type="text" placeholder="Full Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">                            
                            <div class="col-md-12">
                                <input id="_phone" type="text" placeholder="Phone Number"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-md-12">
                                <input id="_email" type="email" placeholder="Email adddress"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-12">
                                <select class="custom-select custom-select-sm" id="_account_type" class="form-control @error('account_type') is-invalid @enderror" name="account_type" required>
                                    <option selected>Choose the type of the account</option>
                                    <option value="administrator">Administrator</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="mentor">Mentor</option>                                
                                    <option value="student">Student</option>
                                </select>
                                <!-- <input id="account_type" type="text" class="form-control @error('account_type') is-invalid @enderror" name="account_type" value="{{ old('account_type') }}" required autocomplete="account_type"> -->
                                @error('account_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="_password" type="password" placeholder="Type your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="_password-confirm" placeholder="Re-type your password"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background: #6d824a; border-radius: none;">
                                    {{ __('Create Account') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                            </div>
                        </div>
                        </div>
                </div>
                <ul class = "list-group">
                    @for($i = 0; $i < count($users); ++$i)
                        <li class = "list-group-item">
                            <div class="row">
                            <div class="col-8">
                                <span class="" href="#" style="font-weight: bold; color: #6d824a">{{ $users[$i]['name'] }} </span> 
                                <span class="" style="font-size: 14px;">Account: {{ $users[$i]['account_type'] }}</span>
                            </div>
                            <div class="col-4">                  
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenu{{ $users[$i]['id'] }}"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: #6d824a; padding: 10px 20px; margin-right: 10px;">Setting</button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $users[$i]['id'] }}">
                                                <li><button class="dropdown-item" type="button" onclick="viewAccount({{ $users[$i]['id'] }})">View Account Details</button></li>
                                                <li><button class="dropdown-item" type="button"  onclick="updateAccounts('/admin/accounts/{{ $users[$i]['id'] }}')">Edit Account</button></li>
                                                <li><button class="dropdown-item" type="button"  onclick="deleteAccount({{ $users[$i]['id'] }})">Delete Account</button></li>
                                            </ul>
                                        </div>
                                </a>  
                            </div>
                            </div>
                        </li>
                    @endfor
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                </ul>
            </div>
            <div class="col-8">
                <div class="row" id="row_profile" style="display: none;">
                    <div class="col-xl-8 order-xl-1">
                                <div class="card bg-light shadow">
                                    <div class="card-header bg-white border-0">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h3 class="mb-0">Account Settings</h3>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <a href="#!" id="enable_button" class="btn btn-sm btn-success" onclick="enableEditAcount()">Enable Editing</a>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="/admin/account/edit">
                                            @csrf
                                            <h6 class="heading-small text-muted mb-4">Student's Basic Information</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label" for="input-username">Fullname</label>
                                                            <input type="text" id="username" name="username" class="form-control form-control-alternative studentInput" placeholder="Username" value="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="input-email">Email address</label>
                                                            <input type="email" name="email" id="email_" class="form-control form-control-alternative studentInput" placeholder="" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label" for="input-first-name">Phone Number</label>
                                                            <input type="text" name="phone_number" id="phone_number" class="form-control form-control-alternative studentInput"  value="" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label" for="input-last-name">Account Type</label>
                                                            <input type="text" name="account_type" id="account_type_" class="form-control form-control-alternative studentInput" placeholder="Last name" value="" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label" for="input-last-name">Password</label>
                                                            <input type="password" name="password" id="password_" class="form-control form-control-alternative studentInput" placeholder="New Password" value="" disabled>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-6">
                                                        <button type="submit" id="edit_button" class="btn btn-success text-light"  style="float: right;margin-top: 35px;" disabled>Save Changes</button>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <h6 class="heading-small text-muted mb-4">Additional Information</h6>
                                            <div class="pl-lg-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label" for="input-address">Address</label>
                                                            <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Dzaleka Camp, Katudza / 124" type="text">
                                                        </div>
                                                        </div>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-city">City</label>
                                                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="Dowa">
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-country">Country</label>
                                                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="Malawi">
                                                    </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-country">Postal code</label>
                                                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code" value="00265">
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button type="submit" class="btn btn-success text-light"  style="float: right;">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div> 
                    </div>
                    <div class="col-xl-4 order-xl-1">
                            <div class="card  shadow" style="text-align: center;height: 200px;">
                                <img src="{{ asset('images/tknlb9.jpeg') }}" width="100%" height="100%" alt="" srcset="" id="img_profile">
                                <div class="form-group" style="margin: 10px 10px;">
                                    <!-- <form action="/admin/profile/edit" method="post" enctype="multipart/form-data">
                                        @csrf 
                                        <input type="hidden" class="form-control" name="user_id" id="user_id">
                                        <input type="file" name="profile" class="form-control" id="profile" onchange="changeButtonState()" placeholder="Change your profile"> 
                                       <button type="submit" style="width: 100%; margin-top: 10px;" id="change_profile_button" class="btn btn-success" disabled>Change Profile</button>
                                    </form>-->
                                    <small>Profile Picture</small>
                                </div>
                            </div>
                            
                    </div>
                </div>
                
                <div class="card" id="edit_acc" style="display: none;" >
                    <div class="card-body">
                        <form method="POST" action="/admin/accounts/edit" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Username') }}</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-left">{{ __('Phone Number') }}</label>

                                <div class="col-md-7">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email') }}</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="account_type" class="col-md-4 col-form-label text-md-left">{{ __('Account Type') }}</label>

                                <div class="col-md-7">
                                    <input id="account_type" type="text" class="form-control @error('account_type') is-invalid @enderror" name="account_type" value="{{ old('account_type') }}" required autocomplete="account_type">

                                    @error('account_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" disabled>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-md-7">
                                    <input id="user_id" type="hidden" class="form-control" name="user_id" required autocomplete="user_id">
                                </div>
                            </div>
                            <div class="form-group row file-field">
                                <label for="profile" class="col-md-4 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                <div class="col-md-7">
                                    <div class="btn btn-success btn-sm float-left" style="background: #6d824a">
                                    <span>Choose your profile</span>
                                    <input type="file" name="profile" id="profile" class="form-control">
                                    </div>
                                </div>
                                    <!-- <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload your file">
                                    </div> -->
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-7">
                                    <button type="submit" class="btn" style="width: 125px; background: #6d824a; color: white;">
                                        {{ __('Save') }}
                                    </button>
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
@endsection