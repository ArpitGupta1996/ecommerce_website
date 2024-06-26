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
                        <h4 class="page-title">Role</h4>
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
        </div>
    </div>

    @can('role-create')
        <a class="btn btn-success" href="{{ route('role.create') }}"> Create New Role</a>
    @endcan

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($role as $key => $role)
            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $role->name }}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('role.show', $role->id) }}">Show</a>

                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('role.edit', $role->id) }}">Edit</a>
                    @endcan

                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['role.destroy', $role->id], 'style' => 'display:inline']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}
                    @endcan

                </td>

            </tr>
        @endforeach

    </table>



    {{-- {!! $role->render() !!} --}}

