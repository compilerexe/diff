@extends ('layouts.app')
@section ('content')
    @foreach ($about_axis as $key => $value)
        <section
                id="{{ str_replace(' ', '-', strtolower($key)) }}"
                style="//border-bottom: 1px solid orangered; background: url('{{ $value->background_image }}') center center; width: 100%; height: 100vh; position:relative; -webkit-background-size: cover;background-size: cover;">
            <div style="background: rgba(0,0,0,0.3);">
                <div>
                    <div class="container h-100">
                        <div class="d-flex text-center h-100" style="">
                            <div class="my-auto w-100">
                                <h1 class="title-header text-white">
                                    {{ $key }}
                                </h1>
                                <p class="content text-white">
                                    {{ $value->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
