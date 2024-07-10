<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('admin.header')

<style>
    .card-body {
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .form-group.row {
        margin-bottom: 15px;
    }

    .form-group.row label {
        font-weight: bold;
        font-size: 14px;
    }

    .form-group.row input.form-control {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px;
        font-size: 14px;
    }

    .form-group.row select.select2.form-control {
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 6px;
        font-size: 14px;
        background-color: #fff;
    }

    .form-group.row select.select2.form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }
</style>

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
                        <h4 class="page-title">Create Product</h4>

                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data"
                                action="{{ url('admin/products') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="name"
                                                placeholder="Enter Product Name Here" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-md-9">
                                            <select
                                                class="select2 form-control custom-select" name="category" style="width: 100%; height:36px;">
                                                <option>Select</option>
                                                @foreach ($category as $c)
                                                    <optgroup label="{{ $c->name }}">
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                    </optgroup>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname" name="price"
                                                placeholder="Enter Price Here" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Product
                                            Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname"
                                                name="product_code" placeholder="Enter Product Code" autocomplete="off"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="description"
                                                placeholder="Enter Description Here" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Width</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname" name="width"
                                                placeholder="Enter Width Here" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Height</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname" name="height"
                                                placeholder="Enter Height Here" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Depth</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname" name="depth"
                                                placeholder="Enter Depth Here" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Weight</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname" name="weight"
                                                placeholder="Enter Weight Here" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Quality
                                            Checking</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname"
                                                name="quality_checking" autocomplete="off" required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Quantiy</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname"
                                                name="quantity" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Color</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="color"
                                                autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname"
                                                name="discount" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
