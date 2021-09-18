@extends('layouts.app')
@section('content')
    <h2>{{__('Users')}}</h2>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Name')}}</th>
            <th scope="col">{{__('Username')}}</th>
            <th scope="col">{{__('Company')}}</th>
            <th scope="col">{{__('Address')}}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->company->name }}</td>
                <td>{{ $user->address->getFullAddressAttribute() }}</td>
            </tr>
        @empty
            {{__('Empty list')}}
        @endforelse
        </tbody>
    </table>
    <div class="">{{ $users->links() }}</div>
@endsection
