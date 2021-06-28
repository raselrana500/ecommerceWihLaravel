<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{ asset('public/admin/assets/images/faces/face8.jpg') }}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Welcome <br/>{{ auth::user()->name }}</p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">Main Menu</li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" class="collapsed" href="#ui-product" aria-expanded="false" aria-controls="ui-product">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Product</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-product">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.product.create') }}">Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.pages.product.index') }}">Manage Product</a>
            </li>
          </ul>
        </div>
      </li>
      </li>
      <!-- orders -->
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" class="collapsed" href="#ui-order" aria-expanded="false" aria-controls="ui-order">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Orders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-order">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.orders') }}">Manage Orders</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" class="collapsed" href="#ui-sliders" aria-expanded="false" aria-controls="ui-sliders">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Sliders</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-sliders">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.sliders') }}">Manage Sliders</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-category" aria-expanded="false" aria-controls="ui-category">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.category.create') }}">Add Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.pages.category.index') }}">Manage Category</a>
            </li>
          </ul>
        </div>
      </li>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-brand" aria-expanded="false" aria-controls="ui-brand">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">brand</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-brand">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.brand.create') }}">Add brand</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.pages.brand.index') }}">Manage brand</a>
            </li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-division" aria-expanded="false" aria-controls="ui-division">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Division</span>
          <i class="menu-arrow"></i>
        </a>
        <div  id="ui-division">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.divisions.create') }}">Add Division</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.pages.divisions.index') }}">Manage Division</a>
            </li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-districts" aria-expanded="false" aria-controls="ui-districts">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Districts</span>
          <i class="menu-arrow"></i>
        </a>
        <div  id="ui-districts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.districts.create') }}">Add Districts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.pages.districts.index') }}">Manage Districts</a>
            </li>
          </ul>
        </div>
      </li>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#ui-division">
          <form class="form-inline" action="{{ route('admin.logout') }}" method="post">
          @csrf

          <input type="submit" value="Logout Now" class="btn btn-danger">

          </form>
        </a>
      </li>

    </ul>
  </nav>