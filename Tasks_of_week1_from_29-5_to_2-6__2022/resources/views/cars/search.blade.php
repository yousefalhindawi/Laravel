@extends('cars.common_file.layout')

@section('content')


    <div class="" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Search Cars</h5>
                </div>
                <div class="modal-body">
                    <form id="add-user-form" class="p-2" novalidate method="get"
                        action="{{ route('cars.getName') }}">
                        @csrf
                        {{-- {{ csrf_field() }} --}}
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter Car Name"
                                required>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="search" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
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
