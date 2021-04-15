<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1>User Verification</h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="<?=base_url()?>LoginRegister" >Login / Register</a></li>
                        <li><a href="javascript:void(0)" class="current">User Verification</a></li>
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
                <div class="col-lg-12">
                    <div class="login-reg-form-wrap  pr-lg-50">
                        <?php echo form_open_multipart('Home/VerifyEmail','') ?> 
                            <div class="single-input-item">
                                <input type="text" name="UserEmail" value="<?=$UserEmail?>" readonly/>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <input type="text" name="UserName" value="<?=$UserName?>" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <input type="text" name="UserPhone" value="<?=$UserPhone?>" readonly/>
                                    </div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <button class="btn btn-brand">Verify Now</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <a class="btn btn-brand" href="<?=base_url()?>LoginRegister">Reset </a>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close() ?>                         
                    </div>
                </div>
                <!-- Login Content End -->

            </div>
        </div>
    </div>
</div>
<!--== End Login & Register Page ==-->