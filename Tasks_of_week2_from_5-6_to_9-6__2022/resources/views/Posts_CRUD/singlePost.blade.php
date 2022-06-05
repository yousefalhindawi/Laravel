@extends('common_file.layout')


@section('content')

@if (isset($post))
<div class="container my-5 ">
    <div class="row gy-3">

        <div class="col-lg-4 col-md-6 gx-3">
            <div class="card ">
                {{-- <h5 class="card-header">Featured</h5> --}}
                <div class="card-body">
                    <h5 class="postd-title">{{ $post['title'] }}</h5>
                    <p class="postd-text">{{ $post->description }}</p>
                    <p class="postd-text text-lighter">@if ($post->active ===1)
                        {{ 'Active' }}
                        @else
                        {{ 'Not Active' }}
                        @endif</p>
                </div>
              </div>
            </div>

        </div>
    </div>
    @else
    <h2>There are no cars to show.</h2>
    @endif

@endsection
