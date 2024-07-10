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
                        <h4 class="page-title">Add Author Details Here</h4>
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
                <form action="{{ url('admin/aboutus') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('POST')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Text Editor</h4>

                                    <!-- Create the editor container -->
                                    <div id="editor" style="height: 300px;">

                                    </div>
                                    <input type="hidden" id="editorContent" name="editorContent">
                                    <br><br><br>


                                    <input type="submit" value="Submit" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            @include('admin.footer')

        </div>

    </div>

    @include('admin.script')

    <script>
        var form = document.querySelector('form');
        form.onsubmit = function() {
            var editorHtml = document.querySelector('#editor').innerHTML;
            document.querySelector('#editorContent').value = editorHtml;
        };
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('form');
            form.addEventListener('submit', function() {
                // Capture the title input value
                var titleValue = document.querySelector('#titleheader').value;
                document.querySelector('#title').value = titleValue;
                // Capture the Quill editor content
                var editorHtml = document.querySelector('#editor').innerHTML;
                document.querySelector('#editorContent').value = editorHtml;
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            var form = document.getElementById('editorForm');
            form.onsubmit = function() {
                var editorContent = quill.getText().trim();
                document.getElementById('editorContent').value = editorContent;
            };
        });
    </script>
</body>

</html>
