<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="{{ asset('public/admin/assets/images/faces/face8.jpg') }}" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Allen Moreno</p>
            <p class="designation">Premium user</p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category">Main Menu</li>
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
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

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-category" aria-expanded="false" aria-controls="ui-category">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Category</span>
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
        <a class="nav-link" data-toggle="collapse" href="#ui-division" aria-expanded="false" aria-controls="ui-division">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Districts</span>
          <i class="menu-arrow"></i>
        </a>
        <div  id="ui-division">
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

    </ul>
  </nav>