@extends('layouts.app')
@section('content')
    <h2>{{__('Posts')}}</h2>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('Title')}}</th>
            <th scope="col">{{__('Body')}}</th>
            <th scope="col">{{__('Author name')}}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->user->name }}</td>
            </tr>
        @empty
            {{__('Empty list')}}
        @endforelse
        </tbody>
    </table>
    <div class="">{{ $posts->links() }}</div>
@endsection
