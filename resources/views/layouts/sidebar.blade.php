<aside id="sidebar">
  <div class="d-flex">
      <button class="toggle-btn" type="button">
          <i class="lni lni-grid-alt"></i>
      </button>
      <div class="sidebar-logo">
          <a href="{{ url('/') }}">Praktikum 12</a>
      </div>
  </div>
  <ul class="sidebar-nav">
      <li class="sidebar-item">
          <a href="{{ url('/') }}" class="sidebar-link">
              <i class="lni lni-user"></i>
              <span>Dashboard</span>
          </a>
      </li>
      <li class="sidebar-item">
          <a href="{{ route('product.index') }}" class="sidebar-link">
              <i class="lni lni-agenda"></i>
              <span>Product</span>
          </a>
      </li> 
      <li class="sidebar-item">
          <a href="{{ route('supplier.index') }}" class="sidebar-link">
              <i class="lni lni-layout"></i>
              <span>Supplier</span>
          </a>
      </li> 
      <li class="sidebar-item">
          <a href="{{ route('order.index') }}" class="sidebar-link">
              <i class="lni lni-layout"></i>
              <span>Order</span>
          </a>
      </li>  
      <li class="sidebar-item">
          <a href="#" class="sidebar-link">
              <i class="lni lni-popup"></i>
              <span>Order Detail</span>
          </a>
      </li>  
  </ul>
  <div class="sidebar-footer">
      <a href="#" class="sidebar-link">
          <i class="lni lni-exit"></i>
          <span>Logout</span>
      </a>
  </div>
</aside>