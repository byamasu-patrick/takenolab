@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    @include('student.header')
    <div class="col-10">
    <script src="{{ asset('js/student.js') }}"></script>
            <div class="row">
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
                                    <form method="POST" action="/student/account/edit">
                                        @csrf
                                        <h6 class="heading-small text-muted mb-4">Student's Basic Information</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-username">Fullname</label>
                                                        <input type="text" id="username" name="username" class="form-control form-control-alternative studentInput" placeholder="Username" value="{{ $student->name }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-email">Email address</label>
                                                        <input type="email" name="email" id="email" class="form-control form-control-alternative studentInput" placeholder="{{ $student->email }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-first-name">Phone Number</label>
                                                        <input type="text" name="phone_number" id="phone_number" class="form-control form-control-alternative studentInput"  value="{{ $student->phone }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-last-name">Account Type</label>
                                                        <input type="text" name="account_type" id="account_type" class="form-control form-control-alternative studentInput" placeholder="Last name" value="{{ $student->account_type }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-last-name">Account Type</label>
                                                        <input type="password" id="password" class="form-control form-control-alternative studentInput" placeholder="New Password" value="{{ $student->password }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <button type="submit" id="edit_button" class="btn btn-success text-light"  style="float: right;margin-top: 35px;" disabled>Save Changes</button>
                                                </div>
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
                            <div class="card  shadow" style="text-align: center;height: 350px;">
                                @if( Auth::user()->profile == 'profile')
                                    <img src="{{ asset('images/tknlb9.jpeg') }}" width="100%" height="60%" alt="" srcset="">
                                @else
                                    <img src="{{ asset('images/users/'. Auth::user()->profile) }}" width="100%" height="60%" alt="" srcset="">
                                @endif
                                <div class="profile-userbuttons">
                                    <button type="button" class="btn btn-primary btn-sm" style="font-size: 8px;">Twitter</button>
                                    <button type="button" class="btn btn-danger btn-sm" style="font-size: 8px;">LinkedIn</button>
                                    <button type="button" class="btn btn-success btn-sm" style="font-size: 8px;">Facabook</button>
                                    <button type="button" class="btn btn-secondary btn-sm" style="font-size: 8px;">Instagram</button>
                                </div>
                                <div class="form-group" style="margin: 10px 10px;">
                                    <form action="/student/profile/edit" method="post" enctype="multipart/form-data">
                                        @csrf    
                                        <input type="file" name="profile" class="form-control" id="profile" onchange="changeButtonState()" placeholder="Change your profile">
                                        <button type="submit" style="width: 100%; margin-top: 10px;" id="change_profile_button" class="btn btn-success" disabled>Change Profile</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
            </div>
    </div>
</div>
</div>
@endsection
                    