@extends('layouts/contentNavbarLayout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
      <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('supplier.index') }}">View All</a>
    </h4>

    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-6">
        <div class="card mb-4">

          <h5 class="card-header">Create Supplier</h5>

            <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">

                    <div>
                        <label for="supplier_name"  class="form-label" >Name *</label>
                        <input type="text" required="required" id="supplier_name" name="supplier_name" class="form-control form-control-lg" placeholder="name *">
                        @error('supplier_name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="supplier_phone"  class="form-label" >Phone Number *</label>
                        <input type="number" required="required" id="supplier_phone" name="supplier_phone" class="form-control form-control-lg" placeholder="Phone no *">

                        @error('supplier_phone')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="py-2">
                        <label for="supplier_address" class="form-label">Address *</label>
                        <input type="text" required="required" id="supplier_address" name="supplier_address" class="form-control form-control-lg" placeholder="Address *">
                        @error('supplier_address')
                                <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="city"  class="form-label">City *</label>
                        <input type="text" required="required" id="city" name="city" class="form-control form-control-lg" placeholder="City*">
                        @error('city')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary d-grid w-100 mt-4" type="submit">Create</button>
                </div>

            </form>

          </div>
      </div>
    </div>
  </div>

</div>

@endsection
