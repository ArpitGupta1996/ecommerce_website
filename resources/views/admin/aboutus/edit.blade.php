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
                        <h4 class="page-title">Edit Details</h4>
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
                <form action="{{ route('aboutus.update', $post_edit->id) }}" method="post"
                    enctype="multipart/form-data" id="editorForm">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Editor</h4>
                                    <div id="editor" style="height: 300px;"></div>
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
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link', 'image']
                    ]
                }
            });

            // Set the initial content of the editor
            var initialContent = {!! json_encode($post_edit->body) !!};
            quill.clipboard.dangerouslyPasteHTML(initialContent);

            var form = document.getElementById('editorForm');
            form.onsubmit = function() {
                var editorContent = quill.root.innerHTML.trim();
                document.getElementById('editorContent').value = editorContent;
            };
        });
    </script>


</body>

</html>
