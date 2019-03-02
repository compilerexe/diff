@extends ('layouts.new_design.dealer.app')
@section ('content')

    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0 text-center">
                        <h1>News</h1>
                        <h2>
                            Country : {{ dealerCountry()->country_name }}
                            &ensp;
                            <img src="{{ dealerCountry()->icon }}" alt="" style="width: 32px; height: 32px;">
                        </h2>
                    </div>
                    <div class="card-body">

                        <div class="form-group text-right">
                            <a href="{{ route('dealer.news.create') }}">
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
                                        <th>UPDATE STATUS</th>
                                        <th>DELETE STATUS</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($news as $data)
                                        <tr>
                                            <td>
                                                <input type="checkbox"
                                                       id="home-active-{{ $data->id }}" {{ ($data->home_active) ? 'checked' : '' }} {{ ($data->create_approve == 0) ? 'disabled' : '' }}>
                                            </td>
                                            <td>{{ $data->country->lang_switch === 1 ? $data->news_header_local : $data->news_header_en }}</td>
                                            <td>
                                                @if ($data->update_count == 0 && $data->create_approve == 0)
                                                    <span class="text-danger">Waiting for admin approval</span>
                                                @elseif ($data->update_count == 0 && $data->create_approve == 1)
                                                    @if ($data->delete_approve == 1)
                                                        -
                                                    @else
                                                        <span class="text-success">Approved</span>
                                                    @endif
                                                @else
                                                    @if ($data->update_count > $data->update_approve)
                                                        <span class="text-danger">Waiting for admin approval</span>
                                                    @else
                                                        @if ($data->delete_approve == 1)
                                                            -
                                                        @else
                                                            <span class="text-success">Approved</span>
                                                        @endif
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->delete_approve == 0 && $data->create_approve == 0)
                                                    <span>-</span>
                                                @elseif ($data->delete_approve == 0 && $data->create_approve == 1)
                                                    <span>-</span>
                                                @elseif ($data->delete_approve == 1)
                                                    <span class="text-danger">Waiting for admin approval</span>
                                                @else
                                                    <span class="text-success">Approved</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('dealer.news.edit', ['id' => $data->id]) }}">
                                                    {{--<button type="button"--}}
                                                    {{--class="btn btn-info" {{ ($data->delete_approve == 2 || $data->create_approve == 0) ? 'disabled' : '' }}>--}}
                                                    {{--<i class="fa fa-edit"></i>--}}
                                                    {{--Edit--}}
                                                    {{--</button>--}}
                                                    <button type="button"
                                                            class="btn btn-info">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                {{--<button type="button" class="btn btn-danger"--}}
                                                {{--id="btn-news-remove-{{ $data->id }}" {{ ($data->delete_approve == 2 || $data->create_approve == 0) ? 'disabled' : '' }}>--}}
                                                {{--<i class="fa fa-trash"></i>--}}
                                                {{--Remove--}}
                                                {{--</button>--}}
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
                                                                    $.post('{{ route('dealer.news.destroy', ['id' => $data->id]) }}', {
                                                                        _method: 'DELETE'
                                                                    }).done(function (data) {
                                                                        if (data === 'deleted') {
                                                                            swal('Deleted success.', '', {
                                                                                icon: "success",
                                                                                buttons: {
                                                                                    catch: {
                                                                                        text: 'OK',
                                                                                        value: 'catch',
                                                                                    }
                                                                                }
                                                                            }).then((value) => {
                                                                                switch (value) {
                                                                                    case "catch":
                                                                                        window.location.reload();
                                                                                        break;
                                                                                }
                                                                            })
                                                                        } else {
                                                                            swal('Please wait for admin to approve.', '', {
                                                                                icon: "success",
                                                                                buttons: {
                                                                                    catch: {
                                                                                        text: 'OK',
                                                                                        value: 'catch',
                                                                                    }
                                                                                }
                                                                            }).then((value) => {
                                                                                switch (value) {
                                                                                    case "catch":
                                                                                        window.location.reload();
                                                                                        break;
                                                                                }
                                                                            })
                                                                        }
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
