@extends('admin.layouts.app')
@section('title', 'Edit Story')
<style>
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 300px;
        font-size: 20px;
        color: black;
    }

    .ck-content .image {
        /* block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Story</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('stories.update', $stories->id) }}" id="demo-form"
                                data-parsley-validate enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="name"
                                        style="font-weight: bold; font-size:15px;">Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <input class="form-control" type="text" data-validate-length-range="6"
                                            data-validate-words="2" value="{{ old('name') ?? $stories->name }}"
                                            name="name" id="name" placeholder="...." required="required" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="summary"
                                        style="font-weight: bold; font-size:15px;">Summary
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <textarea value="" id="editor" class="form-control" name="summary" rows="12" style="color: black;">{{ old('summary') ?? $stories->summary }}</textarea>
                                        @error('summary')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="method"
                                        style="font-weight: bold; font-size:15px;">Phương thức
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-10 col-sm-6" style="margin-top:6px">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-check form-check-inline">
                                                    <input name="method" class="form-check-input"
                                                        type="radio"value="0"
                                                        {{ $stories->method == '0' ? 'checked' : '' }}>
                                                    <label style="font-weight: bold; font-size:15px;"
                                                        class="form-check-label">Truyện
                                                        ngắn</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check form-check-inline">
                                                    <input name="method" class="form-check-input" type="radio"
                                                        value="1" {{ $stories->method == '1' ? 'checked' : '' }}
                                                        id="truyendai">
                                                    <label style="font-weight: bold; font-size:15px;"
                                                        class="form-check-label">Truyện dài chương
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @if ($stories->method == '1')
                                    <div class="field item form-group" id="content" style="display: none;">
                                    @else
                                        <div class="field item form-group" id="content" style="display: block;">
                                @endif
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="content"
                                        style="font-weight: bold; font-size:15px;">Content
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-9 col-sm-6">
                                        <textarea value="" id="editor1" class="form-control" name="content" style="color: black;">{{ old('content') ?? $stories->content }}</textarea>
                                        @error('content')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-sm-2 label-align" for="title"
                                style="font-weight: bold; font-size:15px;">Title
                                <span class="required" style="color: red;">*</span></label>
                            <div class="col-md-8 col-sm-6" style="margin-top:10px">
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach ($titles as $title)
                                            <div class="col-md-6">
                                                <div class="form-check form-check-inline">
                                                    <input name="title_id" class="form-check-input" type="radio"
                                                        value="{{ $title->id }}"
                                                        {{ $stories->title_id = $title->id ? 'checked' : '' }}
                                                        id="{{ $title->id }}">
                                                    <label style="font-weight: bold; font-size:15px;"
                                                        class="form-check-label"
                                                        for="{{ $title->id }}">{{ $title->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-sm-2 label-align" for="title"
                                style="font-weight: bold; font-size:15px;">Category
                                <span class="required" style="color: red;">*</span></label>
                            <div class="col-md-8 col-sm-6" style="margin-top:10px">
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach ($categories as $category)
                                            <div class="col-md-6">
                                                <div class="form-check form-check-inline">
                                                    <input name="categories_ids[]" class="form-check-input"
                                                        type="checkbox" value="{{ $category->id }}"
                                                        {{ $stories->categories->contains('name', $category->name) ? 'checked' : '' }}
                                                        id="{{ $category->id }}">
                                                    <label style="font-weight: bold; font-size:15px;"
                                                        class="form-check-label"
                                                        for="{{ $category->id }}">{{ $category->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br />
                        <button type="submit" class="btn btn-primary">ADD</button>
                        <!-- Modal -->
                        <div class="modal fade" id="publishModal" tabindex="-1" aria-labelledby="publishModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="publishModalLabel">Xác nhận</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có muốn truyện lưu nháp hay xuất bản?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="draftButton">Tiếp Tục Bản
                                            nháp</button>
                                        <button type="button" class="btn btn-primary" id="publishButton">Xuất
                                            bản</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        const phuongthucRadio1 = document.querySelector('input[value="1"]');
        const phuongthucRadio2 = document.querySelector('input[value="0"]');
        const contentDiv = document.getElementById('content');

        function showContent() {
            contentDiv.style.display = 'block';
        }

        function hideContent() {
            contentDiv.style.display = 'none';
        }

        phuongthucRadio1.addEventListener('click', hideContent);
        phuongthucRadio2.addEventListener('click', showContent);
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addButton = document.querySelector(".btn-primary");
            const publishModal = new bootstrap.Modal(document.getElementById("publishModal"));
            const draftButton = document.getElementById("draftButton");
            const publishButton = document.getElementById("publishButton");
            const form = document.getElementById("demo-form");

            // Xử lý khi nhấn nút "ADD"
            addButton.addEventListener("click", function(event) {
                event.preventDefault();
                publishModal.show();
            });

            // Xử lý khi nhấn nút "Bản nháp"
            draftButton.addEventListener("click", function() {
                const statusInput = document.createElement("input");
                statusInput.type = "hidden";
                statusInput.name = "status";
                statusInput.value = "0"; // Đặt giá trị status = "0" khi nhấn "Bản nháp"
                form.appendChild(statusInput);
                form.submit(); // Gửi form đi sau khi thêm input status

                publishModal.hide();
            });

            // Xử lý khi nhấn nút "Xuất bản"
            publishButton.addEventListener("click", function() {
                const statusInput = document.createElement("input");
                statusInput.type = "hidden";
                statusInput.name = "status";
                statusInput.value = "1"; // Đặt giá trị status = "1" khi nhấn "Xuất bản"
                form.appendChild(statusInput);
                form.submit(); // Gửi form đi sau khi thêm input status

                publishModal.hide();
            });
        });
    </script>
@endsection
@section('scripts')
    <!--                                                                                                          -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/super-build/ckeditor.js"></script>
    <!--                                                                                                             -->
    <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                    'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', 'autoformat', '|',
                    'link', 'autoImage', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock',
                    'htmlEmbed',
                    '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Story introduction',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                        '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                        '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                        '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents'
            ]
        });
    </script>
    <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor1"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                    'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', 'autoformat', '|',
                    'link', 'autoImage', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock',
                    'htmlEmbed',
                    '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Story introduction',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                        '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                        '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                        '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents'
            ]
        });
    </script>
@endsection
