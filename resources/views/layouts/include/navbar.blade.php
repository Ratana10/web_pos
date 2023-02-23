<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Navbar</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('user.index')}}">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('product.index')}}">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('order.index')}}">Cashier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Transactions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('supplier.index')}}">Suppliers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Customers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Incoming</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('product.barcode')}}"><i class="fa fa-barcode"></i>Barcode</a>
          </li>
        </ul>

        <a href="{{ route('user.logout') }}" class="btn btn-outline-success">Logout</a>
      </div>
    </div>
  </nav>
