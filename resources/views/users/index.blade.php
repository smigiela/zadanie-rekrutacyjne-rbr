@extends('layouts.app')
@section('content')
    <h2>{{__('Users')}}</h2>

    <h1>{{ $chart1->options['chart_title'] }}</h1>
    {!! $chart1->renderHtml() !!}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Name')}}</th>
            <th scope="col">{{__('Username')}}</th>
            <th scope="col">{{__('Company')}}</th>
            <th scope="col">{{__('Address')}}</th>
            <th scope="col">{{__('Posts')}}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td><a href="{{route('users.show', $user)}}">{{ $user->name }}</a></td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->company->name }}</td>
                <td>{{ $user->address->getFullAddressAttribute() }}</td>
                <td>{{ $user->posts_count }}</td>
            </tr>
        @empty
            {{__('Empty list')}}
        @endforelse
        </tbody>
    </table>
    <div class="">{{ $users->links() }}</div>
@endsection
@section('scripts')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection
