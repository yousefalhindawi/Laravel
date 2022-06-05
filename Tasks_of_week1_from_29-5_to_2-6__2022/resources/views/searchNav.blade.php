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
            @if (isset($car) && count($car) > 0)
                @foreach ($car as $key => $value)
                    <tr>
                        {{-- <th scope="row">1</th> --}}
                        <td>{{ $value['name'] }}</td>
                        <td>{{ $value['color'] }}</td>
                        <td>{{ $value['year_made'] }}</td>
                    </tr>
                @endforeach
            @else
                <h2>There are no cars to show.</h2>
            @endif
        </tbody>
    </table>
</div>
@endsection
