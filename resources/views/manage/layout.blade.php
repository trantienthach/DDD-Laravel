<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('manager.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <span class="nav-link">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </span>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <h1>Add more property</h1>
                        <form class="g-3" action="{{ route('booking.add') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="col-md-6">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="col-md-6">
                              <label for="description" class="form-label">Description</label>
                              <input type="text" name="description" class="form-control" id="description">
                            </div>
                            <div class="col-6">
                              <label for="price" class="form-label">Price</label>
                              <input type="number" name="price" class="form-control" id="price" placeholder="1234 Main St">
                            </div>
                            <div class="col-6">
                              <label for="type" class="form-label">Type</label>
                              <select class="form-select" name="type" aria-label="Default select example">
                                <option value="">Open this select menu</option>
                                <option value="1">Villa</option>
                                <option value="2">Apartment</option>
                                <option value="3">Penthouse</option>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <label for="bedrooms" class="form-label">Bedrooms</label>
                              <input type="number" name="bedrooms" class="form-control" id="bedrooms">
                            </div>
                            <div class="col-md-6">
                                <label for="bathrooms" class="form-label">Bathrooms</label>
                                <input type="number" name="bathrooms" class="form-control" id="bathrooms">
                              </div>
                              <div class="col-md-6">
                                <label for="area" class="form-label">Area</label>
                                <input type="text" name="area" class="form-control" id="area">
                              </div>
                              <div class="col-md-6">
                                <label for="floor" class="form-label">Floor</label>
                                <input type="text" name="floor" class="form-control" id="floor">
                              </div>
                              <div class="col-md-6">
                                <label for="parking" class="form-label">Parking</label>
                                <input type="text" name="parking" class="form-control" id="parking">
                              </div>
                            <div class="col-md-2">
                                <label for="file" class="form-label">Image</label>
                                <input type="file" name="file" class="form-control" id="file">
                              </div>
                            <div class="col-12 mt-2">
                              <button type="submit" class="btn btn-primary">add</button>
                            </div>
                          </form>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
