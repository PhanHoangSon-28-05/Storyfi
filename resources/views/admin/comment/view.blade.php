@extends('admin.layouts.app')
@section('title', 'Comment Story')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <form method="post" action="{{ route('list-stories-comment.update', $comments->id) }}" id="demo-form"
                data-parsley-validate enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-lg-4 mt-3 text-center">
                    <div class="book-info">
                        <div class="book-info-top text-dark">
                            <h3 name="name" class="text-center text-blod" id="bookName">{{ $stories->name }}</h3>
                        </div>
                    </div>
                    <div class="book-image ">
                        <img src="{{ url('storage/images/' . $stories->image) }}" alt=""
                            style="width: 210px; height: 315px;">
                    </div>
                </div>
                <div class="col-lg-8 mt-2">
                    <div class="book-info">
                        <h3 name="name" class="text-center text-blod" id="bookName">Comment</h3>
                        <div class="book-info-top text-dark">
                            <p class="author-name">
                                {!! $comments->content !!}
                            </p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Confirm</button>
                <!-- Modal -->
                <div class="modal fade" id="publishModal" tabindex="-1" aria-labelledby="publishModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="publishModalLabel">Xác nhận</h5>
                                <button type="button" id="closeButton" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có muốn xác nhận bình luận?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="draftButton">Để nhận xét thêm</button>
                                <button type="button" class="btn btn-primary" id="publishButton">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

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
            statusInput.value = "2"; // Đặt giá trị status = "1" khi nhấn "Xuất bản"
            form.appendChild(statusInput);
            form.submit(); // Gửi form đi sau khi thêm input status

            publishModal.hide();
        });
    });
    document.getElementById("closeButton").addEventListener("click", function() {
        var myModal = new bootstrap.Modal(document.getElementById("myModal"));
        myModal.hide();
    });
</script>
