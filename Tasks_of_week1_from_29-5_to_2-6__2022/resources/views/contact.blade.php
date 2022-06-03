@extends('cars.common_file.layout')

@section('content')
    <h1 class="d-flex justify-content-center my-5">Contact page</h1>
    <div class="container-fluid col-4">
        <h3>Without foreach</h3>
    <ol class="list-group list-group-numbered">
        {{-- {{ dd($user) }} --}}
        <li class="list-group-item list-group-item-danger">{{ $user['id'] }}</li>
        <li class="list-group-item list-group-item-danger">{{ $user['name'] }}</li>
        <li class="list-group-item list-group-item-danger">{{ $user['email'] }}</li>
    </ol>
    </div>
    <div class="container-fluid col-4 my-3">
        <h3>With foreach</h3>
    <ol class="list-group list-group-numbered">
        @foreach ($user as $key => $value)
            <li class="list-group-item list-group-item-primary">The {{ $key }} is {{ $value }}</li>
        @endforeach
    </ol>
</div>
@endsection
