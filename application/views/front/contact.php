
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop.html" class="current">Contact</a></li>
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
    <div id="map_content" data-lat="23.763491" data-lng="90.431167" data-zoom="8" data-maptitle="HasTech"
         data-mapaddress="Floor# 4, House# 5, Block# C </br> Banasree Main Rd, Dhaka">
    </div>
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
                            <h3><i class="fa fa-phone"></i> Call</h3>
                            <a href="tel:+23140596971">+231 40596971</a>
                        </div>

                        <div class="single-contact-info">
                            <h3><i class="fa fa-envelope"></i> Mail</h3>
                            <a href="mailto:your@email.here">your@email.here</a>
                        </div>

                        <div class="single-contact-info">
                            <h3><i class="fa fa-map-marker"></i> Address</h3>
                            <a href="#" target="_blank">San Francisco, CA 94111, United States</a>
                        </div>

                        <div class="single-contact-info">
                            <h3><i class="fa fa-clock-o"></i> Working Hours</h3>
                            <a href="#" target="_blank"><b>Monday – Saturday:</b> 08AM – 22PM</a>
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
