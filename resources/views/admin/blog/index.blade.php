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
                        <h4 class="page-title">Categories</h4>
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

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                {{-- <h5 class="card-title">Basic Datatable</h5> --}}
                                <a href="{{ route('post.create') }}">
                                    <button type="submit" class="btn btn-secondary">Add Blog</button>
                                </a>

                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Name</th>
                                                <th>Content</th>
                                                <th>Image</th>
                                                <th>Action</th>

                                            </tr>

                                            @foreach ($blog as $blogs)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        {{ $blogs->title }}
                                                    </td>
                                                    <td>
                                                        {!! substr(strip_tags($blogs->body), 0, 50) !!}.....
                                                    </td>
                                                    <td>

                                                        <img src="{{ URL::to('images/blog/' . $blogs->image) }}"
                                                            alt="image" width="30%" height="30%">
                                                    </td>
                                                    {{-- <td>
                                                        <a href="{{ route('post.edit', $blogs->id) }}">
                                                            <i class="m-r-10 mdi mdi-account-edit"></i>
                                                        </a>

                                                        <form id="deleteForm"
                                                            action=""
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">
                                                                <i class="m-r-10 mdi mdi-delete"></i> Delete
                                                            </button>
                                                        </form>

                                                        <i class="m-r-10 mdi mdi-eye"></i>
                                                    </td> --}}

                                                    <td style="display: flex; align-items: center; gap: 10px;">
                                                        <a href="{{ route('post.edit', $blogs->id) }}">
                                                            <i class="m-r-10 mdi mdi-account-edit"></i>
                                                        </a>

                                                        <form id="deleteForm"
                                                            action="{{ route('post.destroy', $blogs->id) }}"
                                                            method="POST" style="margin: 0;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirmDelete();"
                                                                style="display: flex; align-items: center;">
                                                                <i class="m-r-10 mdi mdi-delete"></i> Delete
                                                            </button>
                                                        </form>

                                                        <i class="m-r-10 mdi mdi-eye"></i>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </thead>
                                        <tbody>



                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @include('admin.footer')

        </div>

    </div>

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
