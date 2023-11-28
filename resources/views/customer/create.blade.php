@extends('layouts/contentNavbarLayout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
      <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('customer.index') }}">View All</a>
    </h4>

    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-6">
        <div class="card mb-4">

          <h5 class="card-header">Create Customer</h5>

            <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="card-body">


                    <div>
                        <label for="customer_name"  class="form-label" >Name *</label>
                        <input type="text" required="required" id="customer_name" name="customer_name" class="form-control form-control-lg" placeholder="Name *">

                        @error('customer_name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="customer_phone"  class="form-label" >Phone *</label>
                        <input type="number" required="required" id="customer_phone" name="customer_phone" class="form-control form-control-lg" placeholder="Phone *">

                        @error('supplier_phone')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="py-2">
                        <label for="customer_address"  class="form-label" >Address *</label>
                        <input type="text" required="required" id="customer_address" name="customer_address" class="form-control form-control-lg" placeholder="Address *">

                        @error('customer_address')
                                <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="customer_city"  class="form-label" >City *</label>
                        <input type="text" required="required" id="customer_city" name="customer_city" class="form-control form-control-lg" placeholder="Category *">

                        @error('customer_city')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mt-2 mb-3">
                      <label for="customer_type" class="form-label">Select Type</label>
                          <select class="form-select form-select-lg" name="customer_type" id="customer_type">
                              <option value="" disabled selected>Choose</option>
                              @foreach ($customerTypes as $customerType)
                                <option style="cursor: pointer;" value="{{ $customerType->type_name }}">{{ $customerType->type_name }}</option>
                              @endforeach
                          </select>

                        @error('customer_type')
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

@endsection
