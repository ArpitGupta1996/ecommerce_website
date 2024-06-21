<!DOCTYPE html>
<html lang="zxx" class="no-js">

@include('layouts.header')


<body>

    <!-- Start Header Area -->
    @include('area.headerarea')
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @auth
                                @foreach ($cart->items as $item)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ URL::to('products' . '/' . $item->product->image) }}"
                                                        alt="" height="100" width="100">
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $item->product->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{-- <h5>{{ $item->price }}</h5> --}}
                                            <h5 class="item-price" data-price="{{ $item->price }}">Rs. {{ $item->price }}
                                            </h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input type="number" name="qty" id="sst" maxlength="12"
                                                    min="1" value="1" title="Quantity:" class="input-text qty"
                                                    data-price="{{ $item->price }}">

                                                {{-- <button
                                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst >= 1 ) result.value++;return false;"
                                                    class="increase items-count" type="button"><i
                                                        class="lnr lnr-chevron-up"></i></button>
                                                <button
                                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
                                                    class="reduced items-count" type="button"><i
                                                        class="lnr lnr-chevron-down"></i></button> --}}


                                                <button onclick="increaseQty();" class="increase items-count"
                                                    type="button"><i class="lnr lnr-chevron-up"></i></button>
                                                <button onclick="decreaseQty();" class="reduced items-count"
                                                    type="button"><i class="lnr lnr-chevron-down"></i></button>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="total-price">Rs.{{ $item->price }}</h5>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        <p>Please <a href="{{ route('login') }}">login</a> to view your cart items.</p>
                                    </td>
                                </tr>
                            @endauth



                            <tr class="bottom_button">
                                {{-- <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td> --}}
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5 class="total-price">Rs.{{ $item->price }}</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li><a href="#">Flat Rate: $5.00</a></li>
                                            <li><a href="#">Free Shipping</a></li>
                                            <li><a href="#">Flat Rate: $10.00</a></li>
                                            <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                        </ul>
                                        <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        </h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode">
                                        <a class="gray_btn" href="#">Update Details</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="{{ route('shopcategory') }}">Continue Shopping</a>
                                        <a class="primary-btn" href="#">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    @include('layouts.footer')

    <!-- End footer Area -->

    @include('layouts.script')

    <script>
        function updatePrice_old() {
            // var qty = document.getElementById('sst').value;
            // var pricePerItem = document.querySelector('.item-price').getAttribute('data-price');
            // var totalPrice = qty * pricePerItem;
            // document.querySelector('.total-price').innerText = 'Rs.' + totalPrice;

            var result = document.getElementById('sst');
            var qty = result ? result.value : 0;
            var itemPriceElement = document.querySelector('.item-price');
            var pricePerItem = itemPriceElement ? itemPriceElement.getAttribute('data-price') : 0;
            var totalPriceElement = document.querySelector('.total-price');
            var totalPrice = qty * pricePerItem;

            if (totalPriceElement) {
                totalPriceElement.innerText = 'Rs.' + totalPrice;
            } else {
                console.error('Total price element not found');
            }
        }

        function increaseQty_old() {
            // var result = document.getElementById('sst');
            // var sst = result.value;
            // if (!isNaN(sst) && sst >= 1) {
            //     result.value++;
            //     updatePrice();
            // }
            // return false;

            var result = document.getElementById('sst');
            var sst = result ? result.value : 0;
            if (!isNaN(sst) && sst >= 1) {
                result.value++;
                updatePrice();
            }
            return false;
        }

        function decreaseQty_old() {
            // var result = document.getElementById('sst');
            // var sst = result.value;
            // if (!isNaN(sst) && sst > 1) {
            //     result.value--;
            //     updatePrice();
            // }
            // return false;

            var result = document.getElementById('sst');
            var sst = result ? result.value : 0;
            if (!isNaN(sst) && sst > 1) {
                result.value--;
                updatePrice();
            }
            return false;
        }

        // document.getElementById('sst').addEventListener('change', updatePrice);
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updatePrice() {
                var result = document.getElementById('sst');
                if (result) {
                    var qty = result.value;
                    var itemPriceElement = document.querySelector('.item-price');
                    var totalPriceElements = document.querySelectorAll('.total-price');

                    if (itemPriceElement && totalPriceElements.length > 0) {
                        var pricePerItem = itemPriceElement.getAttribute('data-price');
                        var totalPrice = qty * pricePerItem;
                        totalPriceElements.forEach(function(element) {
                            element.innerText = 'Rs.' + totalPrice;
                        });
                    } else {
                        console.error('Item price or total price elements not found');
                    }
                } else {
                    console.error('Quantity input element not found');
                }
            }

            window.increaseQty = function() {
                var result = document.getElementById('sst');
                if (result) {
                    var sst = result.value;
                    if (!isNaN(sst) && sst >= 1) {
                        result.value++;
                        updatePrice();
                    }
                } else {
                    console.error('Quantity input element not found');
                }
                return false;
            }

            window.decreaseQty = function() {
                var result = document.getElementById('sst');
                if (result) {
                    var sst = result.value;
                    if (!isNaN(sst) && sst > 1) {
                        result.value--;
                        updatePrice();
                    }
                } else {
                    console.error('Quantity input element not found');
                }
                return false;
            }

            document.getElementById('sst').addEventListener('change', updatePrice);
        });
    </script>

</body>

</html>
