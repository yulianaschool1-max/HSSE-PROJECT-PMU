
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --navy: #102b3f;
            --navy-dark: #071e2e;
            --green: #07845c;
            --page: #f3f7fb;
            --border: #dce7f2;
            --muted: #70849b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--page);
            color: #243b53;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 17px 10px;
            overflow-y: auto;
            background: linear-gradient(180deg, var(--navy), var(--navy-dark));
            color: white;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 10px 22px;
            border-bottom: 1px solid #ffffff20;
        }

        .brand-mark {
            display: grid;
            place-items: center;
            flex-shrink: 0;
            width: 36px;
            height: 36px;
            border-radius: 9px;
            background: var(--green);
            color: white;
            font-size: 19px;
            font-weight: bold;
        }

        .brand strong {
            font-size: 14px;
            letter-spacing: .3px;
        }

        .brand small {
            display: block;
            margin-top: 4px;
            color: #c3d2df;
            font-size: 10px;
        }

        .menu-heading {
            margin: 23px 12px 9px;
            color: #91a8ba;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 12px;
            margin-bottom: 4px;
            border-radius: 6px;
            color: #e0e9f0;
            text-decoration: none;
            font-size: 12px;
            transition: background .2s;
        }

        .menu-link:hover {
            color: white;
            background: #ffffff12;
        }

        .menu-link.active {
            background: var(--green);
            color: white;
            font-weight: bold;
        }

        .menu-icon {
            display: inline-grid;
            place-items: center;
            width: 20px;
            flex-shrink: 0;
            font-size: 15px;
        }

        .sidebar-footer {
            margin-top: 22px;
            padding: 18px 12px 5px;
            border-top: 1px solid #ffffff20;
            color: #c3d2df;
            font-size: 11px;
            line-height: 1.8;
        }

        /* MAIN */
        .main-content {
            min-height: 100vh;
            margin-left: 250px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 17px 28px;
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .topbar-title {
            margin: 0;
            color: var(--navy);
            font-size: 15px;
            font-weight: bold;
        }

        .topbar-subtitle {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .content {
            padding: 27px 28px;
        }

        .page-title {
            margin: 0 0 7px;
            color: var(--navy);
            font-size: 24px;
            font-weight: bold;
        }

        .page-subtitle {
            margin-bottom: 24px;
            color: var(--muted);
            font-size: 12px;
        }

        /* FILTER */
        .filter-panel,
        .dashboard-card,
        .chart-panel,
        .table-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            box-shadow: 0 3px 12px #102b3f06;
        }

        .filter-panel {
            padding: 17px;
            margin-bottom: 20px;
        }

        .form-label {
            margin-bottom: 6px;
            color: #50657b;
            font-size: 11px;
            font-weight: bold;
        }

        .form-select,
        .form-control {
            min-height: 36px;
            border-color: var(--border);
            font-size: 12px;
        }

        /* KPI */
        .dashboard-card {
            position: relative;
            height: 100%;
            overflow: hidden;
        }

        .dashboard-card .card-body {
            padding: 20px;
        }

        .card-accent {
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--green);
        }

        .stat-label {
            margin: 0 0 10px;
            color: var(--muted);
            font-size: 12px;
        }

        .stat-number {
            margin-bottom: 8px;
            color: var(--navy);
            font-size: 29px;
            font-weight: bold;
        }

        .stat-note {
            margin: 0;
            color: var(--muted);
            font-size: 11px;
        }

        .stat-icon {
            position: absolute;
            top: 19px;
            right: 17px;
            display: grid;
            place-items: center;
            width: 36px;
            height: 36px;
            border-radius: 9px;
            background: #e6f5ef;
            color: var(--green);
            font-size: 18px;
        }

        .text-open {
            color: #d97706 !important;
        }

        .text-closed {
            color: var(--green) !important;
        }

        /* CHART AND TABLE */
        .section-heading {
            margin: 27px 0 13px;
            color: var(--navy);
            font-size: 15px;
            font-weight: bold;
        }

        .chart-panel {
            height: 100%;
            padding: 19px;
        }

        .panel-title {
            margin: 0 0 5px;
            color: var(--navy);
            font-size: 13px;
            font-weight: bold;
        }

        .panel-subtitle {
            margin-bottom: 17px;
            color: var(--muted);
            font-size: 11px;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 270px;
        }

        .table-panel {
            padding: 19px;
            margin-top: 20px;
        }

        .table {
            margin-bottom: 0;
            vertical-align: middle;
            font-size: 12px;
        }

        .table thead th {
            padding: 12px 10px;
            background: #f5f8fb;
            color: #5e7185;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 12px 10px;
            border-color: #edf1f5;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
        }

        .status-open {
            background: #fff2d8;
            color: #a16207;
        }

        .status-progress {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-closed {
            background: #d9f5e8;
            color: #087f5b;
        }

        .empty-state {
            padding: 28px 12px;
            color: var(--muted);
            text-align: center;
        }

        .footer-note {
            padding: 24px 0 5px;
            color: var(--muted);
            text-align: center;
            font-size: 10px;
        }

        @media (max-width: 1000px) {
            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
            }

            .content {
                padding: 20px;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: relative;
                width: 100%;
                max-height: 340px;
            }

            .main-content {
                margin-left: 0;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                padding: 17px;
            }

            .content {
                padding: 16px;
            }

            .chart-container {
                height: 230px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        <div class="brand-mark">✓</div>
        <div>
            <strong>HSSE PROJECT</strong>
            <small>PT Geo Dipa Energi · Dieng</small>
        </div>
    </div>

    <nav>
        <p class="menu-heading">Menu Utama</p>

        <a href="{{ route('dashboard') }}"
           class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="menu-icon">▦</span> Dashboard
        </a>

        <a href="{{ route('daily-work.index') }}"
           class="menu-link {{ request()->routeIs('daily-work.*') ? 'active' : '' }}">
            <span class="menu-icon">▤</span> Daily Work
        </a>

        <a href="{{ route('hsse-plan.index') }}"
            class="menu-link {{ request()->routeIs('hsse-plan.*') ? 'active' : '' }}">
             <span class="menu-icon">▣</span>
             <span>HSSE Plan</span>
        </a>

        <a href="{{ route('events.index') }}"
           class="menu-link {{ request()->routeIs('events.*') ? 'active' : '' }}">
            <span class="menu-icon">▧</span> Events
        </a>

        <a href="{{ route('inventory.index') }}"
           class="menu-link {{ request()->routeIs('inventory.*') ? 'active' : '' }}">
            <span class="menu-icon">▥</span> Inventory
        </a>

        <p class="menu-heading">Data HSSE</p>

        <a href="{{ route('workforce.index') }}"
           class="menu-link {{ request()->routeIs('workforce.*') ? 'active' : '' }}">
            <span class="menu-icon">♙</span> Workforce
        </a>

        <a href="{{ route('man-hours.index') }}"
           class="menu-link {{ request()->routeIs('man-hours.*') ? 'active' : '' }}">
            <span class="menu-icon">◷</span> Man Hours
        </a>

        <a href="{{ route('incident.index') }}"
           class="menu-link {{ request()->routeIs('incident.*') ? 'active' : '' }}">
            <span class="menu-icon">⚠</span> Incident
        </a>

        <a href="{{ route('issue-follow-up.index') }}"
           class="menu-link {{ request()->routeIs('issue-follow-up.*') ? 'active' : '' }}">
            <span class="menu-icon">☑</span> Issue &amp; Follow Up
        </a>

        <p class="menu-heading">Administrasi</p>

        <a href="{{ route('users.index') }}"
           class="menu-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <span class="menu-icon">⚙</span> User Management
        </a>
    </nav>

    <div class="sidebar-footer">
        HSSE Project<br>
        Unit Dieng · {{ date('Y') }}
    </div>
</aside>

<div class="main-content">

    <header class="topbar">
        <div>
            <p class="topbar-title">HSSE Monitoring System</p>
            <p class="topbar-subtitle">
                PT Geo Dipa Energi (Persero) · Unit Dieng
            </p>
        </div>

        <div class="d-flex align-items-center gap-3">
            <span class="text-secondary">Administrator</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-success btn-sm">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <main class="content">

        <h1 class="page-title">Dashboard</h1>
        <p class="page-subtitle">
            Ringkasan pemantauan kegiatan Health, Safety, Security, and Environment.
        </p>

        {{-- FILTER PERIODE --}}
        <section class="filter-panel">
            <form action="{{ route('dashboard') }}" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-4">
                        <label for="period" class="form-label">Periode</label>
                        <select name="period" id="period" class="form-select">
                            <option value="all"
                                {{ request('period', 'all') === 'all' ? 'selected' : '' }}>
                                Semua Periode
                            </option>
                            <option value="month"
                                {{ request('period') === 'month' ? 'selected' : '' }}>
                                Bulan Ini
                            </option>
                            <option value="year"
                                {{ request('period') === 'year' ? 'selected' : '' }}>
                                Tahun Ini
                            </option>
                        </select>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="component" class="form-label">Unit / Komponen</label>
                        <select name="component" id="component" class="form-select">
                            <option value="">Semua Unit</option>
                            @foreach (['PMU', 'Utility', 'JOTRE', 'BISMO'] as $unit)
                                <option value="{{ $unit }}"
                                    {{ request('component') === $unit ? 'selected' : '' }}>
                                    {{ $unit }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-4 d-flex gap-2">
                        <button type="submit" class="btn btn-success btn-sm">
                            Terapkan Filter
                        </button>
                        <a href="{{ route('dashboard') }}"
                           class="btn btn-outline-secondary btn-sm">
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </section>

        {{-- KPI --}}
        <section class="row g-3">

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="dashboard-card">
                    <div class="card-accent"></div>
                    <div class="card-body">
                        <div class="stat-icon">▤</div>
                        <p class="stat-label">Total Temuan</p>
                        <div class="stat-number">
                            {{ $totalTemuan ?? 0 }}
                        </div>
                        <p class="stat-note">Seluruh temuan yang tercatat</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="dashboard-card">
                    <div class="card-accent" style="background:#d97706"></div>
                    <div class="card-body">
                        <div class="stat-icon"
                             style="background:#fff2d8;color:#d97706">◷</div>
                        <p class="stat-label">Temuan Open</p>
                        <div class="stat-number text-open">
                            {{ $temuanOpen ?? 0 }}
                        </div>
                        <p class="stat-note">Temuan yang perlu ditindaklanjuti</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="dashboard-card">
                    <div class="card-accent"></div>
                    <div class="card-body">
                        <div class="stat-icon">✓</div>
                        <p class="stat-label">Temuan Closed</p>
                        <div class="stat-number text-closed">
                            {{ $temuanClosed ?? 0 }}
                        </div>
                        <p class="stat-note">Temuan yang telah diselesaikan</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="dashboard-card">
                    <div class="card-accent" style="background:#2563eb"></div>
                    <div class="card-body">
                        <div class="stat-icon"
                             style="background:#dbeafe;color:#2563eb">▣</div>
                        <p class="stat-label">Total Daily Work</p>
                        <div class="stat-number" style="color:#2563eb">
                            {{ $totalDailyWork ?? 0 }}
                        </div>
                        <p class="stat-note">Catatan kegiatan pekerjaan</p>
                    </div>
                </div>
            </div>

        </section>

        {{-- GRAFIK --}}
        <h2 class="section-heading">Ringkasan Grafik HSSE</h2>

        <section class="row g-3">
            <div class="col-12 col-xl-8">
                <div class="chart-panel">
                    <h3 class="panel-title">Temuan HSSE</h3>
                    <p class="panel-subtitle">
                        Perbandingan temuan berdasarkan status
                    </p>
                    <div class="chart-container">
                        <canvas id="issueChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="chart-panel">
                    <h3 class="panel-title">Status Temuan</h3>
                    <p class="panel-subtitle">
                        Komposisi status temuan
                    </p>
                    <div class="chart-container">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
        </section>

        {{-- ISSUE TERBARU --}}
        <section class="table-panel">
            <div class="d-flex flex-wrap justify-content-between
                        align-items-center gap-2 mb-3">
                <div>
                    <h3 class="panel-title">Issue &amp; Follow Up Terbaru</h3>
                    <p class="panel-subtitle mb-0">
                        Temuan terbaru ditampilkan lebih dahulu.
                    </p>
                </div>

                <a href="{{ route('issue-follow-up.index') }}"
                   class="btn btn-outline-success btn-sm">
                    Lihat Semua
                </a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Temuan</th>
                            <th>Penanggung Jawab</th>
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (($latestIssues ?? collect()) as $issue)
                            <tr>
                                <td>
                                    {{ $issue->date_found
                                        ? \Illuminate\Support\Carbon::parse($issue->date_found)->format('d/m/Y')
                                        : '-' }}
                                </td>
                                <td>{{ $issue->title ?? '-' }}</td>
                                <td>{{ $issue->responsible_person ?? '-' }}</td>
                                <td>
                                    {{ $issue->due_date
                                        ? \Illuminate\Support\Carbon::parse($issue->due_date)->format('d/m/Y')
                                        : '-' }}
                                </td>
                                <td>
                                    @php
                                        $status = strtolower($issue->status ?? 'open');
                                    @endphp

                                    <span class="status-badge
                                        {{ $status === 'closed'
                                            ? 'status-closed'
                                            : ($status === 'in progress'
                                                ? 'status-progress'
                                                : 'status-open') }}">
                                        {{ ucfirst($issue->status ?? 'Open') }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">
                                    Belum ada data temuan yang dikirim controller.
                                    Data akan tampil di sini setelah database terhubung.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        {{-- AKTIVITAS --}}
        <section class="row g-3 mt-1">
            <div class="col-12 col-xl-6">
                <div class="chart-panel">
                    <h3 class="panel-title">Aktivitas Daily Work</h3>
                    <p class="panel-subtitle">
                        Ringkasan jumlah pekerjaan berdasarkan status
                    </p>
                    <div class="chart-container">
                        <canvas id="dailyWorkChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-6">
                <div class="chart-panel">
                    <h3 class="panel-title">Informasi Sistem</h3>
                    <p class="panel-subtitle">
                        Ringkasan operasional
                    </p>

                    <div class="d-flex justify-content-between border-bottom py-3">
                        <span>Total Events</span>
                        <strong>{{ $totalEvents ?? 0 }}</strong>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-3">
                        <span>Total Inventory Items</span>
                        <strong>{{ $totalInventoryItems ?? 0 }}</strong>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-3">
                        <span>Total Workforce Records</span>
                        <strong>{{ $totalWorkforce ?? 0 }}</strong>
                    </div>

                    <div class="d-flex justify-content-between py-3">
                        <span>Total Incidents</span>
                        <strong>{{ $totalIncidents ?? 0 }}</strong>
                    </div>

                    <a href="{{ route('daily-work.index') }}"
                       class="btn btn-success btn-sm mt-3">
                        Buka Daily Work
                    </a>
                </div>
            </div>
        </section>

        <div class="footer-note">
            HSSE Monitoring System · PT Geo Dipa Energi (Persero) Unit Dieng
        </div>

    </main>
</div>

<script>
    /*
     * Grafik membaca variabel dari controller jika tersedia.
     * Jika controller belum mengirim data, nilai awal adalah nol.
     */
    const openCount = Number(@json($temuanOpen ?? 0));
    const closedCount = Number(@json($temuanClosed ?? 0));
    const dailyWorkTotal = Number(@json($totalDailyWork ?? 0));

    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    usePointStyle: true,
                    padding: 18,
                    font: { size: 11 }
                }
            }
        }
    };

    new Chart(document.getElementById('issueChart'), {
        type: 'bar',
        data: {
            labels: ['Open', 'Closed'],
            datasets: [{
                label: 'Jumlah Temuan',
                data: [openCount, closedCount],
                backgroundColor: ['#e8a23a', '#07845c'],
                borderRadius: 5,
                maxBarThickness: 70
            }]
        },
        options: {
            ...chartOptions,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });

    new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: {
            labels: ['Open', 'Closed'],
            datasets: [{
                data: [openCount, closedCount],
                backgroundColor: ['#e8a23a', '#07845c'],
                borderWidth: 0
            }]
        },
        options: {
            ...chartOptions,
            cutout: '66%'
        }
    });

    new Chart(document.getElementById('dailyWorkChart'), {
        type: 'line',
        data: {
            labels: ['Total Pekerjaan'],
            datasets: [{
                label: 'Jumlah Pekerjaan',
                data: [dailyWorkTotal],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.12)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            ...chartOptions,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 }
                }
            }
        }
    });
</script>

</body>
</html>
