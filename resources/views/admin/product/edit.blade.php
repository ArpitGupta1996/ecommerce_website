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

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data"
                                action="{{ route('products.update', $products->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="name"
                                                value="{{ $products->name }}" autocomplete="off" required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="category"
                                                value="{{ $products->category }}" autocomplete="off" required>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select" name="category"
                                                style="width: 100%; height:36px;">
                                                <option>Select</option>
                                                @foreach ($products->category as $c)
                                                    <optgroup label="{{ $c->id }}">
                                                        <option value="{{ $c->id }}">{{ $c->id }}</option>
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="form-group row">
                                        <label for="category"
                                            class="col-sm-3 text-right control-label col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-control custom-select" name="category[]"
                                                style="width: 100%; height:36px;">
                                                <option>Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $product->categories->contains($category->id) ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}


                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname" name="price"
                                                value="{{ $products->price }}" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Product
                                            Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname"
                                                name="product_code" value="{{ $products->product_code }}"
                                                autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="description"
                                                value="{{ $products->description }}" autocomplete="off" required>
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
                                                value="{{ $products->width }}" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Height</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname" name="height"
                                                value="{{ $products->height }}" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Depth</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname" name="depth"
                                                value="{{ $products->depth }}" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Weight</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname" name="weight"
                                                value="{{ $products->weight }}" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Quality
                                            Checking</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname"
                                                name="quality_checking" value="{{ $products->quality_checking }}"
                                                required>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Quantiy</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="fname"
                                                name="quantity" value="{{ $products->quantity }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Color</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="color"
                                                value="{{ $products->color }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-right control-label col-form-label">Discount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname"
                                                name="discount" value="{{ $products->discount }}" required>
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
