@extends('cars.common_file.layout')

@section('content')

    <div class="container my-5">
    <table class="table">
        <thead>
          <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">Name</th>
            <th scope="col">Color</th>
            <th scope="col">Year of made</th>
          </tr>
        </thead>
        <tbody>
            @if (isset($data) && count($data) > 0)
            {{-- {{ dd($data) }} --}}
            @foreach ($data as $key => $car)



          <tr>
            {{-- <th scope="row">1</th> --}}
            <td>{{$car['name']}}</td>
            <td>{{$car->color}}</td>
            <td>{{$car->year_made}}</td>
          </tr>

          @endforeach
          @else
          <h2>There are no cars to show.</h2>
          @endif
        </tbody>
      </table>
    </div>
      <div class="container col-4">
      <a class="nav-link btn btn-primary text-light" href="{{route('cars.create')}}">create cars</a>
    </div>

@endsection






