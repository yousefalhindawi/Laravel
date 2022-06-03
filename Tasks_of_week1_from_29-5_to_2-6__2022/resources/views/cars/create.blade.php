@extends('cars.common_file.layout')

@section('content')



    <div class="my-5" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Cars</h5>
            </div>
            <div class="modal-body">
              <form id="add-user-form" class="p-2" novalidate method="POST" action="{{ route('cars.store')}}">
                @csrf
                <div class="row mb-3 gx-3">
                  <div class="col">
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter Name" required>
                    {{-- <div class="invalid-feedback">Name is required!</div> --}}
                  </div>
                </div>

                <div class="mb-3">
                  <input type="email" name="color" class="form-control form-control-lg" placeholder="Enter Color" required>
                  {{-- <div class="invalid-feedback">Color is required!</div> --}}
                </div>

                <div class="mb-3">
                  <input type="tel" name="year_made" class="form-control form-control-lg" placeholder="Enter Year_Made" required>
                  {{-- <div class="invalid-feedback">Phone is required!</div> --}}
                </div>

                <div class="mb-3">
                  <input type="submit" value="Add Car" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection
