@extends('cars.common_file.layout')

@section('content')

<div class="my-5" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Cars</h5>
        </div>
        <div class="modal-body">
          <form id="add-user-form" class="p-2" novalidate method="POST" action="{{ route('cars.update', $editCar->id)}}">
            @method('PUT')
            @csrf
            <div class="row mb-3 gx-3">
              <div class="col">
                <input type="text" name="name" value="{{ $editCar->name }}" class="form-control form-control-lg" placeholder="Enter Name" >
                @error('name')
                <div class="text-danger fw-bolder">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-3">
              <input type="text" name="color" value="{{ $editCar->color }}" class="form-control form-control-lg" placeholder="Enter Color" >
              @error('color')
              <div class="text-danger fw-bolder">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <input type="number" name="year_made" value="{{ $editCar->year_made }}" min="1885" max="{{ date("Y") }}"  class="form-control form-control-lg" placeholder="Enter Year_Made">
              @error('year_made')
              <div class="text-danger fw-bolder">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <input type="submit" value="Update Car" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

