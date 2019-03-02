@extends ('layouts.admin_app')
@section ('content')

    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <h3 class="mb-0">News (Asia)</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group text-right">
                            <a href="{{ route('news-asia.create') }}">
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
                                        <th>HOME ACTIVE<br><span class="text-danger">Maximum 2</span></th>
                                        <th>TITLE</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($news as $data)
                                        <tr>
                                            <td>
                                                <input type="checkbox"
                                                       id="home-active-{{ $data->id }}" {{ ($data->home_active) ? 'checked' : '' }}>
                                            </td>
                                            <td>{{ $data->news_header_en }}</td>
                                            <td>
                                                <a href="{{ route('news-asia.edit', ['id' => $data->id]) }}">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger"
                                                        id="btn-news-remove-{{ $data->id }}">
                                                    <i class="fa fa-trash"></i>
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                        @push('scripts')
                                            <script>
                                                $('#home-active-{{ $data->id }}').on('change', function () {
                                                    $.post('{{ route('api.set.home_active') }}', {
                                                        news_id: '{{ $data->id }}'
                                                    }).done(function (data) {
                                                        $('#home-active-{{ $data->id }}').prop('checked', data);
                                                    });
                                                });

                                                $('#btn-news-remove-{{ $data->id }}').on('click', function () {

                                                    swal("Confirm Delete?", "", {
                                                        buttons: {
                                                            cancel: "Cancel",
                                                            catch: {
                                                                text: "Delete",
                                                                value: "catch",
                                                            },
                                                            // defeat: true,
                                                        },
                                                    })
                                                        .then((value) => {
                                                            switch (value) {
                                                                case "catch":
                                                                    $.post('{{ route('news-asia.destroy', ['id' => $data->id]) }}', {
                                                                        _method: 'DELETE'
                                                                    }).done(function () {
                                                                        window.location.reload();
                                                                    });
                                                                    break;
                                                                default:
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
                            {{ $news->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
