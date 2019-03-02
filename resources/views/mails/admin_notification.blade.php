@extends('beautymail::templates.widgets')

@section('content')

    @include('beautymail::templates.widgets.newfeatureStart')

    <h4 class="secondary"><strong>Dealer : <span
                    style="text-transform: uppercase">{{ $data['country_name'] }}</span></strong></h4>
    <p>{{ $data['message'] }}</p>
    <p>{{ $data['created_at'] }}</p>

    @include('beautymail::templates.widgets.newfeatureEnd')

@stop
