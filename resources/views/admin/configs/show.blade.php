@extends('admin.layouts.app')
@section('title', 'Config')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                @if (session('massage'))
                    <div>{{ session('massage') }}</div>
                @endif
                <div class="">
                    <div class="x_title">
                        <h2>KeyTable example Config</h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <a type="button" href="{{ URL::route('configs.create') }}" class="btn btn-secondary">
                                Create Config
                            </a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <span class="text-muted font-13 m-b-30">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </span>
                                    <table id="datatable-keytable" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Key name</th>
                                                <th>Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($configs as $config)
                                                <tr>
                                                    <td>{{ $config->id }}</td>
                                                    <td>{{ $config->key_name }}</td>
                                                    <td>{{ $config->value }}</td>
                                                    <td>
                                                        <a class="dropdown-item"
                                                            href="{{ route('configs.edit', $config->id) }}"><i
                                                                class="fas fa-edit"></i> Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function confirmDelete(configId) {
        if (confirm('Are you sure you want to delete config with ID ' + configId + '?')) {
            $.ajax({
                url: '/admin/configs/' + configId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    }
</script>
