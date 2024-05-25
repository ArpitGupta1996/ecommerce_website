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
                        <h4 class="page-title">Products</h4>
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
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                {{-- <h5 class="card-title">Basic Datatable</h5> --}}
                                <a href="{{ url('admin/products/create') }}">
                                    <button type="submit" class="btn btn-secondary">Add Products</button>
                                </a>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Product Code</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Width</th>
                                                <th>Height</th>
                                                <th>Depth</th>
                                                <th>Weight</th>
                                                <th>Quality Checking</th>
                                                <th>Quantity</th>
                                                <th>Color</th>
                                                <th>Discount</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $da)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $da->name }}</td>
                                                    <td>{{ $da->price }}</td>
                                                    <td>{{ $da->product_code }}</td>
                                                    <td>{{ $da->description }}</td>
                                                    <td>
                                                        <a href="{{ URL::to('products', $da->image) }}" download>
                                                            <img src="{{ URL::to('products', $da->image) }}"
                                                                alt="image" height="50px" width="50px">
                                                        </a>
                                                    </td>
                                                    <td>{{ $da->width }}</td>
                                                    <td>{{ $da->height }}</td>
                                                    <td>{{ $da->depth }}</td>
                                                    <td>{{ $da->weight }}</td>
                                                    <td>{{ $da->quality_checking }}</td>
                                                    <td>{{ $da->quantity }}</td>
                                                    <td>{{ $da->color }}</td>
                                                    <td>{{ $da->discount }}</td>
                                                    <td>

                                                        <div class="btn-group" role="group"
                                                            aria-label="Action buttons">
                                                            <a href="{{ route('products.edit', $da->id) }}"
                                                                class="btn btn-cyan btn-sm">Edit</a>

                                                            <form id="deleteForm"
                                                                action="{{ route('products.destroy', $da->id) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirmDelete();">
                                                                    <i class="m-r-10 mdi mdi-delete"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>

                                                        {{-- <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="{{ route('products.edit', $da->id) }}">
                                                                    <button type="button"
                                                                        class="btn btn-cyan btn-sm">Edit</button>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <form id="deleteForm"
                                                                    action="{{ route('products.destroy', $da->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"
                                                                        onclick="return confirmDelete();">
                                                                        <i class="m-r-10 mdi mdi-delete"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div> --}}

                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
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
    @include('admin.script')
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

    <script>
        function confirmDelete() {
            // Display a confirmation dialog
            var result = confirm("Are you sure you want to delete?");

            // If user confirms, allow the link to proceed with the deletion
            return result;
        }
    </script>

</body>

</html>
