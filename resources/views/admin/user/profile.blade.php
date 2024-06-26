<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('admin.header')

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.mainheader')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">User Profile</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body wizard-content">
                        {{-- <h4 class="card-title">Basic Form Example</h4> --}}
                        <h6 class="card-subtitle"></h6>
                        <form id="example-form" action="#" class="m-t-40">
                            <div>
                                {{-- <h3>Account</h3>
                                <section>
                                    <label for="userName">User name *</label>
                                    <input id="userName" name="userName" type="text" class="required form-control">
                                    <label for="password">Password *</label>
                                    <input id="password" name="password" type="text" class="required form-control">
                                    <label for="confirm">Confirm Password *</label>
                                    <input id="confirm" name="confirm" type="text" class="required form-control">
                                    <p>(*) Mandatory</p>
                                </section> --}}
                                <h3>Profile</h3>

                                <section>
                                    <label for="name">First name *</label>
                                    <input id="name" name="name" type="text" class="required form-control"
                                        value="{{ $data->name }}">
                                    <label for="surname">Mobile Number *</label>
                                    <input id="surname" name="number" type="number" class="required form-control"
                                        value="{{ $data->number }}">
                                    <label for="email">Email *</label>
                                    <input id="email" name="email" type="text"
                                        class="required email form-control" value="{{ $data->email }}">
                                    <label for="address">Address</label>
                                    <input id="address" name="address" type="text" class=" form-control"
                                        value="{{ $data->address }}">
                                    <label for="profile_photo">Profile Photo</label>
                                    <input type="file" name="image">
                                    <p>(*) Mandatory</p>
                                </section>


                            </div>
                        </form>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('admin.footer')

            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <!-- this page js -->

    <script src="{{ asset('admintheme/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admintheme/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admintheme/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('admintheme/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('admintheme/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admintheme/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('admintheme/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admintheme/dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('admintheme/assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('admintheme/assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>

    <script>
        // Basic Example with form
        var form = $("#example-form");
        // form.validate({
        //     errorPlacement: function errorPlacement(error, element) {
        //         element.before(error);
        //     },
        //     rules: {
        //         confirm: {
        //             equalTo: "#password"
        //         }
        //     }
        // });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                alert("Submitted!");
            }
        });
    </script>
</body>

</html>
