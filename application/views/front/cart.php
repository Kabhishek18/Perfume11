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
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-subtotal">Total</th>
                            <th class="pro-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                                       src="assets/img/products/product-1.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Light Blue</a></td>
                            <td class="pro-price"><span>$295.00</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" value="1"></div>
                            </td>
                            <td class="pro-subtotal"><span>$295.00</span></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                                       src="assets/img/products/product-2.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Jimmy Choo</a></td>
                            <td class="pro-price"><span>$275.00</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" value="2"></div>
                            </td>
                            <td class="pro-subtotal"><span>$550.00</span></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                                       src="assets/img/products/product-3.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Bright Crystal</a></td>
                            <td class="pro-price"><span>$295.00</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1"/>
                                </div>
                            </td>
                            <td class="pro-subtotal"><span>$295.00</span></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                                       src="assets/img/products/product-4.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Versace Eros </a></td>
                            <td class="pro-price"><span>$110.00</span></td>
                            <td class="pro-quantity">
                                <div class="pro-qty">
                                    <input type="text" value="3"/>
                                </div>
                            </td>
                            <td class="pro-subtotal"><span>$110.00</span></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-md-flex justify-content-between">
                    <div class="apply-coupon-wrapper">
                        <form action="#" method="post" class=" d-block d-md-flex">
                            <input type="text" placeholder="Enter Your Coupon Code" required/>
                            <button class="btn btn-brand">Apply Coupon</button>
                        </form>
                    </div>
                    <div class="cart-update">
                        <a href="#" class="btn btn-brand">Update Cart</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>$230</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>$70</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">$300</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="checkout.html" class="btn btn-brand d-block">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Cart Page Wrapper ==-->