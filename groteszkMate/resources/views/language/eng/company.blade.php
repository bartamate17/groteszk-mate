@extends('language.eng.app')

@section('content')
    <div class="container px-4 px-lg-5 text-center">
        @if (Auth::user())
            <a class="createButton btn btn-primary btn-xl"
                href="{{ route('createCompany') }}">{{ __('home.createcompany') }}</a>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('home.companyname') }}</th>
                    <th scope="col">{{ __('home.email') }}</th>
                    <th scope="col">{{ __('home.logo') }}</th>
                    <th scope="col">{{ __('home.website') }}</th>
                    @if (Auth::user())
                        <th scope="col">{{ __('home.change') }}</th>
                        <th scope="col">{{ __('home.remove') }}</th>
                    @endif
                </tr>
            </thead>
            <tbody>

                @foreach ($companies as $company)
                    <tr>
                        <th scope="row">{{ $companies->total() - ($companies->firstItem() + $loop->index) + 1 }}</th>
                        <td>{{ $company->name }}</td>
                        <td><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></td>
                        <td><img class="companyLogo" src="{{ URL::asset('logo/' . $company->logo) }}"
                                alt="{{ $company->name }}"></td>
                        <td><a href="{{ $company->url }}">{{ $company->url }}</a></td>
                        @if (Auth::user())
                            <td><a class="btn btn-primary btn-xl"
                                    href="{{ route('companyedit', $company->id) }}">{{ __('home.edit') }}</a>
                            </td>
                            <td><a class="btn btn-primary btn-xl"
                                    href="{{ route('companyDestroy', $company->id) }}">{{ __('home.delete') }}</a>
                            </td>
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
@endsection
