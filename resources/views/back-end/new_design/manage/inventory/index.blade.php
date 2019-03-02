@extends ('layouts.new_design.manage.app')
@section ('content')

    <div class="init-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0 text-center">
                        <h1>Inventory</h1>
                        <h2>
                            Country : {{ $dealer->country_name }}
                            &ensp;
                            <img src="{{ $dealer->country->icon }}" alt="" style="width: 32px; height: 32px;">
                        </h2>
                    </div>
                    <div class="card-body">

                        <div class="form-group text-right">
                            <a href="{{ route('manage.dealer.inventory.create') }}">
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
                                        <th>BOAT MODEL</th>
                                        <th>TYPE</th>
                                        <th>YEAR</th>
                                        <th>PRICE</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($inventories as $inventory)
                                        <tr>
                                            <td>
                                                {{ $inventory->boat->model }}
                                            </td>
                                            <td>
                                                @if ($inventory->used == 0)
                                                    New
                                                @else
                                                    Used
                                                @endif
                                            </td>
                                            <td>{{ $inventory->year }}</td>
                                            <td>{{ $inventory->price }}</td>
                                            <td>
                                                <a href="{{ route('manage.dealer.inventory.edit', ['id' => $inventory->id]) }}">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger"
                                                        id="btn-inventory-remove-{{ $inventory->id }}">
                                                    <i class="fa fa-trash"></i>
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                        @push('scripts')
                                            <script>
                                                $('#btn-inventory-remove-{{ $inventory->id }}').on('click', function () {

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
                                                                    $.post('{{ route('manage.dealer.inventory.destroy', ['id' => $inventory->id]) }}', {
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
                            {{ $inventories->links() }}
                        </div>

                        {{--<div class="row">--}}
                        {{--<div class="col-12 col-sm-2">--}}
                        {{--<div class="form-group" style="padding-top: 10px;">--}}
                        {{--<label for="boat-model" class="">Boat Model</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-sm-7">--}}
                        {{--<div class="form-group">--}}
                        {{--<select name="boat_model" id="boat-model" class="form-control">--}}
                        {{--@foreach ($boats as $boat)--}}
                        {{--<option value="{{ $boat->id }}">{{ $boat->model }}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-sm-3">--}}
                        {{--<div class="form-group text-right">--}}
                        {{--<a href="" id="inventory-boat-model">--}}
                        {{--<button type="button" class="btn btn-success" style="width: 100%;">--}}
                        {{--<i class="fa fa-info-circle"></i>--}}
                        {{--Learn more--}}
                        {{--</button>--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push ('scripts')
        <script>
            function inventoryBoatModel(el) {
                let selected = el.find(':selected').val();

                $('#inventory-boat-model').attr('href', `/dealer/inventory/${selected}/edit`);
            }

            let boatModel = $('#boat-model');
            boatModel.on('change', function () {
                inventoryBoatModel($(this));
            });

            inventoryBoatModel(boatModel);
        </script>
    @endpush

@endsection
