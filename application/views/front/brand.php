
<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1><?=(!empty($brandname)?urldecode($brandname):'ALL Brand')?></h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="<?=base_url()?>Brand" class="current">Brand</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>

<style type="text/css">
    .top-bar{
        border-top: 4px solid #bdb093;
        padding-top:10px;
        padding-bottom:10px;
        text-align: center;
    }
    .box 
    {
        background: white;
        border: 2px solid #bdb093;
        box-shadow: 1px 2px 3px solid #bdb093;
    }

    .boxed{

        border:1px solid #bdb093;
        padding: 5px;
    }
    .boxed:hover{
        background: #bdb093;
        color: white;
    }
    .text-default{
        color: #343a40;
        font-size: 15px;
    }
    .text-default:hover{
       color: #212529;
        outline: none;
        text-decoration: none;
    }
    .pb-50{
        padding-bottom: 50;
    }
</style>
    <div id="shop-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row"> 
           <div class="col-md-3 top-bar">
                <h2>All Brands By Letter</h2>
                 
                <div class="row box">
                    <div class="col-md-3 boxed ">
                      <span> <a class="btn" id="alphabetical-All" data-id="All">#</a></span>
                 </div> 
                    <?php $range  =range('A','Z');
                foreach($range as $item){?>
               
                 <div class="col-md-3 boxed ">
                      <span> <a class="btn" id="alphabetical-<?=$item?>" data-id="<?=$item?>"><?=$item?></a></span>
                 </div>
            <?php } ?>
                </div>
           </div>
           <div class="col-md-9">
                <div class="container">
                    <div class="text-title pb-50" style="padding: 13px;">
                          <h2>Perfume & Cologne > <span id="alphabet">All</span> </h2>
                    </div>
                </div>
               <div class="row editview">
                            
                        <?php 
                        $bodybrand = $this->home_model->GetAllProductLimit(0,'BrandName');sort($bodybrand );  ?> 

                        <?php foreach($bodybrand as $items){?>
                            <div class="col-md-3 hideview">
                            <div class= "card">
                                <div class="card-body">
                                   <h3> 
                                    <a class="text-default" href="<?=base_url()?>Search/<?=(urlencode($items['BrandName']))?>"><?=$items['BrandName']?></a>
                                    </h3>
                                </div>
                            </div>
                            </div>
                        <?php }?>
                        <div >
                        </div>
               </div>
           </div>
                 
        </div>
    </div>    
<div>    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    var base_url = '<?=base_url()?>';
    $(document).ready(function(){
        $('[id^="alphabetical-"]').on('click', function postinput(){
            var id = $(this).attr("data-id"); // this.value   
            $('#alphabet').text(id);
            $.ajax({ 
                url: base_url+'shop/PaginationAjax',
                data: { id: id },
                type: 'post'
            }).done(function(responseData) {
                onSuccess(responseData);
            }).fail(function() {
                console.log('Failed');
            });
        });
    }); 

function onSuccess(data) {
  let html = "";
  $('.hideview').hide();
  if(JSON.parse(data)){
      $.each(JSON.parse(data), function(key, value){
         html += `<div class="col-md-3 ">
                            <div class= "card">
                                <div class="card-body">
                                   <h3> 
                                    <a class="text-default" href="Search/${encodeURI(value)}">${value}</a>
                                    </h3>
                                </div>
                            </div>
                            </div>`
      });
    }
  else{
        html +=`<span class="text-danger"> No Data Found</span>`;
  }
  $('.editview').html(html);
}
</script>