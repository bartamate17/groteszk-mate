@extends('language.eng.app')

@section('content')
    <div class="container px-4 px-lg-5 text-center">
        @if (Auth::user())
            <a class="createButton btn btn-primary btn-xl"
                href="{{ route('createEmployee') }}">{{ __('home.createemployee') }}</a>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('home.firstname') }}</th>
                    <th scope="col">{{ __('home.lastname') }}</th>
                    <th scope="col">{{ __('home.company') }}</th>
                    <th scope="col">{{ __('home.email') }}</th>
                    <th scope="col">{{ __('home.phone') }}</th>
                    @if (Auth::user())
                        <th scope="col">{{ __('home.change') }}</th>
                        <th scope="col">{{ __('home.remove') }}</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{ $employees->total() - ($employees->firstItem() + $loop->index) + 1 }}</th>
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->lastname }}</td>
                        <td>{{ $employee->company }}</td>
                        <td><a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></td>
                        <td><a href="tel:+36{{ $employee->phone }}">+36{{ $employee->phone }}</a></td>
                        @if (Auth::user())
                            <td><a class="btn btn-primary btn-xl"
                                    href="employee/{{ $employee->id }}/edit">{{ __('home.edit') }}</a></td>
                            <td><a class="btn btn-primary btn-xl"
                                    href="{{ route('employeeDestroy', $employee->id) }}">{{ __('home.delete') }}</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $employees->links() }}
    </div>
@endsection
