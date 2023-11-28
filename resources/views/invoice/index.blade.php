@extends('layouts/contentNavbarLayout')

@section('title', 'Invoice List')


@section('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <style>
    .tbody tr td{
      height: 40px !important;
    }

    @media screen and (max-width: 580px){
      .table-header{
        position: relative;
      }

      .table-header-button span{
        display: none;
      }
    }

  </style>

@endsection

@section('page-script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>
      $(document).ready( function () {
         $('#myTable').DataTable({
             "responsive": true,
         });

      } );
    </script>

@endsection


@section('content')


<div class="card">

  <div class="card-header d-flex justify-content-between align-items-center table-header">
    <h5>Invoices</h5>

    @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
    <a href="{{ url('cashier/invoice/create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
      <i class='bx bx-plus bx-sm'></i>
      <span>New Invoice</span>
    </a>
    @else
    <a href="{{ route('invoice.create') }}" class="btn btn-primary d-flex gap-2 w-25 table-header-button">
      <i class='bx bx-plus bx-sm'></i>
      <span>New Invoice</span>
    </a>
    @endif

  </div>

  <div class="table-responsive text-nowrap px-4 py-4">


    <table id="myTable" class="table py-2">

      <thead>
          <th>ID</th>
          <th>Invoice No</th>
          <th>Customer Name</th>
          <th>Total Amount</th>
          <th>Paid Amount</th>
          <th>Due Amount</th>
          <th>Created On</th>
          <th>Action</th>
      </thead>

      <tbody class="tbody">

          @foreach ($invoices  as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->invoice_no }}</td>
                <td>{{ $invoice->customer_name }}</td>
                <td>{{ $invoice->total_amount }}</td>
                <td>{{ $invoice->paid_amount }}</td>
                <td>{{ $invoice->due_amount }}</td>
                <td>{{ $invoice->created_at }}</td>

                <td class="supplier-table-action">

                  <div class="dropdown">

                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>

                    <div class="dropdown-menu">

                      @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
                        <a class="dropdown-item" href="{{ url('cashier/invoice/'. $invoice->id) }}">
                          <i class="bx bx-show me-1"></i> Show
                        </a>
                      @else
                        <a class="dropdown-item" href="{{ route('invoice.show', $invoice->id) }}">
                          <i class="bx bx-show me-1"></i> Show
                        </a>
                      @endif

                      <a class="dropdown-item" href="{{ route('invoice.edit', $invoice->id) }}">
                        <i class="bx bx-edit-alt me-1"></i> Edit
                      </a>

                      <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit"><i class="bx bx-trash me-1"></i> Delete</button>
                      </form>
                    </div>

                  </div>

                </td>

            </tr>
          @endforeach

      </tbody>

    </table>


  </div>



</div>



@endsection



{{-- <div class="customise-btn-inside-table">
  @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
      <a href="{{ url('cashier/invoice/create') }}">
          <i class='bx bx-plus bx-sm'></i>
          Add New Invoice
      </a>
  @else
      <a href="{{ route('invoice.create') }}">
          <i class='bx bx-plus bx-sm'></i>
          Add New Invoice
      </a>
  @endif
</div> --}}


{{-- @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
        <a href="{{ url('cashier/invoice', $invoice->id) }}">
            <i class='bx bx-show bx-sm'></i>
        </a>
      @else
        <a href="{{ route('invoice.show', $invoice->id) }}">
            <i class='bx bx-show bx-sm'></i>
        </a>
      @endif --}}
