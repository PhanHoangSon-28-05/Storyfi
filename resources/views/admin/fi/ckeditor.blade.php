@extends('admin.layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="container">
            <div class="col-md-8">
                <h3>CKEDITOR Integration</h3>
                <textarea id="ckeditor"></textarea>
                <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
                <script>
                    window.onload = function() {
                        CKEDITOR.replace('ckeditor', {
                            filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                        });
                    }
                </script>

            </div>
        </div>
    </div>
@endsection
