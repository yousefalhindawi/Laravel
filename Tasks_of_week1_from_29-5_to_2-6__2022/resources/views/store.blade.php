@extends('cars.common_file.layout')

@section('content')
<h3>
you are viewing the store for the {{ $category }}  {{ $items }}
</h3>
@endsection



{{-- <section class="cat_product_area section_gap">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-lg-9">
          <div class="latest_product_inner">
            <div class="row">
                <div class="col-lg-4 col-md-6 ">
                  <div class="single-product card pb-3">
                    <div class="product-img">
                        <img class="card-img" src="./admin/product/images/" style="height:200px" alt="" />
                      </div>
                    </div>
                    <div class="product-btm text-center">
                      <a href="#" class="d-block">
                        <h4>name</h4>
                      </a>
                    </div>
                    <div class="product-btm text-center">
                      <a href="#" class="d-block">
                        <h4>
                            <div class="mt-3">
                              <span class="">price</span>
                            </div>

                        </h4>
                      </a>
                    </div>
                  </div>
                </div>

            </div>

          </div>
        </div> --}}
