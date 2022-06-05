@extends('common_file.layout')

@section('content')

<div class="my-5" id="addNewUserModal">
    @if ($message= Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
@endif
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Posts</h5>
        </div>
        <div class="modal-body">
          <form id="add-user-form" class="p-2" novalidate method="POST" action="{{ route('posts.update',$post->id) }}">
            @method('PUT')
            @csrf
            <div class="row mb-3 gx-3">
              <div class="col">
                <input type="text" name="title" value="{{ $post->title }}" class="form-control form-control-lg" placeholder="Enter title" >
                @error('title')
                <div class="text-danger fw-bolder">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-3">
                <textarea name="description" value="{{ $post->description }}" class="form-control form-control-lg" >{{ $post->description }}</textarea>
              @error('description')
              <div class="text-danger fw-bolder">{{ $message }}</div>
              @enderror
            </div>

            <select class="form-select form-select-lg mb-3" name="active"  aria-label=".form-select-lg example">
                <option value={{ $post->active }} selected>
                    @if ($post->active ===1)
                    {{ 'Active' }}
                    @else
                    {{ 'Not Active' }}
                    @endif
                </option>
                <option value="1">Active</option>
                <option value="0">Not Active</option>
              </select>

            <div class="mb-3">
              <input type="submit" value="Update Post" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

