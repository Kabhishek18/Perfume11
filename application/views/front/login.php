<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1>Login / Register</h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="#" class="current">Login / Register</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->

<!--== Start Login & Register Page ==-->
<div id="login_reg-page-wrapper" class="page-padding">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Login Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap  pr-lg-50">
                        <h2>Log In</h2>

                        <form action="#" method="post">
                            <div class="single-input-item">
                                <input type="email" placeholder="Email" required/>
                            </div>

                            <div class="single-input-item">
                                <input type="password" placeholder="Enter your Password" required/>
                            </div>

                            <div class="single-input-item">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                            <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                        </div>
                                    </div>

                                    <a href="#" class="forget-pwd">Forget Password?</a>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <button class="btn btn-brand">Login Account</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login Content End -->

                <!-- Register Content Start -->
                <div class="col-lg-6">
                    <div class="login-reg-form-wrap signup-form">
                        <h2>Register Account</h2>
                        <form action="#" method="post">
                            <div class="single-input-item">
                                <input type="text" placeholder="Full Name" required/>
                            </div>

                            

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="email" placeholder="Enter your Email" required/>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Enter your Password" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <div class="login-reg-form-meta">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                            <label class="custom-control-label" for="subnewsletter">Subscribe Our
                                                Newsletter</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <button class="btn btn-brand">Register Here</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register Content End -->
            </div>
        </div>
    </div>
</div>
<!--== End Login & Register Page ==-->