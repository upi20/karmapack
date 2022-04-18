@extends('templates.admin.master')

@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Password</div>
                </div>
                <div class="card-body">
                    <div class="text-center chat-image mb-5">
                        <div class="avatar avatar-xxl chat-profile mb-3 brround">
                            <a class="" href="profile.html"><img alt="avatar"
                                    src="{{ asset('assets/templates/admin/main/assets/images/profile.png') }}"
                                    class="brround"></a>
                        </div>
                        <div class="main-chat-msg-name">
                            <a href="profile.html">
                                <h5 class="mb-1 text-dark fw-semibold">Percy Kewshun</h5>
                            </a>
                            <p class="text-muted mt-0 mb-0 pt-0 fs-13">Web Designer</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 form-control" type="password" placeholder="Current Password">
                        </div>
                        <!-- <input type="password" class="form-control" value="password"> -->
                    </div>
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle1">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 form-control" type="password" placeholder="New Password">
                        </div>
                        <!-- <input type="password" class="form-control" value="password"> -->
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle2">
                            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 form-control" type="password" placeholder="Confirm Password">
                        </div>
                        <!-- <input type="password" class="form-control" value="password"> -->
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0)" class="btn btn-primary">Update</a>
                    <a href="javascript:void(0)" class="btn btn-danger">Cancel</a>
                </div>
            </div>
            <div class="card panel-theme">
                <div class="card-header">
                    <div class="float-start">
                        <h3 class="card-title">Contact</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body no-padding">
                    <ul class="list-group no-margin">
                        <li class="list-group-item d-flex ps-3">
                            <div class="social social-profile-buttons me-2">
                                <a class="social-icon text-primary" href=""><i class="fe fe-mail"></i></a>
                            </div>
                            <a href="javascript:void(0)" class="my-auto">support@demo.com</a>
                        </li>
                        <li class="list-group-item d-flex ps-3">
                            <div class="social social-profile-buttons me-2">
                                <a class="social-icon text-primary" href=""><i class="fe fe-globe"></i></a>
                            </div>
                            <a href="javascript:void(0)" class="my-auto">www.abcd.com</a>
                        </li>
                        <li class="list-group-item d-flex ps-3">
                            <div class="social social-profile-buttons me-2">
                                <a class="social-icon text-primary" href=""><i class="fe fe-phone"></i></a>
                            </div>
                            <a href="javascript:void(0)" class="my-auto">+125 5826 3658</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="exampleInputname">First Name</label>
                                <input type="text" class="form-control" id="exampleInputname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="exampleInputname1">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputname1"
                                    placeholder="Enter Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputnumber">Contact Number</label>
                        <input type="number" class="form-control" id="exampleInputnumber" placeholder="Contact number">
                    </div>
                    <div class="form-group">
                        <label class="form-label">About Me</label>
                        <textarea class="form-control" rows="6">My bio.........</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Website</label>
                        <input class="form-control" placeholder="http://splink.com">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date Of Birth</label>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <select class="form-control select2 form-select">
                                    <option value="0">Date</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-control select2 form-select">
                                    <option value="0">Mon</option>
                                    <option value="1">Jan</option>
                                    <option value="2">Feb</option>
                                    <option value="3">Mar</option>
                                    <option value="4">Apr</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">Aug</option>
                                    <option value="9">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select class="form-control select2 form-select">
                                    <option value="0">Year</option>
                                    <option value="1">2018</option>
                                    <option value="2">2017</option>
                                    <option value="3">2016</option>
                                    <option value="4">2015</option>
                                    <option value="5">2014</option>
                                    <option value="6">2013</option>
                                    <option value="7">2102</option>
                                    <option value="8">2012</option>
                                    <option value="9">2011</option>
                                    <option value="10">2010</option>
                                    <option value="11">2009</option>
                                    <option value="12">2008</option>
                                    <option value="13">2007</option>
                                    <option value="14">2006</option>
                                    <option value="15">2005</option>
                                    <option value="16">2004</option>
                                    <option value="17">2003</option>
                                    <option value="18">2002</option>
                                    <option value="19">2001</option>
                                    <option value="20">1999</option>
                                    <option value="21">1998</option>
                                    <option value="22">1997</option>
                                    <option value="23">1996</option>
                                    <option value="24">1995</option>
                                    <option value="25">1994</option>
                                    <option value="26">1993</option>
                                    <option value="27">1992</option>
                                    <option value="28">1991</option>
                                    <option value="29">1990</option>
                                    <option value="30">1989</option>
                                    <option value="31">1988</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0)" class="btn btn-success my-1">Save</a>
                    <a href="javascript:void(0)" class="btn btn-danger my-1">Cancel</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Notifications</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        checked="">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Updates
                                        Automatically</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Allow Location
                                        Map</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        checked="">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Show
                                        Contacts</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        checked="">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Show
                                        Notfication</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Show Tasks
                                        Statistics</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        checked="">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Show Email
                                        Notification</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Privacy and Security</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        checked="">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Allow Others to
                                        see my profile</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Make my profile
                                        Public</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Security
                                        Alert</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        checked="">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Passcode and
                                        Face ID</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Two Step
                                        Verification</span>
                                </label>
                            </div>
                            <div class="form-group mg-b-10">
                                <label class="custom-switch ps-0">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                        checked="">
                                    <span class="custom-switch-indicator me-3"></span>
                                    <span class="custom-switch-description mg-l-10">Always Sign
                                        In</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Delete Account</div>
                </div>
                <div class="card-body">
                    <p>Its Advisable for you to request your data to be sent to your Email.</p>
                    <label class="custom-control custom-checkbox mb-0">
                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1"
                            checked>
                        <span class="custom-control-label">Yes, Send my data to my Email.</span>
                    </label>
                </div>
                <div class="card-footer text-end">
                    <a href="javascript:void(0)" class="btn btn-primary my-1">Deactivate</a>
                    <a href="javascript:void(0)" class="btn btn-danger my-1">Delete Account</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->
@endsection
