
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HSSE Plan - KPI Kontraktor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #102b3b;
            --green: #07976b;
            --green-dark: #087c5c;
            --blue: #3987f5;
            --orange: #ff9d22;
            --red: #fa4b55;
            --purple: #9150ed;
            --text: #152d47;
            --muted: #6e8198;
            --line: #dce7f2;
            --background: #f4f8fd;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            color: var(--text);
            background: var(--background);
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 13px;
        }

        .sidebar {
            width: 245px;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 1000;
            overflow-y: auto;
            color: white;
            background: linear-gradient(180deg, #102a3a, #0b2030);
            transition: transform .25s;
        }

        .brand {
            padding: 18px 20px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 36px;
            height: 40px;
            border-radius: 9px;
            display: grid;
            place-items: center;
            background: var(--green);
            font-size: 22px;
        }

        .brand-title { font-weight: 800; font-size: 16px; }
        .brand-subtitle { font-size: 10px; opacity: .85; line-height: 1.5; }
        .nav-menu { padding: 0 8px; }

        .nav-link-custom {
            color: #e5eef5;
            padding: 12px 15px;
            margin-bottom: 4px;
            border-radius: 6px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 13px;
            font-size: 13px;
            transition: .2s;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: white;
            background: linear-gradient(90deg, #079b70, #078760);
        }

        .nav-link-custom i { font-size: 16px; width: 18px; }
        .nav-chevron { margin-left: auto; }

        .submenu {
            margin: 2px 0 10px 22px;
            border-left: 2px solid #294555;
            padding-left: 8px;
        }

        .submenu .nav-link-custom { padding: 9px 12px; font-size: 12px; }

        .sidebar-footer {
            margin: 45px 22px 25px;
            color: #bdeee4;
            font-size: 15px;
            line-height: 1.5;
        }

        .main {
            margin-left: 245px;
            min-height: 100vh;
            transition: margin-left .25s;
        }

        .topbar {
            height: 46px;
            background: rgba(255,255,255,.95);
            border-bottom: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 22px;
        }

        .icon-button {
            background: transparent;
            border: 0;
            color: var(--navy);
            font-size: 21px;
            padding: 3px 6px;
        }

        .user-info { display: flex; align-items: center; gap: 9px; }

        .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #e1edf7;
            font-size: 17px;
        }

        .page { padding: 14px 17px 24px; max-width: 1800px; margin: auto; }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 12px;
        }

        .heading-left { display: flex; gap: 13px; align-items: center; }

        .heading-icon {
            height: 39px;
            width: 39px;
            border-radius: 7px;
            display: grid;
            place-items: center;
            background: var(--green);
            color: white;
            font-size: 24px;
        }

        .page-title { margin: 0; font-size: 21px; font-weight: 750; }
        .breadcrumb-text { font-size: 11px; color: var(--muted); margin-top: 4px; }
        .breadcrumb-text span { margin: 0 6px; color: #9eb0c2; }

        .btn-green {
            background: var(--green);
            border: 1px solid var(--green);
            color: white;
        }

        .btn-green:hover { background: var(--green-dark); color: white; }
        .btn-outline-green { border: 1px solid #91cdb8; color: var(--green-dark); background: white; }
        .btn-outline-green:hover { background: #eaf8f2; color: var(--green-dark); }
        .btn-sm { font-size: 12px; padding: 7px 12px; }

        .filter-row {
            display: grid;
            grid-template-columns: 225px 160px 170px minmax(160px,1fr) 140px;
            gap: 7px;
            margin-bottom: 11px;
        }

        .filter-row .form-control,
        .filter-row .form-select,
        .filter-row .input-group-text {
            min-height: 35px;
            border-color: var(--line);
            font-size: 11px;
        }

        .input-group-text { background: white; color: var(--muted); }

        .card-custom {
            border: 1px solid var(--line);
            border-radius: 7px;
            background: white;
            box-shadow: 0 1px 3px rgba(20,54,83,.025);
            min-width: 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5,minmax(0,1fr));
            gap: 10px;
            margin-bottom: 10px;
        }

        .stat-card { padding: 13px; display: flex; align-items: center; gap: 12px; min-height: 96px; }

        .stat-icon {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: white;
            font-size: 23px;
        }

        .bg-blue { background: var(--blue); }
        .bg-green { background: #12a879; }
        .bg-orange { background: var(--orange); }
        .bg-red { background: var(--red); }
        .bg-purple { background: var(--purple); }
        .stat-label { font-size: 11px; color: #425b76; }
        .stat-value { font-size: 25px; font-weight: 750; line-height: 1.35; }
        .stat-caption { font-size: 10px; color: var(--muted); }

        .charts-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr 1.05fr;
            gap: 10px;
            margin-bottom: 10px;
        }

        .chart-card { padding: 12px; height: 185px; }
        .card-title { font-size: 13px; font-weight: 750; margin: 0 0 10px; }
        .chart-box { height: 140px; position: relative; }
        .donut-layout { display: grid; grid-template-columns: 44% 56%; align-items: center; height: 140px; }
        .legend-list { display: flex; flex-direction: column; gap: 14px; font-size: 10px; }
        .legend-item { display: flex; align-items: center; gap: 7px; }
        .legend-dot { width: 11px; height: 11px; border-radius: 50%; flex-shrink: 0; }
        .legend-count { margin-left: auto; white-space: nowrap; }

        .table-card { padding: 11px 12px 8px; margin-bottom: 10px; }
        .table-toolbar { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 8px; }
        .table-toolbar .card-title { font-size: 15px; margin: 0; }
        .toolbar-controls { display: flex; gap: 7px; align-items: center; }
        .toolbar-controls .form-control,
        .toolbar-controls .form-select { font-size: 11px; min-height: 30px; }
        .toolbar-controls .form-control { width: 195px; }

        .table-responsive { border: 1px solid #edf2f7; border-radius: 5px; }
        .kpi-table { width: 100%; border-collapse: collapse; font-size: 10.5px; white-space: nowrap; }
        .kpi-table th {
            background: #edf4fb;
            color: #152d47;
            font-weight: 700;
            padding: 8px 7px;
            border: 1px solid #e2ebf4;
        }

        .kpi-table td { padding: 5px 7px; border: 1px solid #e8eff6; vertical-align: middle; }
        .kpi-table tbody tr { cursor: pointer; }
        .kpi-table tbody tr:hover { background: #f3f9ff; }
        .kpi-table tbody tr.selected-row { background: #eaf6f1; }
        .text-leading { color: #1769d2; }
        .text-lagging { color: #8551d9; }

        .status-badge {
            display: inline-block;
            min-width: 78px;
            text-align: center;
            padding: 3px 7px;
            border-radius: 4px;
            border: 1px solid;
            font-size: 10px;
        }

        .status-achieved { color: #07875f; background: #e0f7ed; border-color: #91dabb; }
        .status-progress { color: #b56600; background: #fff3dc; border-color: #ffc66f; }
        .status-not { color: #e22939; background: #ffe8eb; border-color: #ffabb3; }

        .progress-wrap { display: flex; align-items: center; gap: 5px; min-width: 90px; }
        .progress { height: 7px; min-width: 48px; flex: 1; background: #e9eff5; }
        .progress-bar { border-radius: 8px; }
        .progress-green { background: #10a777; }
        .progress-orange { background: #ff9f20; }
        .progress-red { background: #fa4b55; }
        .progress-label { min-width: 30px; font-size: 10px; text-align: right; }

        .action-btn {
            width: 25px;
            height: 25px;
            border: 0;
            border-radius: 5px;
            margin: 0 1px;
            background: #eaf3ff;
            color: #2674dc;
        }

        .action-btn.delete { background: #fff0f0; color: #e83d49; }
        .doc-link { color: #2378df; text-decoration: none; }
        .table-bottom { display: flex; justify-content: space-between; align-items: center; gap: 10px; padding-top: 8px; font-size: 11px; color: var(--muted); }
        .pagination { margin: 0; gap: 4px; }
        .pagination .page-link { font-size: 11px; padding: 5px 10px; color: #29455f; border-color: var(--line); }
        .pagination .active .page-link { background: var(--green); border-color: var(--green); color: white; }

        .bottom-grid { display: grid; grid-template-columns: 1.45fr 1fr .58fr; gap: 10px; }
        .bottom-card { padding: 12px; min-height: 165px; }
        .detail-layout { display: grid; grid-template-columns: 48px minmax(150px,1fr) minmax(150px,.9fr); gap: 12px; }
        .detail-icon { height: 45px; width: 45px; border-radius: 50%; display: grid; place-items: center; background: #0da477; color: white; font-size: 24px; }
        .detail-fields { display: grid; grid-template-columns: 85px 10px minmax(0,1fr); gap: 4px 0; font-size: 10.5px; }
        .detail-fields .value { overflow-wrap: anywhere; }
        .detail-progress { border-left: 1px solid #edf1f5; padding-left: 12px; }
        .mini-heading { font-size: 11px; font-weight: 700; margin-bottom: 7px; }
        .thumbs { display: flex; gap: 5px; flex-wrap: wrap; }
        .thumb { width: 49px; height: 43px; display: grid; place-items: center; background: #eaf2f8; border: 1px solid #d7e5f0; border-radius: 4px; color: #55738b; font-size: 19px; }
        .history-table { font-size: 10px; width: 100%; }
        .history-table th { background: #edf4fb; padding: 7px; }
        .history-table td { border-top: 1px solid #e8eff6; padding: 7px; }
        .note-empty { border: 1px dashed #d3e0eb; border-radius: 5px; height: 80px; display: grid; place-content: center; text-align: center; color: #8296aa; gap: 5px; font-size: 10px; }
        .note-item { background: #f6f9fc; border-radius: 5px; padding: 7px; margin-bottom: 5px; font-size: 10px; }
        .small-muted { font-size: 10px; color: var(--muted); }
        .modal-content { border: 0; border-radius: 9px; }
        .modal-header { background: #f3f8fc; }
        .form-label { font-size: 12px; font-weight: 600; }
        .form-control, .form-select { font-size: 12px; }
        .form-hint { font-size: 10px; color: var(--muted); }

        .sidebar-collapsed .sidebar { transform: translateX(-100%); }
        .sidebar-collapsed .main { margin-left: 0; }

        @media (max-width: 1200px) {
            .sidebar { width: 220px; }
            .main { margin-left: 220px; }
            .stats-grid { grid-template-columns: repeat(3,minmax(0,1fr)); }
            .charts-grid { grid-template-columns: 1fr 1fr; }
            .charts-grid .chart-card:last-child { grid-column: span 2; }
            .filter-row { grid-template-columns: repeat(3,minmax(0,1fr)); }
            .bottom-grid { grid-template-columns: 1fr 1fr; }
            .bottom-grid .bottom-card:last-child { grid-column: span 2; }
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); width: 245px; }
            .main { margin-left: 0; }
            body.mobile-menu-open .sidebar { transform: translateX(0); }
            .page { padding: 12px; }
            .page-heading { align-items: flex-start; }
            .page-title { font-size: 18px; }
            .filter-row { grid-template-columns: 1fr 1fr; }
            .filter-row > *:last-child { grid-column: span 2; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .charts-grid { grid-template-columns: 1fr; }
            .charts-grid .chart-card:last-child { grid-column: auto; }
            .chart-card { height: 200px; }
            .chart-box { height: 150px; }
            .table-toolbar { align-items: flex-start; flex-direction: column; }
            .toolbar-controls { width: 100%; flex-wrap: wrap; }
            .toolbar-controls .form-control { width: 100%; }
            .bottom-grid { grid-template-columns: 1fr; }
            .bottom-grid .bottom-card:last-child { grid-column: auto; }
            .detail-layout { grid-template-columns: 45px 1fr; }
            .detail-progress { grid-column: 2; border-left: 0; padding-left: 0; }
        }
    </style>
</head>

<body>
<aside class="sidebar">
    <div class="brand">
        <div class="brand-logo"><i class="bi bi-shield-fill-check"></i></div>
        <div>
            <div class="brand-title">HSSE PROJECT</div>
            <div class="brand-subtitle">PT Geo Dipa Energi (Persero)<br>Unit Dieng</div>
        </div>
    </div>

    <nav class="nav-menu">
        <a class="nav-link-custom" href="{{ route('dashboard') }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a class="nav-link-custom" href="{{ route('daily-work.index') }}">
            <i class="bi bi-calendar2-week-fill"></i> Daily Work
        </a>

        <a class="nav-link-custom active" href="{{ route('hsse-plan.index') }}">
            <i class="bi bi-calendar-check-fill"></i> HSSE Plan
        </a>

        <a class="nav-link-custom" href="{{ url('/events') }}">
            <i class="bi bi-calendar-event-fill"></i> Events
        </a>

        <a class="nav-link-custom" href="{{ url('/inventory') }}">
            <i class="bi bi-box-seam-fill"></i> Inventory
        </a>

        <a class="nav-link-custom" data-bs-toggle="collapse" href="#dataSubmenu" role="button" aria-expanded="true">
            <i class="bi bi-folder2-open"></i> Data
            <i class="bi bi-chevron-down nav-chevron"></i>
        </a>

        <div class="collapse show submenu" id="dataSubmenu">
            <a class="nav-link-custom" href="{{ url('/man-hours') }}"><i class="bi bi-calendar2-check"></i> Man Hours</a>
            <a class="nav-link-custom" href="{{ url('/workforce') }}"><i class="bi bi-people"></i> Workforce</a>
            <a class="nav-link-custom" href="{{ url('/incident') }}"><i class="bi bi-exclamation-triangle"></i> Incident</a>
            <a class="nav-link-custom" href="{{ url('/issue-follow-up') }}"><i class="bi bi-clipboard-check"></i> Issue &amp; Follow Up</a>
        </div>

        <a class="nav-link-custom" href="{{ url('/users') }}"><i class="bi bi-people-fill"></i> Manajemen Pengguna</a>
    </nav>

    <div class="sidebar-footer">
        <div>Safety Today</div>
        <div>Sustainability Tomorrow</div>
    </div>
</aside>

<main class="main">
    <header class="topbar">
        <button class="icon-button" id="sidebarToggle" aria-label="Buka atau tutup sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div class="user-info">
            <i class="bi bi-bell fs-5"></i>
            <div class="avatar"><i class="bi bi-person-fill"></i></div>
            <div>
                <div class="fw-bold" style="font-size:11px">Budi Santoso</div>
                <div class="small-muted">Admin</div>
            </div>
        </div>
    </header>

    <div class="page">
        <div class="page-heading">
            <div class="heading-left">
                <div class="heading-icon"><i class="bi bi-bullseye"></i></div>
                <div>
                    <h1 class="page-title">HSSE Plan <span class="ms-2 fs-6 fw-semibold">KPI Kontraktor</span></h1>
                    <div class="breadcrumb-text">
                        <a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a>
                        <span>›</span> HSSE Plan <span>›</span> <b>KPI Kontraktor</b>
                    </div>
                </div>
            </div>
            <button class="btn btn-green btn-sm" onclick="openAddModal()">
                <i class="bi bi-plus-lg me-2"></i>Tambah KPI
            </button>
        </div>

        <section class="filter-row">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-calendar-range"></i></span>
                <input type="date" class="form-control" id="filterStart" value="2025-01-01" title="Tanggal mulai">
                <input type="date" class="form-control" id="filterEnd" value="2025-12-31" title="Tanggal akhir">
            </div>

            <select id="filterType" class="form-select">
                <option value="">Semua Jenis KPI</option>
                <option value="Leading">Leading</option>
                <option value="Lagging">Lagging</option>
            </select>

            <select id="filterStatus" class="form-select">
                <option value="">Semua Status</option>
                <option value="Tercapai">Tercapai</option>
                <option value="Dalam Progress">Dalam Progress</option>
                <option value="Belum Tercapai">Belum Tercapai</option>
            </select>

            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <input type="search" class="form-control" id="globalSearch" placeholder="Cari nama KPI atau keterangan...">
            </div>

            <button class="btn btn-outline-green btn-sm" onclick="downloadXLSX()">
                <i class="bi bi-file-earmark-excel me-1"></i> Download Excel
            </button>
        </section>

        <section class="stats-grid">
            <div class="card-custom stat-card">
                <div class="stat-icon bg-blue"><i class="bi bi-bullseye"></i></div>
                <div><div class="stat-label">Total KPI</div><div class="stat-value" id="statTotal">0</div><div class="stat-caption">Indikator kontraktor</div></div>
            </div>
            <div class="card-custom stat-card">
                <div class="stat-icon bg-green"><i class="bi bi-check-circle"></i></div>
                <div><div class="stat-label">Tercapai</div><div class="stat-value" id="statAchieved">0</div><div class="stat-caption">KPI tercapai</div></div>
            </div>
            <div class="card-custom stat-card">
                <div class="stat-icon bg-orange"><i class="bi bi-clock-history"></i></div>
                <div><div class="stat-label">Dalam Progress</div><div class="stat-value" id="statProgress">0</div><div class="stat-caption">Sedang berjalan</div></div>
            </div>
            <div class="card-custom stat-card">
                <div class="stat-icon bg-red"><i class="bi bi-x-lg"></i></div>
                <div><div class="stat-label">Belum Tercapai</div><div class="stat-value" id="statNot">0</div><div class="stat-caption">Perlu tindak lanjut</div></div>
            </div>
            <div class="card-custom stat-card">
                <div class="stat-icon bg-purple"><i class="bi bi-database-fill"></i></div>
                <div><div class="stat-label">Leading / Lagging</div><div class="stat-value" id="statTypes">0 / 0</div><div class="stat-caption">Jumlah indikator</div></div>
            </div>
        </section>

        <section class="charts-grid">
            <div class="card-custom chart-card">
                <h2 class="card-title">Capaian KPI per Bulan</h2>
                <div class="chart-box"><canvas id="monthlyChart"></canvas></div>
            </div>

            <div class="card-custom chart-card">
                <h2 class="card-title">Status Pemenuhan KPI</h2>
                <div class="donut-layout">
                    <div class="chart-box"><canvas id="statusChart"></canvas></div>
                    <div class="legend-list">
                        <div class="legend-item"><span class="legend-dot bg-green"></span>Tercapai <span class="legend-count" id="legendAchieved">0 (0%)</span></div>
                        <div class="legend-item"><span class="legend-dot bg-orange"></span>Dalam Progress <span class="legend-count" id="legendProgress">0 (0%)</span></div>
                        <div class="legend-item"><span class="legend-dot bg-red"></span>Belum Tercapai <span class="legend-count" id="legendNot">0 (0%)</span></div>
                    </div>
                </div>
            </div>

            <div class="card-custom chart-card">
                <h2 class="card-title">Jumlah KPI per Jenis</h2>
                <div class="chart-box"><canvas id="typeChart"></canvas></div>
            </div>
        </section>

        <section class="card-custom table-card">
            <div class="table-toolbar">
                <h2 class="card-title">Daftar KPI Kontraktor</h2>
                <div class="toolbar-controls">
                    <input type="search" class="form-control" id="tableSearch" placeholder="Cari KPI...">
                    <select class="form-select" id="filterPeriod" style="width:110px">
                        <option value="">Semua Tahun</option>
                        <option value="2025" selected>2025</option>
                        <option value="2026">2026</option>
                    </select>
                    <select class="form-select" id="sortBy" style="width:150px">
                        <option value="name">Urut Nama</option>
                        <option value="progress-desc">Progress Tertinggi</option>
                        <option value="progress-asc">Progress Terendah</option>
                        <option value="date">Tanggal Mulai</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="kpi-table">
                    <thead>
                        <tr>
                            <th>No</th><th>Nama KPI</th><th>Jenis</th><th>Target</th>
                            <th>Realisasi</th><th>Persentase</th><th>Status</th>
                            <th>Periode</th><th>Keterangan</th><th>Dokumen</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="kpiTableBody"></tbody>
                </table>
            </div>

            <div class="table-bottom">
                <span id="tableInfo">Memuat data...</span>
                <nav aria-label="Navigasi halaman tabel"><ul class="pagination" id="pagination"></ul></nav>
            </div>
        </section>

        <section class="bottom-grid">
            <div class="card-custom bottom-card">
                <h2 class="card-title">Detail KPI</h2>
                <div id="detailPanel"></div>
            </div>

            <div class="card-custom bottom-card">
                <h2 class="card-title">Riwayat Capaian</h2>
                <div class="table-responsive">
                    <table class="history-table">
                        <thead><tr><th>Tanggal</th><th>Realisasi</th><th>Keterangan</th><th>Dokumen</th></tr></thead>
                        <tbody id="historyBody"></tbody>
                    </table>
                </div>
            </div>

            <div class="card-custom bottom-card">
                <h2 class="card-title">Catatan</h2>
                <div id="notesPanel"></div>
                <button class="btn btn-outline-green btn-sm w-100 mt-2" onclick="openNoteModal()">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Catatan
                </button>
            </div>
        </section>
    </div>
</main>

<!-- Modal tambah/edit KPI -->
<div class="modal fade" id="kpiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <form id="kpiForm">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="kpiModalTitle">Tambah KPI Kontraktor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="kpiId">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Nama KPI *</label>
                            <input type="text" id="kpiName" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Jenis KPI *</label>
                            <select id="kpiType" class="form-select" required>
                                <option value="Leading">Leading</option>
                                <option value="Lagging">Lagging</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Target *</label>
                            <input type="text" id="kpiTarget" class="form-control" required placeholder="12 kali/tahun">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nilai Target</label>
                            <input type="number" id="kpiTargetValue" class="form-control" min="0" step="any" value="12">
                            <div class="form-hint">Angka untuk menghitung progress.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Realisasi</label>
                            <input type="number" id="kpiActual" class="form-control" min="0" step="any" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai *</label>
                            <input type="date" id="kpiStart" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Selesai *</label>
                            <input type="date" id="kpiEnd" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status *</label>
                            <select id="kpiStatus" class="form-select" required>
                                <option value="Dalam Progress">Dalam Progress</option>
                                <option value="Tercapai">Tercapai</option>
                                <option value="Belum Tercapai">Belum Tercapai</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Keterangan</label>
                            <input type="text" id="kpiDescription" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Dokumentasi / Dokumen</label>
                            <input type="file" id="kpiFiles" class="form-control" multiple accept="image/*,.pdf,.doc,.docx,.xls,.xlsx">
                            <div class="form-hint">Demo ini hanya menyimpan nama file di browser, belum mengunggah file ke server.</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-green btn-sm">Simpan KPI</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal catatan -->
<div class="modal fade" id="noteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="noteForm">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Catatan KPI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Isi Catatan *</label>
                    <textarea id="noteText" class="form-control" rows="4" required placeholder="Tulis catatan atau tindak lanjut..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-green btn-sm">Simpan Catatan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal dokumen -->
<div class="modal fade" id="documentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Dokumen KPI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="documentList"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script src="https://cdn.sheetjs.com/xlsx-0.20.3/package/dist/xlsx.full.min.js"></script>

<script>
    // Data contoh. Belum terhubung ke MySQL.
    let kpiData = [
        {id:1,name:'Management Walkthrough',type:'Leading',target:'2 kali/tahun',targetValue:2,actual:1,start:'2025-01-01',end:'2025-12-31',status:'Dalam Progress',period:2025,description:'Semester 1',history:[{date:'2025-01-15',actual:1,description:'Walkthrough area PLTP'},{date:'2025-07-10',actual:1,description:'Walkthrough area plant'}],notes:[],documents:[]},
        {id:2,name:'Meeting/Contact HSSE',type:'Leading',target:'12 kali/tahun',targetValue:12,actual:12,start:'2025-01-01',end:'2025-12-31',status:'Tercapai',period:2025,description:'Rutin bulanan',history:[],notes:[],documents:[]},
        {id:3,name:'Kontraktor Onboarding',type:'Leading',target:'10 kali/tahun',targetValue:10,actual:8,start:'2025-01-01',end:'2025-12-31',status:'Dalam Progress',period:2025,description:'Onboarding kontraktor',history:[],notes:[],documents:[]},
        {id:4,name:'Inspeksi Area Proyek',type:'Leading',target:'12 kali/tahun',targetValue:12,actual:6,start:'2025-01-01',end:'2025-12-31',status:'Dalam Progress',period:2025,description:'Inspeksi berkala',history:[],notes:[],documents:[]},
        {id:5,name:'Safety Training',type:'Leading',target:'12 kali/tahun',targetValue:12,actual:12,start:'2025-01-01',end:'2025-12-31',status:'Tercapai',period:2025,description:'Pelatihan rutin',history:[],notes:[],documents:[]},
        {id:6,name:'Simulasi Emergency',type:'Leading',target:'2 kali/tahun',targetValue:2,actual:0,start:'2025-01-01',end:'2025-12-31',status:'Belum Tercapai',period:2025,description:'Jadwal Q3',history:[],notes:[],documents:[]},
        {id:7,name:'TRIR',type:'Lagging',target:'≤ 0,5',targetValue:0.5,actual:0.3,start:'2025-01-01',end:'2025-12-31',status:'Tercapai',period:2025,description:'Indikator lagging',history:[],notes:[],documents:[]},
        {id:8,name:'LTIFR',type:'Lagging',target:'0',targetValue:0,actual:0,start:'2025-01-01',end:'2025-12-31',status:'Tercapai',period:2025,description:'Indikator lagging',history:[],notes:[],documents:[]},
        {id:9,name:'First Aid Rate',type:'Lagging',target:'≤ 1',targetValue:1,actual:2,start:'2025-01-01',end:'2025-12-31',status:'Belum Tercapai',period:2025,description:'Perlu evaluasi',history:[],notes:[],documents:[]},
        {id:10,name:'Perilaku Aman (BBS)',type:'Lagging',target:'80%',targetValue:80,actual:70,start:'2025-01-01',end:'2025-12-31',status:'Dalam Progress',period:2025,description:'Observasi perilaku',history:[],notes:[],documents:[]},
        {id:11,name:'Laporan Near Miss',type:'Lagging',target:'4 laporan/tahun',targetValue:4,actual:4,start:'2025-01-01',end:'2025-12-31',status:'Tercapai',period:2025,description:'Rekap laporan',history:[],notes:[],documents:[]},
        {id:12,name:'Audit Kepatuhan HSSE',type:'Lagging',target:'2 kali/tahun',targetValue:2,actual:2,start:'2025-01-01',end:'2025-12-31',status:'Tercapai',period:2025,description:'Audit internal',history:[],notes:[],documents:[]}
    ];

    let selectedId = 1;
    let currentPage = 1;
    const pageSize = 10;
    let monthlyChart = null;
    let statusChart = null;
    let typeChart = null;

    const $ = id => document.getElementById(id);

    // Perbaikan: tanda kutip documentModal sudah benar.
    const kpiModal = new bootstrap.Modal($('kpiModal'));
    const noteModal = new bootstrap.Modal($('noteModal'));
    const documentModal = new bootstrap.Modal($('documentModal'));

    function escapeHTML(value) {
        return String(value ?? '').replace(/[&<>"']/g, ch => ({
            '&':'&amp;', '<':'&lt;', '>':'&gt;', '"':'&quot;', "'":'&#039;'
        })[ch]);
    }

    function percentage(item) {
        const target = Number(item.targetValue);
        const actual = Number(item.actual);
        if (target === 0) return actual === 0 ? 100 : 0;
        return Math.max(0, Math.min(100, Math.round(actual / target * 100)));
    }

    function formatNumber(value) {
        return Number(value || 0).toLocaleString('id-ID', {maximumFractionDigits:2});
    }

    function formatDate(value) {
        if (!value) return '-';
        const date = new Date(value + 'T00:00:00');
        return date.toLocaleDateString('id-ID', {day:'2-digit',month:'short',year:'numeric'});
    }

    function statusClass(status) {
        if (status === 'Tercapai') return 'status-achieved';
        if (status === 'Belum Tercapai') return 'status-not';
        return 'status-progress';
    }

    function progressClass(item) {
        if (item.status === 'Tercapai') return 'progress-green';
        if (item.status === 'Belum Tercapai') return 'progress-red';
        return 'progress-orange';
    }

    function getFilteredData() {
        const start = $('filterStart').value;
        const end = $('filterEnd').value;
        const type = $('filterType').value;
        const status = $('filterStatus').value;
        const period = $('filterPeriod').value;
        const search = ($('globalSearch').value + ' ' + $('tableSearch').value).trim().toLowerCase();

        let rows = kpiData.filter(item => {
            const searchable = (item.name + ' ' + item.description + ' ' + item.type).toLowerCase();
            const searchMatch = !search || searchable.includes(search);
            const typeMatch = !type || item.type === type;
            const statusMatch = !status || item.status === status;
            const periodMatch = !period || String(item.period) === period;
            const dateMatch = (!start || item.end >= start) && (!end || item.start <= end);
            return searchMatch && typeMatch && statusMatch && periodMatch && dateMatch;
        });

        const sort = $('sortBy').value;
        if (sort === 'progress-desc') rows.sort((a,b) => percentage(b)-percentage(a));
        else if (sort === 'progress-asc') rows.sort((a,b) => percentage(a)-percentage(b));
        else if (sort === 'date') rows.sort((a,b) => a.start.localeCompare(b.start));
        else rows.sort((a,b) => a.name.localeCompare(b.name));

        return rows;
    }

    function renderTable() {
        const rows = getFilteredData();
        const totalPages = Math.max(1, Math.ceil(rows.length / pageSize));
        currentPage = Math.min(currentPage, totalPages);

        const startIndex = (currentPage - 1) * pageSize;
        const visible = rows.slice(startIndex, startIndex + pageSize);

        $('kpiTableBody').innerHTML = visible.map((item, index) => {
            const pct = percentage(item);
            const typeClass = item.type === 'Leading' ? 'text-leading' : 'text-lagging';
            const docs = item.documents || [];

            return `
                <tr class="${item.id === selectedId ? 'selected-row' : ''}" onclick="selectKPI(${item.id})">
                    <td class="text-center">${startIndex + index + 1}</td>
                    <td>${escapeHTML(item.name)}</td>
                    <td class="${typeClass}">${escapeHTML(item.type)}</td>
                    <td class="text-center">${escapeHTML(item.target)}</td>
                    <td class="text-center">${escapeHTML(formatNumber(item.actual))}</td>
                    <td>
                        <div class="progress-wrap">
                            <div class="progress"><div class="progress-bar ${progressClass(item)}" style="width:${pct}%"></div></div>
                            <span class="progress-label">${pct}%</span>
                        </div>
                    </td>
                    <td class="text-center"><span class="status-badge ${statusClass(item.status)}">${escapeHTML(item.status)}</span></td>
                    <td class="text-center">${item.period}</td>
                    <td>${escapeHTML(item.description || '-')}</td>
                    <td class="text-center">
                        <a href="#" class="doc-link" onclick="showDocuments(event,${item.id})">
                            <i class="bi bi-file-earmark-text"></i> (${docs.length})
                        </a>
                    </td>
                    <td class="text-center">
                        <button class="action-btn" title="Detail" onclick="event.stopPropagation();selectKPI(${item.id})"><i class="bi bi-eye-fill"></i></button>
                        <button class="action-btn" title="Edit" onclick="event.stopPropagation();editKPI(${item.id})"><i class="bi bi-pencil-square"></i></button>
                        <button class="action-btn delete" title="Hapus" onclick="event.stopPropagation();deleteKPI(${item.id})"><i class="bi bi-trash3-fill"></i></button>
                    </td>
                </tr>`;
        }).join('');

        if (!visible.length) {
            $('kpiTableBody').innerHTML = '<tr><td colspan="11" class="text-center py-4 text-muted">Tidak ada data KPI yang sesuai filter.</td></tr>';
        }

        $('tableInfo').textContent = rows.length
            ? `Menampilkan ${startIndex + 1} - ${Math.min(startIndex + pageSize, rows.length)} dari ${rows.length} data`
            : 'Tidak ada data';

        let pages = `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}"><button class="page-link" onclick="goPage(${currentPage-1})">‹</button></li>`;
        for (let p = 1; p <= totalPages; p++) {
            pages += `<li class="page-item ${p === currentPage ? 'active' : ''}"><button class="page-link" onclick="goPage(${p})">${p}</button></li>`;
        }
        pages += `<li class="page-item ${currentPage === totalPages ? 'disabled' : ''}"><button class="page-link" onclick="goPage(${currentPage+1})">›</button></li>`;
        $('pagination').innerHTML = pages;
    }

    function goPage(page) {
        const maxPage = Math.max(1, Math.ceil(getFilteredData().length / pageSize));
        if (page < 1 || page > maxPage) return;
        currentPage = page;
        renderTable();
    }

    function updateStats() {
        const rows = getFilteredData();
        const achieved = rows.filter(x => x.status === 'Tercapai').length;
        const progress = rows.filter(x => x.status === 'Dalam Progress').length;
        const notAchieved = rows.filter(x => x.status === 'Belum Tercapai').length;
        const leading = rows.filter(x => x.type === 'Leading').length;
        const lagging = rows.filter(x => x.type === 'Lagging').length;
        const total = rows.length;
        const pct = n => total ? Math.round(n / total * 100) : 0;

        $('statTotal').textContent = total;
        $('statAchieved').textContent = achieved;
        $('statProgress').textContent = progress;
        $('statNot').textContent = notAchieved;
        $('statTypes').textContent = `${leading} / ${lagging}`;

        $('legendAchieved').textContent = `${achieved} (${pct(achieved)}%)`;
        $('legendProgress').textContent = `${progress} (${pct(progress)}%)`;
        $('legendNot').textContent = `${notAchieved} (${pct(notAchieved)}%)`;
    }

    function initCharts() {
        monthlyChart = new Chart($('monthlyChart'), {
            type: 'bar',
            data: {
                labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'],
                datasets: [
                    {label:'Target',data:Array(12).fill(1),backgroundColor:'rgba(57,135,245,.75)',borderRadius:2},
                    {label:'Realisasi',data:Array(12).fill(0),backgroundColor:'rgba(18,168,121,.9)',borderRadius:2}
                ]
            },
            options: {
                responsive:true, maintainAspectRatio:false,
                plugins:{legend:{position:'top',labels:{boxWidth:10,font:{size:9}}}},
                scales:{
                    x:{grid:{display:false},ticks:{font:{size:9}}},
                    y:{beginAtZero:true,ticks:{precision:0,font:{size:9}},grid:{color:'#edf2f7'}}
                }
            }
        });

        statusChart = new Chart($('statusChart'), {
            type:'doughnut',
            data:{
                labels:['Tercapai','Dalam Progress','Belum Tercapai'],
                datasets:[{data:[0,0,0],backgroundColor:['#12a879','#ff9d22','#fa4b55'],borderWidth:0,hoverOffset:4}]
            },
            options:{
                responsive:true,maintainAspectRatio:false,cutout:'68%',
                plugins:{legend:{display:false}}
            },
            plugins:[{
                id:'centerText',
                afterDraw(chart) {
                    const {ctx,chartArea} = chart;
                    if (!chartArea) return;
                    const x = (chartArea.left + chartArea.right) / 2;
                    const y = (chartArea.top + chartArea.bottom) / 2;
                    ctx.save();
                    ctx.textAlign = 'center';
                    ctx.fillStyle = '#18344e';
                    ctx.font = 'bold 18px Segoe UI';
                    ctx.fillText(String(getFilteredData().length),x,y);
                    ctx.font = 'bold 10px Segoe UI';
                    ctx.fillText('Total',x,y+15);
                    ctx.restore();
                }
            }]
        });

        typeChart = new Chart($('typeChart'), {
            type:'bar',
            data:{
                labels:['Leading','Lagging'],
                datasets:[{data:[0,0],backgroundColor:['#3987f5','#9150ed'],borderRadius:4,barThickness:25}]
            },
            options:{
                indexAxis:'y',responsive:true,maintainAspectRatio:false,
                plugins:{legend:{display:false}},
                scales:{
                    x:{beginAtZero:true,ticks:{precision:0,font:{size:9}},grid:{color:'#edf2f7'}},
                    y:{grid:{display:false},ticks:{font:{size:10}}}
                }
            }
        });
    }

    function updateCharts() {
        const rows = getFilteredData();
        const achieved = rows.filter(x => x.status === 'Tercapai').length;
        const progress = rows.filter(x => x.status === 'Dalam Progress').length;
        const notAchieved = rows.filter(x => x.status === 'Belum Tercapai').length;
        const leading = rows.filter(x => x.type === 'Leading').length;
        const lagging = rows.filter(x => x.type === 'Lagging').length;

        statusChart.data.datasets[0].data = [achieved,progress,notAchieved];
        statusChart.update();

        typeChart.data.datasets[0].data = [leading,lagging];
        typeChart.update();

        // Realisasi per bulan dihitung dari riwayat demo yang tersedia.
        const months = Array(12).fill(0);
        rows.forEach(item => {
            (item.history || []).forEach(h => {
                const date = new Date(h.date + 'T00:00:00');
                if (date.getFullYear() === Number(item.period)) {
                    months[date.getMonth()] += Number(h.actual || 0);
                }
            });
        });

        monthlyChart.data.datasets[0].data = Array(12).fill(rows.length ? 1 : 0);
        monthlyChart.data.datasets[1].data = months;
        monthlyChart.update();
    }

    function renderDetail() {
        const item = kpiData.find(x => x.id === selectedId);
        if (!item) {
            $('detailPanel').innerHTML = '<div class="text-muted">Pilih KPI untuk melihat detail.</div>';
            $('historyBody').innerHTML = '<tr><td colspan="4" class="text-center text-muted">Tidak ada riwayat.</td></tr>';
            $('notesPanel').innerHTML = '<div class="note-empty">Belum ada catatan</div>';
            return;
        }

        const pct = percentage(item);
        $('detailPanel').innerHTML = `
            <div class="detail-layout">
                <div class="detail-icon"><i class="bi bi-bullseye"></i></div>
                <div class="detail-fields">
                    <span>Nama KPI</span><span>:</span><span class="value">${escapeHTML(item.name)}</span>
                    <span>Jenis</span><span>:</span><span>${escapeHTML(item.type)}</span>
                    <span>Target</span><span>:</span><span>${escapeHTML(item.target)}</span>
                    <span>Realisasi</span><span>:</span><span>${escapeHTML(formatNumber(item.actual))}</span>
                    <span>Persentase</span><span>:</span><span>${pct}%</span>
                    <span>Status</span><span>:</span><span>${escapeHTML(item.status)}</span>
                    <span>Periode</span><span>:</span><span>${item.period}</span>
                    <span>Keterangan</span><span>:</span><span>${escapeHTML(item.description || '-')}</span>
                </div>
                <div class="detail-progress">
                    <div class="mini-heading">Progress</div>
                    <div class="progress mb-2"><div class="progress-bar ${progressClass(item)}" style="width:${pct}%"></div></div>
                    <div class="small-muted">${pct}% dari target</div>
                    <div class="mini-heading mt-3">Dokumentasi</div>
                    <div class="thumbs">
                        ${(item.documents || []).length
                            ? item.documents.map(d => `<div class="thumb" title="${escapeHTML(d.name)}"><i class="bi bi-file-earmark-text"></i></div>`).join('')
                            : '<div class="thumb"><i class="bi bi-image"></i></div><div class="thumb"><i class="bi bi-plus-lg"></i></div>'}
                    </div>
                </div>
            </div>`;

        const history = item.history || [];
        $('historyBody').innerHTML = history.length
            ? history.map(h => `<tr><td>${formatDate(h.date)}</td><td>${escapeHTML(formatNumber(h.actual))}</td><td>${escapeHTML(h.description || '-')}</td><td><i class="bi bi-file-earmark-text text-primary"></i></td></tr>`).join('')
            : '<tr><td colspan="4" class="text-center text-muted">Belum ada riwayat capaian.</td></tr>';

        const notes = item.notes || [];
        $('notesPanel').innerHTML = notes.length
            ? notes.map(n => `<div class="note-item">${escapeHTML(n.text)}<div class="small-muted mt-1">${formatDate(n.date)}</div></div>`).join('')
            : '<div class="note-empty"><i class="bi bi-journal-text fs-4"></i>Belum ada catatan</div>';
    }

    function refreshPage() {
        renderTable();
        updateStats();
        updateCharts();
        renderDetail();
    }

    function selectKPI(id) {
        selectedId = id;
        refreshPage();
    }

    function openAddModal() {
        $('kpiForm').reset();
        $('kpiId').value = '';
        $('kpiModalTitle').textContent = 'Tambah KPI Kontraktor';
        $('kpiTargetValue').value = 12;
        $('kpiActual').value = 0;
        $('kpiStart').value = '2026-01-01';
        $('kpiEnd').value = '2026-12-31';
        $('kpiStatus').value = 'Dalam Progress';
        kpiModal.show();
    }

    function editKPI(id) {
        const item = kpiData.find(x => x.id === id);
        if (!item) return;

        $('kpiId').value = item.id;
        $('kpiName').value = item.name;
        $('kpiType').value = item.type;
        $('kpiTarget').value = item.target;
        $('kpiTargetValue').value = item.targetValue;
        $('kpiActual').value = item.actual;
        $('kpiStart').value = item.start;
        $('kpiEnd').value = item.end;
        $('kpiStatus').value = item.status;
        $('kpiDescription').value = item.description || '';
        $('kpiFiles').value = '';
        $('kpiModalTitle').textContent = 'Edit KPI Kontraktor';
        kpiModal.show();
    }

    $('kpiForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const idValue = $('kpiId').value;
        const existing = idValue ? kpiData.find(x => x.id === Number(idValue)) : null;
        const targetValue = Number($('kpiTargetValue').value || 0);
        const actual = Number($('kpiActual').value || 0);
        const start = $('kpiStart').value;
        const end = $('kpiEnd').value;

        if (end < start) {
            alert('Tanggal selesai tidak boleh sebelum tanggal mulai.');
            return;
        }

        const newItem = {
            id: existing ? existing.id : Math.max(0,...kpiData.map(x => x.id)) + 1,
            name: $('kpiName').value.trim(),
            type: $('kpiType').value,
            target: $('kpiTarget').value.trim(),
            targetValue,
            actual,
            start,
            end,
            status: $('kpiStatus').value,
            period: new Date(start + 'T00:00:00').getFullYear(),
            description: $('kpiDescription').value.trim(),
            history: existing ? existing.history : [],
            notes: existing ? existing.notes : [],
            documents: existing ? existing.documents : []
        };

        const files = Array.from($('kpiFiles').files);
        files.forEach(file => newItem.documents.push({name:file.name}));

        if (existing) {
            const index = kpiData.findIndex(x => x.id === existing.id);
            kpiData[index] = newItem;
        } else {
            kpiData.push(newItem);
        }

        selectedId = newItem.id;
        currentPage = 1;
        kpiModal.hide();
        refreshPage();
    });

    function deleteKPI(id) {
        const item = kpiData.find(x => x.id === id);
        if (!item) return;
        if (!confirm(`Yakin ingin menghapus KPI "${item.name}"?`)) return;

        kpiData = kpiData.filter(x => x.id !== id);
        if (selectedId === id) selectedId = kpiData.length ? kpiData[0].id : null;
        refreshPage();
    }

    function showDocuments(event, id) {
        event.preventDefault();
        const item = kpiData.find(x => x.id === id);
        if (!item) return;

        const docs = item.documents || [];
        $('documentList').innerHTML = docs.length
            ? docs.map(d => `<div class="d-flex align-items-center gap-2 border-bottom py-2"><i class="bi bi-file-earmark-text text-primary fs-5"></i><span>${escapeHTML(d.name)}</span></div>`).join('')
            : '<div class="text-center text-muted py-3">Belum ada dokumen untuk KPI ini.</div>';

        documentModal.show();
    }

    function openNoteModal() {
        if (!selectedId) {
            alert('Pilih KPI terlebih dahulu.');
            return;
        }
        $('noteForm').reset();
        noteModal.show();
    }

    $('noteForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const item = kpiData.find(x => x.id === selectedId);
        if (!item) return;

        item.notes = item.notes || [];
        item.notes.unshift({
            text: $('noteText').value.trim(),
            date: new Date().toISOString().slice(0,10)
        });

        noteModal.hide();
        renderDetail();
    });

    function downloadXLSX() {
        const rows = getFilteredData();

        const data = [
            ['No','Nama KPI','Jenis','Target','Nilai Target','Realisasi','Persentase','Status','Tanggal Mulai','Tanggal Selesai','Periode','Keterangan','Jumlah Dokumen'],
            ...rows.map((item,index) => [
                index + 1,
                item.name,
                item.type,
                item.target,
                item.targetValue,
                item.actual,
                percentage(item),
                item.status,
                item.start,
                item.end,
                item.period,
                item.description || '-',
                (item.documents || []).length
            ])
        ];

        const worksheet = XLSX.utils.aoa_to_sheet(data);
        worksheet['!cols'] = [
            {wch:6},{wch:30},{wch:13},{wch:20},{wch:14},{wch:13},
            {wch:14},{wch:20},{wch:16},{wch:16},{wch:10},{wch:30},{wch:17}
        ];

        rows.forEach((item,index) => {
            const cell = worksheet[`G${index + 2}`];
            if (cell) cell.z = '0"%"';
        });

        worksheet['!autofilter'] = {ref:`A1:M${data.length}`};

        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'KPI Kontraktor');
        XLSX.writeFile(workbook, 'KPI-Kontraktor-HSSE.xlsx');
    }

    // Pencarian dan filter: reset ke halaman pertama.
    ['filterStart','filterEnd','filterType','filterStatus','filterPeriod','globalSearch','tableSearch','sortBy']
        .forEach(id => {
            $(id).addEventListener('input', () => {
                currentPage = 1;
                refreshPage();
            });
            $(id).addEventListener('change', () => {
                currentPage = 1;
                refreshPage();
            });
        });

    $('sidebarToggle').addEventListener('click', () => {
        if (window.innerWidth <= 768) {
            document.body.classList.toggle('mobile-menu-open');
        } else {
            document.body.classList.toggle('sidebar-collapsed');
        }
    });

    initCharts();
    refreshPage();
</script>
</body>
</html>
