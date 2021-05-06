
<!--== Start Search box Wrapper ==-->
<div class="mfp-hide modalSearchBox" id="search-box-popup">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="search-box-wrapper">
                <form action="#" method="POST" class="search-form-area">
                    <input type="search" class="form-control" name="search" id="search" placeholder="Search">
                    <button type="submit" class="btn btn-brand btn-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--== End Search box Wrapper ==-->

<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1>Contact Us</h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="javascript:void(0)" class="current">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->

<!-- Start Map Area Wrapper -->
<div class="map-area-wrapper">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.920351412605!2d-73.58580168434436!3d40.7197698450767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c27d9528680001%3A0xa6a3f0d547c8334a!2s626%20RXR%20Plaza%206th%20Floor%2C%20Uniondale%2C%20NY%2011556%2C%20USA!5e0!3m2!1sen!2sin!4v1620313432911!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<!-- End Map Area Wrapper -->


<!--== Start Contact Page ==-->
<div id="contact-page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Start Contact Info  -->
            <div class="col-lg-6">
                <div class="contact-info-wrap contact-method">
                    <h2>Contact Info</h2>
                    <p>If you have any problems,suggestions and feedback then please feel free to contact with us.
                        Choose our communication soruces. We will love to hear from you.</p>

                    <div class="contact-info-items">
                       

                        <div class="single-contact-info">
                            <h3><i class="fa fa-envelope"></i> Mail</h3>
                            <a href="mailto:info@perfume11.com">info@perfume11.com</a>
                        </div>

                        <div class="single-contact-info">
                            <h3><i class="fa fa-map-marker"></i> Address</h3>
                               <div class="row">
                                    <div class="col-lg-6">
                                         <a href=""><strong>USA Headquarter</strong> :
                                            Perfume E11even 626 Rexcorp plaza 6th floor Uniondale, NY 11556
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href=""><strong>Canada </strong> :                               
                                                Perfume E11even Inc., 10 George st North, Brampton, ON,  L6x1r2
                                        </a>
                                    </div>
                               </div>
                        </div>

                        <div class="single-contact-info">
                            <h3><i class="fa fa-clock-o"></i> Working Hours</h3>
                            <a href="#" target="_blank"><b> 24*7 Hrs</b></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Contact Info  -->

            <!-- Start Contact Form -->
            <div class="col-lg-6">
                <div class="contact-form-wrap contact-method">
                    <h2>Write to Us</h2>
                    <form action="<?=base_url()?>Home/ContactSubmit" method="post" >
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-input-item">
                                    <input type="text" name="first_name" placeholder="First Name" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-input-item">
                                    <input type="text" name="last_name" placeholder="Last Name" required/>
                                </div>
                            </div>
                        </div>

                        <div class="single-input-item">
                            <input type="email" name="contact_email" placeholder="Email Address" required/>
                        </div>

                        <div class="single-input-item">
                            <input type="text" name="contact_subject" placeholder="Subject" required/>
                        </div>

                        <div class="single-input-item">
                            <textarea name="contact_message" cols="30" rows="4"
                                      placeholder="Write your Message" required></textarea>
                        </div>

                        <div class="single-input-item">
                            <input class="btn btn-brand" type="submit" name="submit" value="Send Message">
                        </div>
                        <!-- Show Success or Error Message -->
                    </form>
                </div>
            </div>
            <!-- End Contact Form -->
        </div>
    </div>
</div>
<!--== End Contact Page ==-->
