
<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="init.php">UM System</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span><?php echo $_SESSION['user_name']; ?>
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="profile.php"><i class="fas fa-cogs"></i> Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../process/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="init.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="invoiceDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-chart-area"></i>
          <span>Invoices</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="invoiceDropdown">
          <a class="dropdown-item" href="#">Create Invoice</a>
          <a class="dropdown-item" href="#">Manage Invoices</a>
        </div>
      </li>
      <?php
        if($_SESSION['role']=="Admin"):
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-sitemap" aria-hidden="true"></i>
          <span>Categories</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
          <a class="dropdown-item" href="addCategory.php">Add Category</a>
          <a class="dropdown-item" href="manageCategories.php">Manage Categories</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="itemsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-list-alt"></i>
          <span>Items</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="itemsDropdown">
          <a class="dropdown-item" href="addItem.php">Add Item</a>
          <a class="dropdown-item" href="manageItems.php">Manage Items</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="customersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-users"></i>
          <span>Customers</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="customersDropdown">
          <a class="dropdown-item" href="addCustomer.php">Add Customer</a>
          <a class="dropdown-item" href="manageCustomers.php">Manage Customers</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="suppliersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-truck-moving"></i>
          <span>Suppliers</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="suppliersDropdown">
          <a class="dropdown-item" href="addSupplier.php">Add Supplier</a>
          <a class="dropdown-item" href="manageCategories.php">Manage Suppliers</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="usersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-users-cog"></i>
          <span>Users</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="usersDropdown">
          <a class="dropdown-item" href="addUser.php">Add User</a>
          <a class="dropdown-item" href="manageUsers.php">Manage Users</a>
        </div>
      </li>
      <?php 
      endif;
      ?>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#aboutModal">
          <i class="fas fa-info-circle"></i>
          <span>About</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="fas fa-cogs"></i>
          <span>Settings</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../process/logout.php">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">


