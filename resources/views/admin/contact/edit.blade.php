{{-- <?php
dd($datas);
?> --}}


<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('admin.header')

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">

        @include('admin.mainheader')

        @include('admin.sidebar')

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Create Contact Details for Website</h4>

                    </div>
                </div>
            </div>

            @if (session('message'))
                <div class="alert alert-success mt-3">
                    {{ session('message') }}
                </div>
            @endif
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data"
                                action="{{ route('contactadmin.update', $datas['0']['id']) }}">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="card-body">
                                    <h4 class="card-title">Address</h4>
                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">State Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="address"
                                                value="{{ $datas['0']['address'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname"
                                            class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $datas['0']['email'] }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname"
                                            class="col-sm-3 text-right control-label col-form-label">Number</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="number"
                                                value="{{ $datas['0']['number'] }}">
                                        </div>
                                    </div>


                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

            @include('admin.footer')

        </div>

    </div>

    @include('admin.script')
</body>

</html>
