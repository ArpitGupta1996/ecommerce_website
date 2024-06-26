<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Deals of the Week</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @php
                        $products = [
                            ['img' => 'r1.jpg', 'title' => 'Black lace Heels', 'price' => 189.0, 'old_price' => 210.0],
                            ['img' => 'r2.jpg', 'title' => 'Black lace Heels', 'price' => 189.0, 'old_price' => 210.0],
                            ['img' => 'r3.jpg', 'title' => 'Black lace Heels', 'price' => 189.0, 'old_price' => 210.0],
                            ['img' => 'r5.jpg', 'title' => 'Black lace Heels', 'price' => 189.0, 'old_price' => 210.0],
                            ['img' => 'r6.jpg', 'title' => 'Black lace Heels', 'price' => 189.0, 'old_price' => 210.0],
                            ['img' => 'r7.jpg', 'title' => 'Black lace Heels', 'price' => 189.0, 'old_price' => 210.0],
                            ['img' => 'r9.jpg', 'title' => 'Black lace Heels', 'price' => 189.0, 'old_price' => 210.0],
                            ['img' => 'r10.jpg', 'title' => 'Black lace Heels', 'price' => 189.0, 'old_price' => 210.0],
                            ['img' => 'r11.jpg', 'title' => 'Black lace Heels', 'price' => 189.0, 'old_price' => 210.0],
                        ];
                    @endphp

                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('theme/img/' . $product['img']) }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">{{ $product['title'] }}</a>
                                    <div class="price">
                                        <h6>${{ number_format($product['price'], 2) }}</h6>
                                        <h6 class="l-through">${{ number_format($product['old_price'], 2) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="{{ asset('theme/img/r1.jpg') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="{{ asset('theme/img/r2.jpg') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="{{ asset('theme/img/r3.jpg') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="{{ asset('theme/img/r5.jpg') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="{{ asset('theme/img/r6.jpg') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="{{ asset('theme/img/r7.jpg') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="{{ asset('theme/img/r9.jpg') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="{{ asset('theme/img/r10.jpg') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-related-product d-flex">
                            <a href="#"><img src="{{ asset('theme/img/r11.jpg') }}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">Black lace Heels</a>
                                <div class="price">
                                    <h6>$189.00</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="{{ asset('theme/img/category/c5.jpg') }}"
                            alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
