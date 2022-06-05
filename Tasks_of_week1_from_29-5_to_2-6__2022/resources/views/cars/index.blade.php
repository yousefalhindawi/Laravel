@extends('cars.common_file.layout')

@section('content')

@if (isset($data) && count($data) > 0)
<div class="container my-5 ">
    <div class="row gy-3">
    @foreach ($data as $key => $car)
        <div class="col-lg-4 col-md-6 gx-3">
            <div class="card ">
                {{-- <h5 class="card-header">Featured</h5> --}}
                <div class="card-body">
                  <h5 class="card-title">{{ $car['name'] }}</h5>
                  <p class="card-text">The color of the car is: {{ $car->color }} & made in {{ $car->year_made }}</p>
                  <a href="{{ route('cars.show', $car->id) }}" class="btn btn-primary">Show</a>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <h2>There are no cars to show.</h2>
    @endif

    <div class="container my-5">
        @if ($message= Session::get('success'))
            <div class="alert alert-success" role="alert">>
                {{ $message }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Year of made</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($data) && count($data) > 0)
                    {{-- {{ dd($data) }} --}}
                    @foreach ($data as $key => $car)
                        <tr>
                            {{-- <th scope="row">1</th> --}}
                            <td>{{ $car['name'] }}</td>
                            <td>{{ $car->color }}</td>
                            <td>{{ $car->year_made }}</td>
                            <td>
                                <form method="get" action="{{ route('cars.edit', $car->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('cars.destroy', $car->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <h2>There are no cars to show.</h2>
                @endif
            </tbody>
        </table>
    </div>
    <div class="container col-4">
        <a class="nav-link btn btn-primary text-light" href="{{ route('cars.create') }}">create cars</a>
    </div>

@endsection
