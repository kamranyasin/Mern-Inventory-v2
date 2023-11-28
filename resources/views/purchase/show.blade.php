@extends('layouts/contentNavbarLayout')

@section('title', 'Purchase Detail')



@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row invoice-preview">

  <h4 class="fw-bold py-3 mb-4" id="othercontent">
    <a class="btn btn-primary d-flex gap-2 w-auto" style="max-width: 200px" href="{{ route('purchase.index') }}">View All</a>
  </h4>

    <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4" id="print-purchase">
      <div class="card invoice-preview-card">

        <div class="card-body">
          <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
            <div class="mb-xl-0 mb-4">
              <div class="d-flex svg-illustration mb-4 gap-2 align-items-center">
                <img src="/images/sigmaa-icon.png" alt="company logo" width="30">
                <span class="app-brand-text fw-bold fs-4"> Siggmaa </span>
              </div>
              <p class="mb-2">Office 149, 450 South Brand Brooklyn</p>
              <p class="mb-2">San Diego County, CA 91905, USA</p>
              <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
            </div>
            <div>
              <h4 class="fw-semibold mb-2">{{ $purchase->purchase_no }}</h4>
              <div class="mb-2 pt-1">
                <span>Date Issues:</span>
                <span class="fw-semibold">{{ $purchase->updated_at }}</span>
              </div>
            </div>
          </div>
        </div>

        <hr class="my-0" />
            <form>

                <div class="card-body">


                  <div class="row p-sm-3 p-0">
                    <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                      <h6 class="mb-3">Invoice To:</h6>
                      <p class="mb-1">{{$purchase->supplier_name}}</p>
                    </div>
                    <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                      <h6 class="mb-4">Bill:</h6>
                      <table>

                        <tbody>
                          <tr>
                            <td class="pe-4">Total Amount:</td>
                            <td><strong>{{ $purchase->total_amount }}</strong></td>
                          </tr>
                          <tr>
                            <td class="pe-4">Paid Amount:</td>
                            <td>{{ $purchase->paid_amount}}</td>
                          </tr>
                          <tr>
                            <td class="pe-4">Due Amount:</td>
                            <td>{{ $purchase->total_amount - $purchase->paid_amount}}</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>

                <div  class="table-responsive border-top px-4 py-4" style="margin-top: 40px !important">

                  <table class="table m-0" id="mytable">

                      <thead>
                          <th>Category</th>
                          <th>Product</th>
                          <th>Unit</th>
                          <th>Quantity</th>
                          <th>Unit Price</th>
                          <th>Total Price</th>
                      </thead>

                      <tbody>

                          @forEach ($purchase->purchaseMeta as $item)

                          <tr>
                              <td class="text-nowrap">
                                {{ $item->category_id}}
                              </td>

                              <td class="text-nowrap">
                                {{ $item->product_id}}
                              </td>

                              <td class="text-nowrap">
                                {{ $item->unit->name}}
                              </td>

                              <td class="text-nowrap">
                                {{ $item->quantity }}
                              </td>


                              <td class="text-nowrap">
                                {{ $item->unit_price }}
                              </td>

                              <td class="text-nowrap">
                                {{ $item->unit_price * $item->quantity}}
                              </td>


                          </tr>

                          @endforeach

                      </tbody>

                      <tfoot class="d-flex justify-content-center align-items-center text-end m-auto">
                        <tr>
                          <td class="text-end pe-3 py-4">
                            <p class="mb-2 pt-3">Paid:</p>
                            <p class="mb-2">Due:</p>
                            <p class="mb-0 pb-3">Total:</p>
                          </td>

                          <td class="ps-2 py-4">
                            <p class="fw-semibold mb-2 pt-3">{{ $purchase->paid_amount}}</p>
                            <p class="fw-semibold mb-2">{{ $purchase->paid_amount - $purchase->total_amount}}</p>
                            <p class="fw-semibold mb-0 pb-3">{{ $purchase->total_amount }}</p>
                          </td>

                        </tr>
                      </tfoot>

                  </table>

                </div>

            </form>

      </div>
    </div>

  <!-- Invoice Actions -->
    <div class="col-xl-3 col-md-4 col-12 invoice-actions" id="othercontent">
      <div class="card">
        <div class="card-body">
          <button type="button" onclick="printReport()" class="btn btn-primary btn-label-secondary d-grid w-100 mb-2" >
            Print
          </button>

        </div>
      </div>
    </div>
  <!-- /Invoice Actions -->

  </div>

</div>



@endsection

@section('page-script')

  <script src="/js/printThis.js"></script>
  <script src="/js/table2csv.min.js"></script>

  <script>

    function printReport(){

      $('#print-purchase').printThis();

    }

  </script>



@endsection
