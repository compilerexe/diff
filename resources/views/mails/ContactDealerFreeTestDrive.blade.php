@extends('beautymail::templates.widgets')

@section('content')

    @include('beautymail::templates.widgets.newfeatureStart')

    <h4 class="secondary"><strong style="text-transform: uppercase">{{ $data['country_name'] }} Free Test Drive</strong>
    </h4>
    <p><b>Name : </b>{{ $data['message']['name'] }}</p>
    <p><b>Email : </b>{{ $data['message']['email'] }}</p>
    <p><b>Telephone : </b>{{ $data['message']['phone_number'] }}</p>
    <p><b>Date : </b>{{ $data['message']['date'] }}</p>
    <p><b>Reason for contact : </b>{{ $data['message']['reason_for_contact'] }}</p>
    <p><b>Created at : </b>{{ $data['created_at'] }}</p>

    @include('beautymail::templates.widgets.newfeatureEnd')

@stop
