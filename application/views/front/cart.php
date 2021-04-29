<!--== Start Page Header ==-->
<div id="page-header-wrapper">
    <div class="container">
        <div class="row">
            <!-- Page Title Area Start -->
            <div class="col-6">
                <div class="page-title-wrap">
                    <h1>Shopping Cart</h1>
                </div>
            </div>
            <!-- Page Title Area End -->

            <!-- Page Breadcrumb Start -->
            <div class="col-6 m-auto">
                <nav class="page-breadcrumb-wrap">
                    <ul class="nav justify-content-end">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="javascript:void(0)" class="current">Cart</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Breadcrumb End -->
        </div>
    </div>
</div>
<!--== End Page Header ==-->

<!--== Start Cart Page Wrapper ==-->
<div id="cart-page-wrapper" class="page-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Thumbnail</th>
                            <th class="pro-title">Product </th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-subtotal">Total</th>
                            <th class="pro-remove">Update / Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($this->cart->contents() as $item){?>    
                            <tr>
                                <td class="pro-thumbnail">
                                    <a href="#"><img class="img-fluid" src="<?=$item['image']?>" alt="Product"/></a>
                                </td>
                                <td class="pro-title">
                                    <a href="#"><?=$item['name']?> </a>
                                </td>
                                <td class="pro-price">
                                    <span>$ <?=$item['price']?></span>
                                </td>
                                <td class="pro-quantity">
                                    <form method="post" action="<?=base_url()?>Cart/Update" id="cart-update-<?=$item['id']?>">
                                         <input type="hidden"  name ="rowid" value="<?=$item['rowid']?>">
                                        <div class="pro-qty">
                                            <input type="text" name="qty" value="<?=$item['qty']?>">
                                           
                                        </div>
                                    </form>
                                </td>
                                <td class="pro-subtotal">
                                    <span>$ <?=($item['qty']*$item['price'])?></span>
                                </td>
                                <td class="pro-remove">
                                    <a href="javascript:void(0)" onclick="document.getElementById('cart-update-<?=$item['id']?>').submit();"><i class="fa fa-recycle"></i></a>
                                    <a href="<?=base_url()?>Cart/Remove/<?=$item['rowid']?>"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                </div>

                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-md-flex justify-content-between">
                    <div class="apply-coupon-wrapper">
                        <form action="<?=base_url()?>Shop/ApplyCoupon" method="post" class=" d-block d-md-flex">
                            <input type="text" name="coupon" placeholder="Enter Your Coupon Code" required/>
                            <button type="submit" class="btn btn-brand">Apply Coupon</button>
                        </form>
                    </div>
                    <div class="cart-update">
                        <a href="<?=base_url()?>Cart/Destroy"  class="btn btn-brand">Clear Cart</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                 <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <div class="form-group">
                            <a class="btn btn-brand" href="<?=$_SERVER['HTTP_REFERER']?>">Continue Shopping</a>
                        </div>
                    </div>
                 </div>   
            </div>
            <div class="col-lg-5 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <?php $total = $this->cart->total();?>
                                    <td>$<?=$total?></td>
                                </tr>
                                <?php if(!empty($this->session->coupon)){ $coupon= $this->session->coupon; ?>
                                    <tr>
                                        <td>Coupon Applied <span class="text-success"><?=$coupon['CouponName']?></span></td>
                                        <td> <span class="text-danger">- </span> $
                                            <?php if($coupon['CouponType']=='Percentage'){
                                                $coupon['CouponValue'] = ($coupon['CouponValue']*$this->cart->total())/100 ;
                                                ?>

                                                 <?=(($coupon['CouponValue']*$this->cart->total())/100)?>
                                            <?php }else{?>
                                                  <?=$coupon['CouponValue']?>  
                                            <?php }?> 

                                            <a href="<?=base_url()?>Shop/Coupondestroy" class="text-danger"><i class="fa fa-trash-o"></i></a>   
                                        </td>
                                    </tr>
                                     <?php $total = $this->cart->total() - $coupon['CouponValue'] ?>
                                <?php }?>    

                               <tr>
                                   <td>Shipping Charge</td>
                                   <td>$ <?=(!empty($ship)?$ship:"Free Shipping")?></td>
                               </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">$<?=($total+$ship)?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="<?=base_url()?>Checkout" class="btn btn-brand d-block">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Cart Page Wrapper ==-->

<script src="<?=base_url()?>resources/assets/js/vendor/jquery-3.3.1.min.js"></script>