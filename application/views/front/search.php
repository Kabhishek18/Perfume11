<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1>Search</h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="javascript:void(0)" class="current">Category</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->

    <!-- Bootstrap Core CSS -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
    <script src="<?=base_url()?>resources/assets/js/vendor/jquery-3.3.1.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href = "<?php echo base_url(); ?>asset/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>asset/style.css" rel="stylesheet">
   <!-- Page Content -->
   <div id="shop-page-wrapper" class="page-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="sidebar-area-wrap">
                        <div class="single-sidebar-wrap" style="display: none;">
                             <h2 class="sidebar-title">Fragrances by Price</h2>
                             <div class="sidebar-body">
                                <div class="sidebar-list" style="border-right: 3px solid #dfdfdf; padding: 10px;">
                                    <input type="hidden" id="hidden_minimum_price" value="1" />
                                    <input type="hidden" id="hidden_maximum_price" value="200" />
                                    <p id="price_show">$1 - $80</p>
                                    <div id="price_range"></div>
                                </div>
                             </div>   
                        </div>  

                           
                        <div class="single-sidebar-wrap">
                             <h2 class="sidebar-title">Fragrances by Gender</h2>
                             <div class="sidebar-body">
                                <ul class="sidebar-list">
                                    <?php foreach($Gender as $row){ ?>
                                    <li><input type="checkbox" class="common_selector gender" value="<?php echo $row['Gender']; ?>"  <?=(($this->uri->segment(2,0)==$row['Gender']?'Checked':''))?> > <?php echo $row['Gender']; ?> </li>
                                    <?php } ?>  
                                </ul>
                            </div>      
                        </div>  
                        
                       <div class="single-sidebar-wrap">
                             <h2 class="sidebar-title">Fragrances by Brand</h2>
                             <div class="sidebar-body">
                                <ul class="sidebar-list">

                                    <?php $list =array();;$i=0;foreach($BrandName as $row){ $list[] =$row['BrandName']; ?>
                                    <li><input type="checkbox" class="common_selector brand" value="<?php echo $row['BrandName']; ?>" <?=((urldecode($this->uri->segment(2,0))==$row['BrandName']?'Checked':''))?> >  <?php echo $row['BrandName']; ?> </li>
                                    <?php } ?>  
                                        
                                      <?php if(!in_array(urldecode($this->uri->segment(2,0)), $list) ){ ?>
                                        <li><input type="checkbox" class="common_selector brand" value="<?=urldecode($this->uri->segment(2,0))?>" <?=((urldecode($this->uri->segment(2,0))!=$row['BrandName']?'Checked':''))?> >  <?=urldecode($this->uri->segment(2,0))?></li>
                                     <?php }?>
                                     <li><a href="<?=base_url()?>Brand"><strong>See More+</strong></a></li>
                                </ul>
                            </div>      
                        </div>      

        

                        <div class="single-sidebar-wrap">
                             <h2 class="sidebar-title">Fragrances by Type</h2>
                             <div class="sidebar-body">
                                <ul class="sidebar-list">
                                    <?php foreach($Type as $row){ ?>
                                    <li><input type="checkbox" class="common_selector brand" value="<?php echo $row['Type']; ?>" <?=((urldecode($this->uri->segment(2,0))==$row['Type']?'Checked':''))?>   > <?php echo $row['Type']; ?> </li>
                                    <?php } ?>  
                                </ul>
                            </div>      
                        </div>      

                    
                    </div>
                    
                </div>

                <div class="col-lg-9 order-first order-lg-last">
                    <div class="shop-page-content-wrap">
                        <div class="shop-page-products-wrap">
                            <div class="products-wrapper product-grid-view physicianList">
                                
                                <div class="row filter_data">
                                </div>


                              
                                <div class="d-flex justify-content-center nav">
                                  
                                    <div class="nav" id="pagination_link">
                                    </div>
                                </div>

                               </div> 
                            </div>
                        </div>
                </div>      
            </div>
        </div>

    </div>
<style>
    .nav{
        padding: 20px;  margin-top: 10px;    
    }
        
     .page-link {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #bdb093;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }
    .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #bdb093;
    border-color: #bdb093;
}
    .renderit
    {
        margin-top: 50px;
        padding: 200px;
        margin-bottom: 50px    
    }
    .loading
    {
        margin-left:40%;
        height: 100px;
    }
</style>

