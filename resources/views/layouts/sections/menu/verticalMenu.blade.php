

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{ route('home')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        {{-- logo --}}
        <img src="/images/sigmaa-icon.png" alt="siggmaa logo" width="25">
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">Siggmaa</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>


  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item active open">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Dashboards">Dashboards</div>
        <div class="badge bg-label-primary rounded-pill ms-auto">1</div>
      </a>

      @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
        <ul class="menu-sub">
          <li class="menu-item active">
            <a href="{{route('cashier')}}" class="menu-link">
              <div data-i18n="Analytics">Dashboard</div>
            </a>
        </ul>
      @else
        <ul class="menu-sub">
          <li class="menu-item active">
            <a href="{{route('home')}}" class="menu-link">
              <div data-i18n="Analytics">Analytics</div>
            </a>
        </ul>
      @endif
    </li>


    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Community</span>
    </li>

    <!-- supplier -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-arrow-autofit-height"></i>
        <div data-i18n="Layouts">Supplier</div>
      </a>

      <ul class="menu-sub">

        <li class="menu-item">
          <a href="{{ route('supplier.index') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Supplier List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('supplier.create') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Add new</div>
          </a>
        </li>

      </ul>

    </li>

    <!-- customer -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-user-check"></i>
        <div data-i18n="Layouts">Customer</div>
      </a>

      <ul class="menu-sub">

        <li class="menu-item">
          <a href="{{ route('customer.index') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Customer List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('customer.create') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Add new</div>
          </a>
        </li>

        <li class="menu-item">
          <a href="{{ route('customerstypes.index') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Types</div>
          </a>
        </li>

      </ul>
    </li>

    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Products & Types</span>
    </li>

    <!-- Brands -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-brand-airtable"></i>
        <div data-i18n="Layouts">Brands</div>
      </a>

      <ul class="menu-sub">

        <li class="menu-item">
          <a href="{{ route('brand.index') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Brands List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('brand.create') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Add new</div>
          </a>
        </li>

      </ul>
    </li>

    <!-- Units -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-list-numbers"></i>
        <div data-i18n="Layouts">Units</div>
      </a>

      <ul class="menu-sub">

        <li class="menu-item">
          <a href="{{ route('unit.index') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Units List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('unit.create') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Add new</div>
          </a>
        </li>

      </ul>
    </li>

    <!-- Category -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-category"></i>
        <div data-i18n="Layouts">Categories</div>
      </a>

      <ul class="menu-sub">

        <li class="menu-item">
          <a href="{{ route('category.index') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Category List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('category.create') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Add new</div>
          </a>
        </li>

      </ul>

    </li>

    <!-- Products -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-barcode"></i>
        <div data-i18n="Layouts">Products</div>
      </a>

      <ul class="menu-sub">

        <li class="menu-item">
          <a href="{{ route('product.index') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Products List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('product.create') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Add new</div>
          </a>
        </li>

      </ul>
    </li>

     <!-- Apps & Pages -->
     <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Buy & Sell</span>
     </li>

    <!-- Expenses -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-wallet-off"></i>
        <div data-i18n="Layouts">Expenses</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ route('expense.index') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Expenses List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('expense.create') }}" class="menu-link">
            <div data-i18n="Collapsed menu">Add new</div>
          </a>
        </li>

      </ul>
    </li>


    <!-- Purchase -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-crosshair"></i>
        <div data-i18n="Layouts">Purchase</div>
      </a>

      <ul class="menu-sub">

        @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
          <li class="menu-item">
            <a href="{{ url('cashier/purchase') }}" class="menu-link">
              <div data-i18n="Collapsed menu">Purchase List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ url('cashier/purchase/create') }}" class="menu-link">
              <div data-i18n="Collapsed menu">Add new</div>
            </a>
          </li>

        @else

          <li class="menu-item">
            <a href="{{ route('purchase.index') }}" class="menu-link">
              <div data-i18n="Collapsed menu">Purchase List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('purchase.create') }}" class="menu-link">
              <div data-i18n="Collapsed menu">Add new</div>
            </a>
          </li>
        @endif

      </ul>
    </li>

    <!-- Invoice -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-currency-dollar"></i>
        <div data-i18n="Layouts">Invoice</div>
      </a>

      <ul class="menu-sub">

        @if (isset(Auth::user()->role) && Auth::user()->role === "cashier")
          <li class="menu-item">
            <a href="{{ url('cashier/invoice') }}" class="menu-link">
              <div data-i18n="Collapsed menu">Invoice List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ url('cashier/invoice/create') }}" class="menu-link">
              <div data-i18n="Collapsed menu">Add new</div>
            </a>
          </li>
        @else
          <li class="menu-item">
            <a href="{{ route('invoice.index') }}" class="menu-link">
              <div data-i18n="Collapsed menu">Invoice List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('invoice.create') }}" class="menu-link">
              <div data-i18n="Collapsed menu">Add new</div>
            </a>
          </li>
        @endif

      </ul>
    </li>


    <!-- Report -->
    <li class="menu-item  {{ request()->is('reports/*') || request()->is('report') }}">

      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-report-analytics"></i>
        <div data-i18n="Layouts">Report</div>
      </a>

      <ul class="menu-sub">

        <li class="menu-item">
          <a href="{{ route('report', 'invoice') }}" class="menu-link {{request()->is('reports/invoice')}}">
            <div data-i18n="Collapsed menu">Invoice</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('report', 'purchase') }}" class="menu-link {{request()->is('reports/invoice')}}">
            <div data-i18n="Collapsed menu">Purchase</div>
          </a>
        </li>

      </ul>

    </li>


    <!-- Apps & Pages -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Workers</span>
    </li>

    <li class="menu-item">
      <a href="{{route('user.index')}}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-user"></i>
        <div data-i18n="Email">Users</div>
      </a>
    </li>

  </ul>

</aside>
