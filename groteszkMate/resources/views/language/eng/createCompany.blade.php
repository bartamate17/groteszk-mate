@extends('language.eng.app')

@section('content')
    <div class="welcomeDiv container px-2 px-lg-4 text-center">
        <div class="card-body">
            <h3 class="mb-5"><em>{{ __('home.createcompany') }}</em></h3>
            <form method="POST" action="{{ route('companyRegister') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="name"
                        class="labelRegister col-md-4 col-form-label text-md-end">{{ __('home.companyname') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" placeholder="{{ __('home.placeholdercompany') }}" required
                            autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email"
                        class="labelRegister col-md-4 col-form-label text-md-end">{{ __('home.email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="example@gmail.com" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="file"
                        class="labelRegister col-md-4 col-form-label text-md-end">{{ __('home.logo') }}</label>

                    <div class="col-md-6">
                        <input id="file" type="file" name="file"><br>
                        <label for="file">{{ __('home.pixelsize') }}</label>
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="url" class="labelRegister col-md-4 col-form-label text-md-end">Url</label>

                    <div class="col-md-6">
                        <input id="url" type="text" class="form-control" placeholder="{{ __('home.placeholderurl') }}"
                            name="url">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="companyNewRegister col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('home.register') }}
                        </button>
                    </div>
                    <a class="navbar-brand" href="{{ route('company') }}">
                        {{ __('home.back') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
