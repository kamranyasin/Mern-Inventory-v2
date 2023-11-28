@extends('layouts/contentNavbarLayout')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <h4 class="fw-bold py-3 mb-4">
    <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('expense.index') }}">View All</a>
  </h4>

  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6">
      <div class="card mb-4">

        <h5 class="card-header">Edit Expense</h5>

            <form action="{{ route('expense.update', $expense->id) }}" method="POST" enctype="multipart/form-data" class="createsupplier-form">

                @csrf
                @method('PUT')

                <div class="card-body">

                    <div>
                       <label for="name"  class="form-label" >Name *</label>
                        <input type="text" required="required" id="name" name="name" value="{{ $expense->name }}" class="form-control form-control-lg">
                        @error('name')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="quantity"  class="form-label" >Quantity *</label>
                        <input type="number" required="required" id="quantity" name="quantity" value="{{ $expense->quantity }}" class="form-control form-control-lg">
                        @error('quantity')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="py-2">
                        <label for="total_amount" class="form-label">Total Amount*</label>
                        <input type="number" required="required" id="total_amount" name="total_amount" onkeyup="calculateDue(event)" value="{{ $expense->total_amount }}" class="form-control form-control-lg">
                        @error('total_amount')
                                <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2">
                        <label for="paid_amount" class="form-label">Amount Paid*</label>
                        <input type="number" required="required" id="paid_amount" name="paid_amount" onkeyup="calculateDue(event)" value="{{ $expense->paid_amount }}" class="form-control form-control-lg">
                        @error('paid_amount')
                            <span class="create-supplier-error-message">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="py-2">
                      <label for="due_amount"  class="form-label">Due Amount *</label>
                      <input type="number" required="required" id="due_amount" name="due_amount" value="{{ $expense->paid_amount - $expense->total_amount }}" class="form-control form-control-lg">
                      @error('due_amount')
                          <span class="create-supplier-error-message">{{$message}}</span>
                      @enderror
                  </div>

                    <button class="btn btn-primary d-grid w-100 mt-4" type="submit">Update</button>

                </div>

            </form>

           </div>

        </div>

    </div>

@endsection

@section('page-script')

  <script>

      function calculateDue(event){


      var paidAmount = document.getElementById("paid_amount").value;

      var totalAmount = document.getElementById("total_amount").value;

      var dueAmount = totalAmount - paidAmount;

      document.getElementById("due_amount").value = dueAmount;

      console.log(dueAmount);
      }

  </script>

@endsection
