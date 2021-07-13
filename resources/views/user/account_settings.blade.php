@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    @include('student.header')
    <div class="col-10">
    <script src="{{ asset('js/student.js') }}"></script>
            <div class="row">
                    <div class="col-12">
                        <div class="col-xl-8 order-xl-1">
                            <div class="card bg-light shadow">
                                <div class="card-header bg-white border-0">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                            <h3 class="mb-0">My account</h3>
                                            </div>
                                            <div class="col-4 text-right">
                                            <a href="#!" class="btn btn-sm btn-success" onclick="enableEditAcount()">Enable Editing</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <h6 class="heading-small text-muted mb-4">Teacher Basic Informations</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-username">Fullname</label>
                                                        <input type="text" id="username" class="form-control form-control-alternative studentInput" placeholder="Username" value="{{ $teacher->name }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-email">Email address</label>
                                                        <input type="email" id="email" class="form-control form-control-alternative studentInput" placeholder="{{ $teacher->email }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-first-name">Phone Number</label>
                                                        <input type="text" id="phone_number" class="form-control form-control-alternative studentInput"  value="{{ $teacher->phone }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-last-name">Account Type</label>
                                                        <input type="text" id="account_type" class="form-control form-control-alternative studentInput" placeholder="Last name" value="{{ $teacher->account_type }}" disabled>
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
                                        <hr class="my-4">
                                        <h6 class="heading-small text-muted mb-4">Additional Informations</h6>
                                        <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-address">Address</label>
                                                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                                    </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-city">City</label>
                                                    <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                                                </div>
                                                </div>
                                                <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-country">Country</label>
                                                    <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                                                </div>
                                                </div>
                                                <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Postal code</label>
                                                    <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>        
                        </div>
                        <div class="col-xl-4 order-xl-1">
                            
                        </div>
                    </div>
            </div>
    </div>
</div>
</div>
@endsection
                    