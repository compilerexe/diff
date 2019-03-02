@extends ('layouts.new_design.manage.app')
@section ('content')

    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0 text-center">
                        <h1>News</h1>
                        <h2>
                            Country : {{ $dealer->country_name }}
                            &ensp;
                            <img src="{{ $dealer->country->icon }}" alt="" style="width: 32px; height: 32px;">
                        </h2>
                    </div>
                    <div class="card-body">

                        <div class="form-group text-right">
                            <a href="{{ route('manage.dealer.news.create') }}">
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
                                        <th>CREATE STATUS</th>
                                        <th>UPDATE REQUEST</th>
                                        <th>DELETE REQUEST</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($news as $data)
                                        <tr class="{{ ($data->delete_approve == 2) ? 'bg-warning text-white' : '' }}">
                                            <td>
                                                <input type="checkbox"
                                                       id="home-active-{{ $data->id }}" {{ ($data->home_active) ? 'checked' : '' }}>
                                            </td>
                                            <td>{{ $data->country->lang_switch === 1 ? $data->news_header_local : $data->news_header_en }}</td>
                                            <td>
                                                @if ($data->create_approve == 0)
                                                    <button type="button" class="btn btn-success"
                                                            id="btn-news-create-approve-{{ $data->id }}">
                                                        Approve
                                                    </button>
                                                @else
                                                    @if ($data->update_approve > 0)
                                                        -
                                                    @else
                                                        @if ($data->delete_approve == 1)
                                                            -
                                                        @else
                                                            <i class="fa fa-check text-success"></i>
                                                        @endif
                                                    @endif
                                                    {{--<span class="text-success">Approve</span>--}}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->create_approve == 0)
                                                    {{--<span class="text-danger">Waiting for approval</span>--}}
                                                    <span>-</span>
                                                @else
                                                    @if ($data->update_approve < $data->update_count)
                                                        <button type="button" class="btn btn-success"
                                                                id="btn-news-update-approve-{{ $data->id }}" {{ ($data->delete_approve == 2) ? 'disabled' : '' }}>
                                                            Approve
                                                        </button>
                                                    @else
                                                        @if ($data->update_approve > 0)
                                                            @if ($data->delete_approve == 1)
                                                                -
                                                            @else
                                                                <i class="fa fa-check text-success"></i>
                                                            @endif
                                                        @else
                                                            -
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->create_approve == 0)
                                                    {{--<span class="text-danger">Waiting for approval</span>--}}
                                                    <span>-</span>
                                                @else
                                                    @if ($data->delete_approve == 1)
                                                        <button type="button" class="btn btn-success"
                                                                id="btn-news-remove-approve-{{ $data->id }}" {{ ($data->delete_approve == 2) ? 'disabled' : '' }}>
                                                            Approve
                                                        </button>
                                                    @else
                                                        -
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->delete_approve == 2)
                                                    <button type="button" class="btn btn-info" disabled>
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </button>
                                                @else
                                                    <a href="{{ route('manage.dealer.news.edit', ['id' => $data->id]) }}">
                                                        <button type="button" class="btn btn-info">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->delete_approve == 2)
                                                    <button type="button" class="btn btn-danger" disabled>
                                                        <i class="fa fa-trash"></i>
                                                        Remove
                                                    </button>
                                                @else
                                                    <button type="button" class="btn btn-danger"
                                                            id="btn-news-remove-{{ $data->id }}">
                                                        <i class="fa fa-trash"></i>
                                                        Remove
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @push('scripts')
                                            <script>

                                                $('#btn-news-create-approve-{{ $data->id }}').on('click', function () {
                                                    $.post('{{ route('manage.dealer.news.request.create', ['id' => $data->id]) }}',
                                                        function () {
                                                            window.location.reload();
                                                        });
                                                });

                                                $('#btn-news-update-approve-{{ $data->id }}').on('click', function () {
                                                    $.post('{{ route('manage.dealer.news.request.update', ['id' => $data->id]) }}',
                                                        function () {
                                                            window.location.reload();
                                                        });
                                                });

                                                $('#btn-news-remove-approve-{{ $data->id }}').on('click', function () {
                                                    $.post('{{ route('manage.dealer.news.request.remove', ['id' => $data->id]) }}',
                                                        function () {
                                                            window.location.reload();
                                                        });
                                                });

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
                                                                    $.post('{{ route('manage.dealer.news.destroy', ['id' => $data->id]) }}', {
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
