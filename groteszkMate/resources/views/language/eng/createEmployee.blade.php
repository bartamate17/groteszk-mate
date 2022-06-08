@extends('language.eng.app')

@section('content')
    <div class="welcomeDiv container px-2 px-lg-4 text-center">
        <div class="card-body">
            <h3 class="mb-5"><em>{{ __('home.createemployee') }}</em></h3>
            <form method="POST" action="{{ route('employeeRegister') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="firstname"
                        class="labelRegister col-md-4 col-form-label text-md-end">{{ __('home.firstname') }}</label>

                    <div class="col-md-6">
                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                            name="firstname" value="{{ old('firstname') }}"
                            placeholder="{{ __('home.placeholderfirstname') }}" required autocomplete="firstname"
                            autofocus>

                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="lastname"
                        class="labelRegister col-md-4 col-form-label text-md-end">{{ __('home.lastname') }}</label>

                    <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                            name="lastname" value="{{ old('lastname') }}"
                            placeholder="{{ __('home.placeolderlastname') }}" required autocomplete="lastname" autofocus>

                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="company"
                        class="labelRegister col-md-4 col-form-label text-md-end">{{ __('home.company') }}</label>

                    <div class="col-md-6">
                        <input id="company" type="text" class="form-control @error('company') is-invalid @enderror"
                            name="company" value="{{ old('company') }}"
                            placeholder="{{ __('home.placeholdercompany') }}">

                        @error('company')
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
                            name="email" value="{{ old('email') }}" placeholder="{{ __('home.placeholderemail') }}" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="labelRegister col-md-4 col-form-label text-md-end">{{ __('home.phone') }}</label>

                    <div class="col-md-6">
                        <input id="example" type="tel" class="form-control" placeholder="+36" name="example" disabled>
                        <input id="phoneInput" type="tel" class="form-control" placeholder="701238330" pattern="[0-9]{9}"
                            name="phone">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="companyNewRegister col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('home.register') }}
                        </button>
                    </div>
                    <a class="navbar-brand" href="{{ route('employee') }}">
                        {{ __('home.back') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
