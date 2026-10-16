<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'InventoryPro') - Inventory Management</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f6fb;
            color: #202b3c;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .app {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 245px;
            background: #17243b;
            color: #b9c4d6;
            padding: 27px 17px;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 10px 35px;
            color: white;
        }

        .brand-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #4776e6;
            font-size: 21px;
        }

        .brand h2 {
            font-size: 18px;
            letter-spacing: .3px;
        }

        .brand small {
            display: block;
            margin-top: 3px;
            color: #93a4bd;
            font-size: 11px;
            font-weight: 400;
        }

        .menu-label {
            margin: 12px 12px 10px;
            color: #8190a8;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 13px;
            margin-bottom: 5px;
            border-radius: 9px;
            font-size: 13px;
            transition: .2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #2b3b57;
            color: white;
        }

        .nav-link.active {
            border-left: 3px solid #6792ff;
        }

        .nav-icon {
            width: 21px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-bottom {
            margin-top: 40px;
            padding: 16px 10px;
            border-top: 1px solid #30405a;
            font-size: 12px;
            color: #aab8cc;
        }

        .main {
            min-width: 0;
            flex: 1;
        }

        .topbar {
            min-height: 76px;
            background: white;
            border-bottom: 1px solid #e9edf4;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 17px 32px;
            gap: 15px;
        }

        .topbar h1 {
            font-size: 21px;
            color: #202b3c;
        }

        .topbar p {
            color: #8b95a7;
            font-size: 12px;
            margin-top: 5px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
        }

        .avatar {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e6edff;
            color: #4168c8;
            font-weight: 700;
        }

        .profile small {
            display: block;
            color: #8993a5;
            margin-top: 4px;
        }

        .content {
            padding: 28px 32px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 24px;
        }

        .page-heading h2 {
            font-size: 20px;
        }

        .page-heading p {
            margin-top: 6px;
            color: #8791a2;
            font-size: 13px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 26px;
        }

        .stat-card {
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 13px;
            padding: 20px;
            box-shadow: 0 3px 12px rgba(30, 50, 85, .025);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .stat-label {
            color: #788498;
            font-size: 12px;
        }

        .stat-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            font-size: 18px;
        }

        .blue { background: #e9efff; }
        .green { background: #e4f8ee; }
        .orange { background: #fff0df; }
        .red { background: #ffe8e8; }

        .stat-value {
            margin-top: 16px;
            font-size: 27px;
            font-weight: 700;
            color: #202b3c;
        }

        .stat-note {
            margin-top: 7px;
            font-size: 11px;
            color: #929bad;
        }

        .panel {
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 13px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(30, 50, 85, .025);
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            padding: 21px 23px;
            border-bottom: 1px solid #edf0f5;
        }

        .panel-header h3 {
            font-size: 15px;
        }

        .panel-header p {
            font-size: 12px;
            color: #929bad;
            margin-top: 5px;
        }

        .toolbar {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-input {
            width: 220px;
            max-width: 100%;
            padding: 10px 12px;
            border: 1px solid #e1e6ef;
            border-radius: 8px;
            outline: none;
            font-size: 12px;
        }

        .search-input:focus,
        .form-control:focus {
            border-color: #668bf0;
            box-shadow: 0 0 0 3px #eaf0ff;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            padding: 10px 14px;
            border: 0;
            border-radius: 8px;
            background: #4776e6;
            color: white;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
        }

        .btn:hover {
            background: #345fcb;
        }

        .btn-light {
            background: #eef2fa;
            color: #43516a;
        }

        .btn-light:hover {
            background: #e0e7f4;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        th {
            padding: 14px 20px;
            background: #fafbfe;
            color: #8993a5;
            text-align: left;
            font-size: 10px;
            letter-spacing: .5px;
            font-weight: 700;
        }

        td {
            padding: 16px 20px;
            border-bottom: 1px solid #f0f2f7;
            font-size: 12px;
            color: #536076;
        }

        tbody tr:hover {
            background: #fafbff;
        }

        .product-name {
            font-weight: 600;
            color: #29364b;
        }

        .product-sku {
            color: #929bad;
            font-size: 11px;
            margin-top: 5px;
        }

        .category-badge {
            display: inline-block;
            background: #eef2ff;
            color: #536bc0;
            border-radius: 6px;
            padding: 6px 9px;
            font-size: 11px;
        }

        .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
        }

        .status-safe {
            background: #e5f8ee;
            color: #238653;
        }

        .status-low {
            background: #fff0dc;
            color: #b96c11;
        }

        .status-empty {
            background: #ffe7e7;
            color: #c33c3c;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .action-link {
            color: #4776e6;
            font-size: 11px;
            font-weight: 600;
        }

        .action-link.delete {
            color: #d34c4c;
        }

        .pagination {
            padding: 18px 22px;
            font-size: 12px;
            color: #647086;
        }

        .pagination nav > div:first-child {
            margin-bottom: 10px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 7px 10px;
            margin-right: 3px;
            border: 1px solid #e3e8f1;
            border-radius: 6px;
        }

        .alert {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #e3f8eb;
            color: #207847;
            font-size: 13px;
        }

        .form-panel {
            max-width: 800px;
            padding: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 19px;
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #43516a;
        }

        .form-control {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #dfe5ef;
            border-radius: 8px;
            outline: none;
            font: inherit;
            font-size: 13px;
            background: white;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .error {
            color: #cf3f3f;
            font-size: 11px;
            margin-top: 6px;
        }

        .empty-state {
            padding: 45px 20px;
            text-align: center;
            color: #8a95a7;
            font-size: 13px;
        }

        .empty-state strong {
            display: block;
            color: #3b475c;
            margin-bottom: 7px;
            font-size: 15px;
        }

        .footer {
            padding: 23px 32px;
            color: #929bad;
            font-size: 11px;
            text-align: center;
        }

        @media (max-width: 1050px) {
            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .sidebar {
                width: 210px;
            }

            .content {
                padding: 24px 20px;
            }

            .topbar {
                padding: 17px 20px;
            }
        }

        @media (max-width: 700px) {
            .app {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 15px;
            }

            .brand {
                padding-bottom: 15px;
            }

            .menu-label,
            .sidebar-bottom {
                display: none;
            }

            .sidebar nav {
                display: flex;
                gap: 5px;
                overflow-x: auto;
            }

            .nav-link {
                flex-shrink: 0;
                margin: 0;
                padding: 10px;
            }

            .topbar {
                min-height: 65px;
            }

            .topbar h1 {
                font-size: 17px;
            }

            .profile > div:last-child {
                display: none;
            }

            .stats {
                gap: 10px;
            }

            .stat-card {
                padding: 14px;
            }

            .stat-value {
                font-size: 23px;
            }

            .panel-header {
                padding: 17px;
            }

            .toolbar,
            .search-input {
                width: 100%;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>
<div class="app">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">▦</div>
            <div>
                <h2>InventoryPro</h2>
                <small>Management System</small>
            </div>
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <nav>
            <a href="{{ route('products.index') }}"
               class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                <span class="nav-icon">▦</span>
                Dashboard & Produk
            </a>

            <a href="{{ route('categories.index') }}"
               class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <span class="nav-icon">▤</span>
                Kategori
            </a>

            <a href="{{ route('suppliers.index') }}"
               class="nav-link {{ request()->routeIs('suppliers.*') ? 'active' : '' }}">
                <span class="nav-icon">♙</span>
                Supplier
            </a>

             <a href="{{ route('stock-movements.index') }}"
             class="nav-link {{ request()->routeIs('stock-movements.*') ? 'active' : '' }}"
                title="Pergerakan Stok">
                 <span class="nav-icon">⇅</span>
                 Pergerakan Stok
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div>Inventory Management</div>
            <div style="margin-top:6px;color:#8190a8">Laravel Application</div>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <h1>@yield('page-title', 'Dashboard')</h1>
                <p>Sistem Informasi Manajemen Inventaris</p>
            </div>

            <div class="profile">
                <div class="avatar">A</div>
                <div>
                    <strong>Administrator</strong>
                    <small>Pengelola Sistem</small>
                </div>
            </div>
        </header>

        <section class="content">
            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert" style="background:#ffe8e8;color:#b42323;">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </section>

        <footer class="footer">
            InventoryPro &copy; {{ date('Y') }} · Inventory Management System
        </footer>
    </main>
</div>
</body>
</html>