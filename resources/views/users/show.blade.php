@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                <h1>{{ $user->name }} ({{ $user->username }})</h1>
            </div>
            <div class="float-right">
                <div class="text-right">{{__('Post\'s: ')}} {{ $user->posts_count }}</div>
            </div>
        </div>
        <div class="card-body">
            <p>{{__('Email: ')}} <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
            <p>{{__('Phone: ')}} {{ $user->phone ?? '' }}</p>
            <p>{{__('Website: ')}} <a href="{{ $user->website ?? '' }}">{{ $user->website }}</a></p>
            <hr>
            <h2>{{__('Address')}}</h2>
            <p>{{__('Street: ')}} {{ $user->address->street }}</p>
            <p>{{__('Suite: ')}} {{ $user->address->suite }}</p>
            <p>{{__('City: ')}} {{ $user->address->city }}</p>
            <p>{{__('Zipcode: ')}} {{ $user->address->zipcode }}</p>
            <p>{{__('Latitude: ')}} {{ $user->address->geo->lat }}</p>
            <p>{{__('Longitude: ')}} {{ $user->address->geo->lng }}</p>
            <hr>
            <h2>{{__('Company')}}</h2>
            <p>{{__('Name: ')}} {{ $user->company->name }}</p>
            <p>{{__('Slogan: ')}} {{ $user->company->catchPhrase }}</p>
            <p>{{__('BS: ')}} {{ $user->company->bs }}</p>
        </div>
    </div>
@endsection
