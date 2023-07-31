@extends('admin.layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="container">
            <div class="col-md-8">
                <h3>TinyMCE Integration</h3>
                <textarea name="" id="editor" cols="30" rows="10"></textarea>

                <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                <script>
                    window.onload = function() {

                        tinymce.init({
                            selector: '#editor',
                            theme: "silver",
                            height: 200,
                            plugins: 'image',
                            toolbar: 'bold italic underline forecolor | image',
                            color_cols: "3",
                            color_map: [
                                "993366",
                                "Red violet",
                                "FFFFFF",
                                "White",
                                "FF99CC",
                                "Pink",
                                "FFCC99",
                                "Peach",
                                "FFFF99",
                                "Light yellow",
                                "CCFFCC",
                                "Pale green",
                                "CCFFFF",
                                "Pale cyan",
                                "99CCFF",
                                "Light sky blue",
                                "CC99FF",
                                "Plum",
                            ],
                            branding: false,
                            file_picker_callback: filemanager.tinyMceCallback
                        });

                    };
                </script>
            </div>
        </div>
    </div>
@endsection
