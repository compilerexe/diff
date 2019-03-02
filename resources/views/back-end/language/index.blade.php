@extends('layouts.admin_app')
@section('content')
    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Languages</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group text-right manage-language" style="display: none;">
                            <a href="{{ route('language.create') }}">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-plus"></i>
                                    Create
                                </button>
                            </a>
                        </div>
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Country</th>
                                        <th>Display</th>
                                        <th>Icon</th>
                                        <th>Edit</th>
                                        <th class="manage-language" style="display: none;">Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($countries as $country)
                                        <tr>
                                            <td>
                                                {{$country->country_name}}
                                            </td>
                                            <td>
                                                {{ $country->display }}
                                            </td>
                                            <td>
                                                <img src="{{ $country->icon }}" alt="" class="img-fluid"
                                                     style="width: 30px; height: 30px;">
                                            </td>
                                            <td>
                                                <a href="{{ route('language.edit', ['language' => $country->id]) }}">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </button>
                                                </a>
                                            </td>
                                            <td class="manage-language" style="display: none;">
                                                <button type="button" class="btn btn-danger btn-remove"
                                                        data-id="{{ $country->id }}">
                                                    <i class="fa fa-trash"></i>
                                                    Remove
                                                </button>
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

    @push('scripts')
        <script>
            $('.btn-remove').on('click', function () {
                swal({
                    title: "Are you sure?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            let dataId = $(this).attr('data-id');
                            $.post('{{ url('/manage/language') }}/' + dataId,
                                {
                                    _method: 'DELETE'
                                }
                            ).done(function () {
                                window.location.reload();
                            });
                        }
                    });
            });
        </script>
    @endpush
@endsection
