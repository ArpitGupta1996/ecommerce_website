<!DOCTYPE html>
<html lang="zxx" class="no-js">

@include('layouts.header')

<body>

    <!-- Start Header Area -->
    @include('area.headerarea')
    <!-- End Header Area -->

    <!-- start banner Area -->
    @include('area.banner')
    <!-- End banner Area -->

    <!-- start features Area -->
    @include('area.feature')
    <!-- end features Area -->

    <!-- Start category Area -->
    @include('area.startcategoryarea', ['front_image' => $front_image])
    <!-- End category Area -->

    <!-- start product Area -->
   @include('area.startproductarea',['latest_products' => $latest_products])
    <!-- end product Area -->

    <!-- Start exclusive deal Area -->
    @include('area.exclusivearea')
    <!-- End exclusive deal Area -->

    <!-- Start brand Area -->
    @include('area.startbrandarea')
    <!-- End brand Area -->

    <!-- Start related-product Area -->
    @include('area.startrelatedproductarea')
    <!-- End related-product Area -->

    <!-- start footer Area -->
    @include('layouts.footer', ['data' => $data])
    <!-- End footer Area -->

   @include('layouts.script')
</body>

</html>
