@extends('common_file.layout')

@section('content')



    <div class="my-5" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Posts</h5>
            </div>
            <div class="modal-body">
              <form id="add-user-form" class="p-2" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 gx-3">
                  <div class="col">
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-lg" placeholder="Enter title" >
                    @error('title')
                    <div class="text-danger fw-bolder">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="mb-3">
                    <textarea name="description" value="{{ old('description') }}" class="form-control form-control-lg" >Enter description</textarea>
                  {{-- <input type="textarea" name="description" value="{{ old('description') }}" class="form-control form-control-lg" placeholder="Enter description" > --}}
                  @error('description')
                  <div class="text-danger fw-bolder">{{ $message }}</div>
                  @enderror
                </div>

                <select class="form-select form-select-lg mb-3" name="active" aria-label=".form-select-lg example">
                    <option value="1" selected>Active</option>
                    <option value="0">Not Active</option>
                  </select>
                  <div class="mb-3">
                      @if (isset($tags) && count($tags) > 0)
                      @foreach ($tags as $tag)
                      <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->name }}">
                      <label class="ml-3" for="{{ $tag->name  }}">{{ $tag->name }}</label>
                  @endforeach
                      @endif
                </div>
                <div class="row mb-3 gx-3">
                    <div class="col">
                      <input type="file" name="image" value="" class="form-control form-control-lg" placeholder="Enter title" >
                      @error('image')
                      <div class="text-danger fw-bolder">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                <div class="mb-3">
                  <input type="submit" value="Add Post" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection
