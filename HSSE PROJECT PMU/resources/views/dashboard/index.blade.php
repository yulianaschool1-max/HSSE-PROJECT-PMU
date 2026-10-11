
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | HSSE Project</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        :root {
            --navy: #123047;
            --green: #198754;
            --page-bg: #f1f5f9;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--page-bg);
            font-family: Arial, sans-serif;
            color: #263746;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            padding: 24px 16px;
            overflow-y: auto;
            background: var(--navy);
            color: white;
        }

        .brand {
            padding: 0 10px 22px;
            border-bottom: 1px solid #ffffff26;
        }

        .brand h1 {
            margin: 0 0 8px;
            font-size: 20px;
            font-weight: bold;
        }

        .brand p {
            margin: 0;
            color: #cbd8e1;
            font-size: 11px;
            line-height: 1.7;
        }

        .menu-heading {
            margin: 24px 10px 10px;
            color: #9fb3c1;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .menu-link {
            display: flex;
            gap: 11px;
            align-items: center;
            margin-bottom: 5px;
            padding: 12px;
            border-radius: 7px;
            color: #e2eaf0;
            font-size: 13px;
            text-decoration: none;
        }

        .menu-link:hover {
            background: #1d4057;
            color: white;
        }

        .menu-link.active {
            background: var(--green);
            color: white;
            font-weight: bold;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            margin-top: 25px;
            padding: 15px 10px 0;
            border-top: 1px solid #ffffff26;
            color: #cbd8e1;
            font-size: 11px;
        }

        /* KONTEN UTAMA */
        .main-content {
            min-height: 100vh;
            margin-left: 250px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 18px 30px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .topbar-title {
            margin: 0;
            font-size: 15px;
            font-weight: bold;
        }

        .topbar-subtitle {
            margin: 4px 0 0;
            color: #718096;
            font-size: 11px;
        }

        .content {
            padding: 30px;
        }

        .page-title {
            margin-bottom: 8px;
            font-size: 25px;
            font-weight: bold;
        }

        .page-subtitle {
            margin-bottom: 26px;
            color: #718096;
            font-size: 13px;
        }

        /* KARTU STATISTIK */
        .dashboard-card {
            height: 100%;
            border: 1px solid #e6ebef;
            border-radius: 12px;
            background: white;
        }

        .stat-label {
            margin-bottom: 12px;
            color: #64748b;
            font-size: 12px;
        }

        .stat-number {
            margin-bottom: 8px;
            font-size: 32px;
            font-weight: bold;
        }

        .stat-note {
            margin: 0;
            color: #718096;
            font-size: 11px;
        }

        .card-accent {
            width: 42px;
            height: 4px;
            margin-bottom: 18px;
            border-radius: 5px;
        }

        /* PANEL GRAFIK */
        .panel {
            height: 100%;
            padding: 22px;
            border: 1px solid #e6ebef;
            border-radius: 12px;
            background: white;
        }

        .panel-title {
            margin-bottom: 6px;
            font-size: 15px;
            font-weight: bold;
        }

        .panel-subtitle {
            margin-bottom: 20px;
            color: #718096;
            font-size: 11px;
        }

        .empty-state {
            padding: 30px 10px;
            color: #718096;
            font-size: 12px;
            text-align: center;
        }

        .footer {
            margin-top: 28px;
            color: #718096;
            font-size: 11px;
            text-align: center;
        }

        /* TAMPILAN MOBILE */
        @media (max-width: 768px) {
            .sidebar {
                position: static;
                width: 100%;
            }

            .main-content {
                margin-left: 0;
            }

            .topbar {
                padding: 16px 20px;
            }

            .content {
                padding: 20px 15px;
            }
        }
    </style>
</head>

<body>

    <!-- MENU SEBELAH KIRI -->
    <aside class="sidebar">
        <div class="brand">
            <h1>HSSE PROJECT</h1>
            <p>PT Geo Dipa Energi (Persero)</p>
            <p>Unit Dieng</p>
        </div>

        <nav aria-label="Menu utama">
            <p class="menu-heading">Menu Utama</p>

            <a href="{{ route('dashboard') }}"
               class="menu-link active">
                <span class="menu-icon">▦</span>
                Dashboard
            </a>

            <a href="{{ route('daily-work.index') }}"
               class="menu-link">
                <span class="menu-icon">▤</span>
                Daily Work
            </a>

            <a href="#" class="menu-link">
                <span class="menu-icon">◷</span>
                HSSE Plan
            </a>

            <a href="#" class="menu-link">
                <span class="menu-icon">▣</span>
                Events
            </a>

            <a href="#" class="menu-link">
                <span class="menu-icon">▧</span>
                Inventory
            </a>

            <p class="menu-heading">Monitoring HSSE</p>

            <a href="#" class="menu-link">
                <span class="menu-icon">♙</span>
                Workforce
            </a>

            <a href="#" class="menu-link">
                <span class="menu-icon">◷</span>
                Man Hours
            </a>

            <a href="#" class="menu-link">
                <span class="menu-icon">⚠</span>
                Incident
            </a>

            <a href="#" class="menu-link">
                <span class="menu-icon">☑</span>
                Issue &amp; Follow Up
            </a>

            <p class="menu-heading">Administrasi</p>

            <a href="#" class="menu-link">
                <span class="menu-icon">⚙</span>
                User Management
            </a>
        </nav>

        <div class="sidebar-footer">
            HSSE Project<br>
            Unit Dieng · {{ date('Y') }}
        </div>
    </aside>

    <!-- KONTEN SEBELAH KANAN -->
    <div class="main-content">

        <header class="topbar">
            <div>
                <p class="topbar-title">HSSE Monitoring System</p>
                <p class="topbar-subtitle">
                    PT Geo Dipa Energi (Persero) · Unit Dieng
                </p>
            </div>

            <div class="d-flex align-items-center gap-3">
                <span class="small text-secondary">
                    Administrator
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="btn btn-outline-success btn-sm">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <main class="content">
            <h2 class="page-title">Dashboard</h2>

            <p class="page-subtitle">
                Selamat datang di HSSE Project Monitoring System.
                Berikut ringkasan pemantauan HSSE.
            </p>

            <!-- RINGKASAN TEMUAN -->
            <section class="row g-3">

                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body p-4">
                            <div class="card-accent bg-success"></div>
                            <p class="stat-label">Total Temuan</p>
                            <div class="stat-number text-success">0</div>
                            <p class="stat-note">Seluruh temuan HSSE</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body p-4">
                            <div class="card-accent bg-warning"></div>
                            <p class="stat-label">Temuan Open</p>
                            <div class="stat-number text-warning">0</div>
                            <p class="stat-note">Perlu tindak lanjut</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card dashboard-card shadow-sm">
                        <div class="card-body p-4">
                            <div class="card-accent bg-primary"></div>
                            <p class="stat-label">Temuan Closed</p>
                            <div class="stat-number text-primary">0</div>
                            <p class="stat-note">Telah diselesaikan</p>
                        </div>
                    </div>
                </div>

            </section>

            <!-- GRAFIK DAN TINDAK LANJUT -->
            <section class="row g-3 mt-1">

                <div class="col-12 col-xl-7">
                    <div class="panel shadow-sm">
                        <h3 class="panel-title">Aktivitas HSSE</h3>
                        <p class="panel-subtitle">
                            Grafik aktivitas akan ditampilkan di sini.
                        </p>

                        <div class="empty-state">
                            Grafik menunggu data dari database.
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-5">
                    <div class="panel shadow-sm">
                        <h3 class="panel-title">
                            Issue &amp; Follow Up
                        </h3>

                        <p class="panel-subtitle">
                            Ringkasan tindak lanjut temuan.
                        </p>

                        <div class="empty-state">
                            Belum ada data tindak lanjut.
                        </div>
                    </div>
                </div>

            </section>

            <footer class="footer">
                HSSE Project &copy; {{ date('Y') }} · Unit Dieng
            </footer>
        </main>
    </div>

</body>
</html>
