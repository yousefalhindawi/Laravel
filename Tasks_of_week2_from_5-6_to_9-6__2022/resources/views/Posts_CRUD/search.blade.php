@extends('common_file.layout')

@section('content')


    <div class="" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Search Posts</h5>
                </div>
                <div class="modal-body">
                    <form id="add-user-form" class="p-2" novalidate method="get"
                        action="{{ route('posts.getName') }}">
                        @csrf
                        {{-- {{ csrf_field() }} --}}
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter post Name"
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
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($post) && count($post) > 0)
                    @foreach ($post as $key => $value)
                        <tr>
                            <th scope="row"><img class="img-fluid" src="{{ asset(('PostsImage/'.$value->image)) }}" style="height:200px" alt="image" /></th>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }}</td>
                            <td>
                                @if ($value->active ===1)
                    {{ 'Active' }}
                    @else
                    {{ 'Not Active' }}
                    @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <h2>There are no posts to show.</h2>
                @endif
            </tbody>
        </table>
    </div>

@endsection
