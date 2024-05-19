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
                        <h4 class="page-title">Edit Category</h4>

                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data"
                                action="{{ route('category.store') }}">
                                @csrf
                                <div class="card-body">
                                    <h4 class="card-title">Category</h4>
                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname"
                                                name="{{$data}}" value="{{$data}}">
                                        </div>
                                    </div>


                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
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
