<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    
    <title>Web Movies - @yield('title')</title>

    <style>
        :root {
            --bg-main: #0b0f19;
            --bg-card: #151c2c;
            --bg-sidebar: #0f1623;
            --accent-primary: #6366f1;
            --accent-gradient: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.08);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-main);
            color: var(--text-main);
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        .main-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        /* Top Header Navbar */
        .top-navbar {
            background: rgba(15, 22, 35, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            padding: 0.75rem 1.5rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .brand-logo {
            font-weight: 800;
            font-size: 1.25rem;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-dropdown-btn {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            border-radius: 50px;
            padding: 0.4rem 1rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .user-dropdown-btn:hover, .user-dropdown-btn:focus {
            background: #1e293b;
            color: #fff;
            border-color: rgba(99, 102, 241, 0.4);
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.2);
        }

        .dropdown-menu-dark-custom {
            background: #161e2e;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            padding: 0.5rem;
            width: 260px;
        }

        .dropdown-menu-dark-custom .dropdown-item {
            color: var(--text-main);
            border-radius: 8px;
            padding: 0.6rem 0.8rem;
            transition: all 0.2s ease;
        }

        .dropdown-menu-dark-custom .dropdown-item:hover {
            background: rgba(99, 102, 241, 0.15);
            color: #818cf8;
        }

        /* Layout Grid */
        .content-wrapper {
            flex: 1;
            margin: 0;
        }

        /* Sidebar Styles */
        .sidebar-container {
            background-color: var(--bg-sidebar);
            border-right: 1px solid var(--border-color);
            min-height: calc(100vh - 65px - 50px);
            padding: 1.5rem 1rem;
        }

        .sidebar-heading {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-muted);
            margin-bottom: 0.75rem;
            padding-left: 0.75rem;
        }

        .nav-pills-custom .nav-link {
            color: var(--text-muted);
            font-weight: 600;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            margin-bottom: 0.4rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.25s ease;
        }

        .nav-pills-custom .nav-link:hover {
            color: var(--text-main);
            background: rgba(255, 255, 255, 0.04);
            transform: translateX(3px);
        }

        .nav-pills-custom .nav-link.active {
            color: #ffffff;
            background: var(--accent-gradient);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
        }

        /* Main Content Container */
        .main-content {
            background-color: var(--bg-main);
            padding: 2rem;
        }

        /* Card Component */
        .card-custom {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-custom .card-header {
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* DataTable Dark Theme */
        .dataTables_wrapper {
            color: var(--text-main) !important;
            padding: 1rem 0;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: var(--text-muted) !important;
        }

        .dataTables_wrapper .dataTables_filter input {
            background: #0f1623;
            border: 1px solid var(--border-color);
            color: #fff;
            border-radius: 8px;
            padding: 0.35rem 0.75rem;
        }

        .dataTables_wrapper .dataTables_length select {
            background: #0f1623;
            border: 1px solid var(--border-color);
            color: #fff;
            border-radius: 8px;
            padding: 0.25rem 0.5rem;
        }

        table.dataTable {
            border-collapse: separate !important;
            border-spacing: 0 0.5rem !important;
            width: 100% !important;
        }

        table.dataTable thead th {
            border-bottom: 1px solid var(--border-color) !important;
            color: var(--text-muted);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.05em;
            padding: 1rem !important;
        }

        table.dataTable tbody tr {
            background-color: rgba(255, 255, 255, 0.02) !important;
            transition: all 0.2s ease;
        }

        table.dataTable tbody tr:hover {
            background-color: rgba(99, 102, 241, 0.08) !important;
            transform: translateY(-2px);
        }

        table.dataTable tbody td {
            padding: 0.9rem 1rem !important;
            border-top: 1px solid var(--border-color) !important;
            border-bottom: 1px solid var(--border-color) !important;
            vertical-align: middle !important;
        }

        .page-item.active .page-link {
            background-color: #6366f1;
            border-color: #6366f1;
        }

        .page-link {
            background-color: #161e2e;
            border-color: var(--border-color);
            color: var(--text-muted);
        }

        /* Footer */
        .footer-custom {
            background: var(--bg-sidebar);
            border-top: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container-fluid main-container">

        <!-- Top Header Navigation -->
        <div class="top-navbar d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <i class="bi bi-film"></i> WEB MOVIES
            </div>

            <div class="dropdown">
                <button class="btn user-dropdown-btn dropdown-toggle d-flex align-items-center gap-2" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://bmw.astra.co.id/wp-content/uploads/2023/07/BMW.svg_.png"
                        height="26" width="26" style="object-fit: contain; background: white; border-radius: 50%; padding: 2px;" alt="User Avatar">
                    <span>User</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-dark-custom" aria-labelledby="dropdownMenuButton">
                    <div class="dropdown-item d-flex align-items-center p-2 mb-1">
                        <img src="https://bmw.astra.co.id/wp-content/uploads/2023/07/BMW.svg_.png"
                            height="42" width="42" class="rounded-circle mr-3 bg-white p-1" alt="Profile">
                        <div>
                            <h6 class="mb-0 text-white font-weight-bold">BMW</h6>
                            <small class="text-muted"><i class="bi bi-clock-history"></i> Pkl 13.00 WIB</small>
                        </div>
                    </div>
                    <div class="dropdown-divider border-secondary"></div>
                    <a class="dropdown-item" href="#"><i class="bi bi-gear mr-2"></i> Change Password</a>
                    <a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
                </div>
            </div>
        </div>

        <!-- Sidebar dan Content -->
        <div class="row content-wrapper">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar-container">
                <div class="sidebar-heading">Menu Utama</div>
                <div class="nav flex-column nav-pills-custom" role="tablist">
                    <a class="nav-link {{ $key == 'home' ? 'active' : '' }}" href="/">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                    <a class="nav-link {{ $key == 'Movie' ? 'active' : '' }}" href="/movie">
                        <i class="bi bi-film"></i> Data Movie
                    </a>
                    <a class="nav-link {{ $key == 'Kategori' ? 'active' : '' }}" href="/kategori">
                        <i class="bi bi-grid-fill"></i> Data Kategori
                    </a>
                    <a class="nav-link {{ $key == 'genre' ? 'active' : '' }}" href="/genre">
                        <i class="bi bi-tags-fill"></i> Data Genre
                    </a>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-md-9 col-lg-10 main-content">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-custom text-center">
            <medium>template by Yoga Christian</medium>
        </div>

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    
    @yield('scripts')
</body>

</html>
