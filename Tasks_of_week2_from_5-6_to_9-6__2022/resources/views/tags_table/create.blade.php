@extends('common_file.layout')

@section('content')
    <div class="my-5" id="addNewUserModal">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Tags</h5>
                </div>
                <div class="modal-body">
                    <form id="add-user-form" class="p-2" novalidate method="POST"
                        action="{{ route('tags.store') }}">
                        @csrf
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="name" value="{{ old('title') }}"
                                    class="form-control form-control-lg" placeholder="Enter name">
                                @error('title')
                                    <div class="text-danger fw-bolder">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3">
                            <input type="submit" value="Add Tag" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="container">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Edit/Delete</th>

            </tr>
        </thead>
        <tbody>
            @if (isset($data) && count($data) > 0)
                {{-- {{ dd($data) }} --}}
                @foreach ($data as $key => $tag)
                    <tr>
                        {{-- <th scope="row">1</th> --}}
                        <td>{{ $tag->name }}</td>
                        <td class="d-flex justify-content-center justify-items-center">
                        <form class="mx-2" method="get" action="">
                            @csrf
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>

                            <form class="mx-2" method="POST" action="">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <h2>There are no tags to show.</h2>
            @endif
        </tbody>
    </table>
</div>

    <div class="container col-4 my-3">
        {{-- <a class="nav-link btn btn-primary text-light" href="{{ route('tags.create') }}">create Tags</a> --}}
    </div>
@endsection
