@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection


@section('styles')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection

@section('page-script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

  <script>
    var TotalPurchaseChart = @json($TotalPurchaseChart);
    var purchaseMonths = @json($months);
    var PurchaseMonthsCount = @json($monthsCount);
  </script>

  <script>
    var TotalSalesChart = @json($TotalSalesChart);
    var monthsSales = @json($monthsSales);
    var monthsCountSales = @json($monthsCountSales);
  </script>

  <script src="/js/dashboardCharts.js"></script>

  <script>
    $(document).ready( function () {
       $('#myTable').DataTable({
           "lengthChange": false,
           "searching": false,
           "info": false,
           "colReorder": true,
           "responsive": true
       });
    } );

    $(document).ready( function () {
       $('#myTable2').DataTable({
           "lengthChange": false,
           "searching": false,
           "info": false,
           "colReorder": true,
           "responsive": true
       });
    } );

    $(document).ready( function () {
       $('#myTable3').DataTable({
           "lengthChange": false,
           "searching": false,
           "info": false,
           "colReorder": true,
           "responsive": true
       });
    } );
  </script>

@endsection

@section('content')
<div class="row">
  <div class="col-lg-4 col-md-4 order-1">
    <div class="row">

      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/chart-success.png')}}" alt="chart success" class="rounded">
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Revenue</span>
            <h3 class="card-title mb-2">${{ $totalRevenue }}</h3>
            @if( $pecentage > 0 )
              <small class="text-success fw-semibold"> <i class='bx bx-up-arrow-alt'></i>{{ $pecentage }}%</small>
            @else
              <small class=" text-danger fw-semibold "> <i class='bx bx-down-arrow-alt'></i>{{ $pecentage }}%</small>
            @endif

          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card" class="rounded">
              </div>
            </div>
            <span>Today Purchase</span>
            <h3 class="card-title text-nowrap mb-1">${{ $purchaseCount }}</h3>
            <small class="text-success fw-semibold">
              @if( $purchaseCount > $purchaseCounty )
                <i class='bx bx-up-arrow-alt'></i>
              @else
                <i class='bx bx-down-arrow-alt text-danger'></i>
              @endif
              <span class="text-secondary">Yesterday ${{ $purchaseCounty }}</span>
            </small>
          </div>
        </div>
      </div>

      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/paypal.png')}}" alt="Credit Card" class="rounded">
              </div>
            </div>
            <span class="d-block mb-1">Today Sales</span>
            <h3 class="card-title text-nowrap mb-2">${{ $invoiceCount }}</h3>
            <small class="text-success fw-semibold">
              @if( $invoiceCount > $invoiceCounty )
                <i class='bx bx-up-arrow-alt'></i>
              @else
                <i class='bx bx-down-arrow-alt text-danger'></i>
              @endif
              <span class="text-secondary">Yesterday ${{ $invoiceCounty }}</span>
            </small>
          </div>
        </div>
      </div>

      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded">
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Expenses</span>
            <h3 class="card-title mb-2">${{ $totalExpenses }}</h3>
            @if( $expensePer > 0 )
              <small class="text-danger fw-semibold"> <i class='bx bx-up-arrow-alt'></i>+{{ $expensePer }}%</small>
            @else
              <small class="text-success fw-semibold "> <i class='bx bx-down-arrow-alt'></i>-{{ $expensePer }}%</small>
            @endif
          </div>
        </div>
      </div>

    </div>
  </div>


    {{-- mini cards ends --}}

  <!-- Total Revenue -->

  <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
    <div class="card">
      <div class="row row-bordered g-0">
        <div class="col-md-12">
          <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
          <div id="totalRevenueChart" class="px-2"></div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Total Revenue -->

  <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
    <div class="row">
      <div class="col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
              <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                <div class="card-title">
                  <h5 class="text-nowrap mb-2">Sales Report</h5>
                  <span class="badge bg-label-warning rounded-pill">Year 2023</span>
                </div>
                <div class="mt-sm-auto">
                  <h3 class="mb-0">${{ $totalSales }}</h3>
                </div>
              </div>
              <div id="profileReportChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
    <div class="row">
      <div class="col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
              <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                <div class="card-title">
                  <h5 class="text-nowrap mb-2">Purchase Report</h5>
                  <span class="badge bg-label-warning rounded-pill">Year 2023</span>
                </div>
                <div class="mt-sm-auto">
                  <h3 class="mb-0">${{ $totalBuy }}</h3>
                </div>
              </div>
              <div id="PurchaseReportChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="row">

  <!-- Unpaid Invoices -->
  <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Unpaid Invoices</h5>
        </div>

        <div class="dropdown">
          <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <a class="dropdown-item" href="{{ route('invoice.index') }}">View All</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-column align-items-center gap-1">
            <h2 class="mb-2">${{ $unpaidInvoicesTotal }}</h2>
          </div>
        </div>

        <div class="table-responsive text-nowrap px-0 py-2" >
          <table id="myTable" class="table py-2">

              <thead>
                      <th>Invoice Id</th>
                      <th>Customer Name</th>
                      <th>Status</th>
              </thead>

              <tbody>
              @foreach ($unpaidInvoices as $unpaidInvoice)
                  <tr>
                          <td>{{$unpaidInvoice->invoice_no}}</td>
                          <td>{{$unpaidInvoice->customer_name}}</td>
                          <td>
                              <span class="bg-warning p-1 text-white rounded-pill">unpaid</span>
                          </td>
                  </tr>
              @endforeach
              </tbody>

          </table>
      </div>

      </div>
    </div>
  </div>
  <!--/ Unpaid Invoices -->

  <!-- Expense Overview -->
  <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Unpaid Purchases</h5>
        </div>

        <div class="dropdown">
          <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <a class="dropdown-item" href="{{ route('purchase.index') }}">View All</a>
          </div>
        </div>


      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-column align-items-center gap-1">
            <h2 class="mb-2">${{ $unpaidPurchasesTotal }}</h2>
          </div>
        </div>

        <div class="dashboard-table-card" class="table-responsive text-nowrap px-0 py-2" >

          <table id="myTable2" class="table py-2">

              <thead>
                      <th>Purchase Id</th>
                      <th>Supplier Name</th>
                      <th>Status</th>
              </thead>

              <tbody>
              @foreach ($unpaidPurchases as $unpaidPurchase)
                  <tr>
                          <td>{{$unpaidPurchase->purchase_no}}</td>
                          <td>{{$unpaidPurchase->supplier_name}}</td>
                          <td>
                              <span class="bg-warning p-1 text-white rounded-pill">unpaid</span>
                          </td>
                  </tr>
              @endforeach
              </tbody>

          </table>



        </div>


      </div>
    </div>
  </div>
  <!--/ Expense Overview -->

  <!-- Transactions -->
  <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Pending Expenses</h5>
        </div>

        <div class="dropdown">
          <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-vertical-rounded"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
            <a class="dropdown-item" href="{{ route('expense.index') }}">View All</a>
          </div>
        </div>


      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-column align-items-center gap-1">
            <h2 class="mb-2">${{ $unpaidExpensesTotal }}</h2>
          </div>
        </div>

        <div class="dashboard-table-card" class="table-responsive text-nowrap px-0 py-2" >

          <table id="myTable3" class="table py-2">

              <thead>
                      <th>Expense Id</th>
                      <th>Expense Name</th>
                      <th>Status</th>
              </thead>

              <tbody>
              @foreach ($unpaidExpenses as $unpaidExpense)
                  <tr>
                          <td>{{$unpaidExpense->id}}</td>
                          <td>{{$unpaidExpense->name}}</td>
                          <td>
                              <span class="bg-warning p-1 text-white rounded-pill">unpaid</span>
                          </td>
                  </tr>
              @endforeach
              </tbody>

          </table>



        </div>

      </div>
    </div>
  </div>
  <!--/ Transactions -->
</div>
@endsection

{{-- unpaidExpenses --}}
