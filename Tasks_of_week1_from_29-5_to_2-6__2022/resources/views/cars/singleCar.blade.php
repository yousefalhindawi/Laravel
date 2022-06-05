@extends('cars.common_file.layout')


@section('content')

@if (isset($singleCar))
<div class="container my-5 ">
    <div class="row gy-3">

        <div class="col-lg-4 col-md-6 gx-3">
            <div class="card ">
                {{-- <h5 class="card-header">Featured</h5> --}}
                <div class="card-body">
                  <h5 class="card-title">{{ $singleCar->name }}</h5>
                  <p class="card-text">The color of the car is: {{ $singleCar->color }} & made in {{ $singleCar->year_made }}</p>
                </div>
              </div>
            </div>

        </div>
    </div>
    @else
    <h2>There are no cars to show.</h2>
    @endif

@endsection
