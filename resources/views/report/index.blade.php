@extends('layouts/contentNavbarLayout')

@section('title', 'Report')

@section('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <style>
    .tbody tr td{
      height: 40px !important;
    }

    .table-print-btns{
      position: relative;
      display: flex !important;
      flex-direction: row;
      gap: 20px
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

    <script src="/js/printThis.js"></script>
    <script src="/js/table2csv.min.js"></script>

    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );

      $('#tocsv').on('click', function() {

          $('#myTable').table2csv();

      })

      function printReport(){

          $('#myTable').printThis();

      }
    </script>


@endsection

@section('content')


<div class="card">

  <div class="card-header d-flex justify-content-between align-items-center table-header">
    <h5>{{ $page_title}}</h5>

     <div class="table-print-btns">
        <a class="btn btn-primary d-flex gap-2 w-auto table-header-button text-white" type="button" onclick="printReport()">
          <i class='bx bx-printer bx-sm' ></i>
          Print
        </a>
        <a class="btn btn-primary d-flex gap-2 w-auto table-header-button text-white" type="button" id="tocsv">
            <i class='bx bx-printer bx-sm' ></i>
            CSV
        </a>
     </div>

    </div>

    <div class="table-responsive text-nowrap px-4 py-4">

        <table id="myTable" class="table py-2">

          <thead>
              <th>{{ $type == 'invoice'? 'Invoice':'Purchase' }}</th>
              <th>{{ $type == 'invoice'? 'Customer_name':'Supplier Name' }}</th>
              <th>Total Amount</th>
              <th>Paid Amount</th>
              <th>Due Amount</th>
              <th>Status</th>
              <th>Created At</th>
          </thead>

          <tbody class="tbody">

              @foreach ($reports  as $report)
                <tr>
                    <td>{{$type == 'invoice'? $report->invoice_no : $report->purchase_no }}</td>
                    <td>{{$type == 'invoice'? $report->customer_name : $report->supplier_name }}</td>
                    <td>{{ $report->total_amount }}</td>
                    <td>{{ $report->paid_amount }}</td>
                    <td>{{ $report->due_amount }}</td>
                    <td>

                      @if ($report->paid_amount < $report->total_amount)
                          <span>Unpaid</span>
                      @else
                          <span>Paid</span>
                      @endif

                    </td>
                    <td>{{ $report->created_at }}</td>
                </tr>
              @endforeach

          </tbody>

        </table>

    </div>


</div>



@endsection

