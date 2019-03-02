@extends('layouts.admin_app')
@section('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">
                @if(\Session::has('update_status'))
                    <div class="form-group">
                        <div class="alert alert-success" role="alert">
                            <strong>{{ txt_success() }}</strong>
                        </div>
                    </div>
                    @push ('scripts')
                        <script>
                            timeOutAlert('.alert');
                        </script>
                    @endpush
                @endif
            </div>
            <div class="col-12 col-sm-12">
                <div class="form-group">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">
                                        Database
                                        <i class="fa fa-angle-right"></i>
                                        <a href="{{ route('boats.index') }}">
                                            <span class="text-primary">
                                                boats
                                            </span>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group text-right manage-boat" style="display: none;">
                                <a href="{{ route('boats.create') }}">
                                    <button type="button" class="btn btn-success">
                                        <i class="fa fa-plus"></i>
                                        Create
                                    </button>
                                </a>
                            </div>

                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>MODEL</th>
                                            <th>TAG</th>
                                            <th>EDIT</th>
                                            <th class="manage-boat" style="display: none;">DELETE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($boats as $boat)
                                            <tr>
                                                <td>{{ $boat->id }}</td>
                                                <td>{{ $boat->model }}</td>
                                                <td>{{ $boat->tag }}</td>
                                                <td>
                                                    <a href="{{ route('boats.edit', ['boats' => $boat->id]) }}">
                                                        <button type="button" class="btn btn-info">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                </td>
                                                <td class="manage-boat" style="display: none;">
                                                    <button type="button" class="btn btn-danger"
                                                            id="btn-boat-remove-{{ $boat->id }}">
                                                        <i class="fa fa-trash"></i>
                                                        Remove
                                                    </button>
                                                </td>
                                            </tr>
                                            @push ('scripts')
                                                <script>
                                                    $('#btn-boat-remove-{{ $boat->id }}').on('click', function () {

                                                        swal({
                                                            title: "Are you sure?",
                                                            text: "",
                                                            icon: "warning",
                                                            buttons: true,
                                                            dangerMode: true,
                                                        })
                                                            .then((willDelete) => {
                                                                if (willDelete) {
                                                                    $.post('{{ route('boats.destroy', ['boats' => $boat->id]) }}', {
                                                                        _method: 'DELETE'
                                                                    }).done(function () {
                                                                        window.location.reload();
                                                                    });
                                                                }
                                                            });
                                                    });
                                                </script>
                                            @endpush
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group float-right">
                                {{ $boats->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
