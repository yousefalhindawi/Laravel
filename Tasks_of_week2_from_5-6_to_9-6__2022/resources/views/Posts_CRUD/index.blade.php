@extends('common_file.layout')

@section('content')

@if (isset($data) && count($data) > 0)
<div class="container my-5 ">
    <div class="row gy-3">
    @foreach ($data as $key => $post)
        <div class="col-lg-4 col-md-6 gx-3">
            <div class="postd ">
                {{-- <h5 class="postd-header">Featured</h5> --}}
                <div class="postd-body">
                  <h5 class="postd-title">{{ $post['title'] }}</h5>
                  <p class="postd-text">{{ $post->description }}</p>
                  <p class="postd-text text-lighter"> @if ($post->active ===1)
                    {{ 'Active' }}
                    @else
                    {{ 'Not Active' }}
                    @endif</p>
                  <a href="{{ route('posts.show', ['post'=>$post->id]) }}" class="btn btn-primary">Show</a>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>

    @endif

    <div class="container my-5">
        @if ($message= Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    {{-- <th scope="col">#</th> --}}
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Active</th>

                </tr>
            </thead>
            <tbody>
                @if (isset($data) && count($data) > 0)
                    {{-- {{ dd($data) }} --}}
                    @foreach ($data as $key => $post)
                        <tr>
                            {{-- <th scope="row">1</th> --}}
                            <td>{{ $post['title'] }}</td>
                            <td>{{ $post->description }}</td>
                            <td> @if ($post->active ===1)
                                {{ 'Active' }}
                                @else
                                {{ 'Not Active' }}
                                @endif</td>
                            <td>
                                <form method="get" action="{{ route('posts.edit',$post->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('posts.destroy',$post->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <h2>There are no posts to show.</h2>
                @endif
            </tbody>
        </table>
    </div>
    <div class="container col-4">
        <a class="nav-link btn btn-primary text-light" href="{{ route('posts.create') }}">create Posts</a>
    </div>

@endsection
