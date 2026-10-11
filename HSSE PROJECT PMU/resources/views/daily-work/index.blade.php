
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Work | HSSE Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.sheetjs.com/xlsx-0.20.3/package/dist/xlsx.full.min.js"></script>
    <style>
        :root {
            --navy: #102b3f;
            --green: #07845c;
            --page: #f3f7fb;
            --border: #dce7f2;
            --muted: #70849b;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: var(--page);
            color: #243b53;
            font-family: Arial, sans-serif;
            font-size: 13px;
        }
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 244px;
            padding: 17px 8px;
            overflow-y: auto;
            color: white;
            background: linear-gradient(180deg, #102b3f, #071e2e);
            z-index: 1000;
        }
        .brand {
            display: flex;
            gap: 10px;
            align-items: center;
            padding: 0 12px 23px;
            border-bottom: 1px solid #ffffff20;
        }
        .brand-mark {
            display: grid;
            place-items: center;
            width: 35px;
            height: 35px;
            border-radius: 9px;
            background: #087f5b;
            font-size: 19px;
        }
        .brand strong { font-size: 14px; }
        .brand small {
            display: block;
            margin-top: 4px;
            color: #c3d2df;
            font-size: 9px;
        }
        .nav-heading {
            margin: 23px 13px 9px;
            color: #91a8ba;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .nav-item-link {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 13px;
            margin-bottom: 4px;
            color: #e0e9f0;
            text-decoration: none;
            border-radius: 6px;
            font-size: 12px;
        }
        .nav-item-link:hover {
            color: white;
            background: #ffffff12;
        }
        .nav-item-link.active {
            background: #07845c;
            color: white;
            font-weight: bold;
        }
        .nav-icon {
            width: 19px;
            text-align: center;
            font-size: 15px;
        }
        .nav-sub {
            padding-left: 28px;
            border-left: 1px solid #ffffff25;
            margin-left: 22px;
        }
        .main {
            margin-left: 244px;
            min-height: 100vh;
        }
        .topbar {
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 22px;
            background: white;
            border-bottom: 1px solid var(--border);
        }
        .topbar button {
            border: 0;
            background: transparent;
            font-size: 20px;
        }
        .user-info {
            font-size: 11px;
            font-weight: bold;
        }
        .user-info small {
            display: block;
            color: var(--muted);
            font-weight: normal;
        }
        .content { padding: 23px 19px; }
        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
        }
        .page-heading h1 {
            margin: 0 0 8px;
            font-size: 23px;
            font-weight: bold;
        }
        .breadcrumb-text {
            color: var(--muted);
            font-size: 11px;
        }
        .btn-green {
            background: var(--green);
            color: white;
            border: 1px solid var(--green);
        }
        .btn-green:hover {
            background: #066d4c;
            color: white;
        }
        .filter-bar {
            display: grid;
            grid-template-columns: 1.1fr .85fr .85fr 1.5fr auto;
            gap: 9px;
            margin-bottom: 20px;
        }
        .form-control, .form-select {
            min-height: 38px;
            border-color: #d6e1ec;
            font-size: 11px;
        }
        .stat-card, .panel {
            height: 100%;
            background: white;
            border: 1px solid var(--border);
            border-radius: 8px;
            box-shadow: 0 2px 7px #183b5310;
        }
        .stat-card {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 17px 15px;
        }
        .stat-icon {
            display: grid;
            place-items: center;
            flex: 0 0 38px;
            height: 38px;
            border-radius: 50%;
            color: white;
            font-size: 18px;
        }
        .blue { background: #3979df; }
        .green { background: #139b69; }
        .orange { background: #f9a51a; }
        .red { background: #f0444b; }
        .stat-label {
            margin-bottom: 6px;
            color: #52677d;
            font-size: 11px;
        }
        .stat-number {
            margin-bottom: 5px;
            font-size: 26px;
            font-weight: bold;
            line-height: 1;
        }
        .stat-note {
            color: var(--muted);
            font-size: 9px;
        }
        .panel { padding: 15px; }
        .panel-title {
            margin-bottom: 5px;
            font-size: 13px;
            font-weight: bold;
        }
        .panel-subtitle {
            margin-bottom: 14px;
            color: var(--muted);
            font-size: 10px;
        }
        .chart-box {
            position: relative;
            height: 190px;
        }
        .table-panel { margin-top: 13px; }
        .table-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin: 12px 0;
        }
        .table { margin-bottom: 0; }
        .table thead th {
            padding: 11px 9px;
            background: #f3f7fb;
            color: #52677d;
            white-space: nowrap;
            font-size: 10px;
            border-bottom: 1px solid var(--border);
        }
        .table tbody td {
            padding: 10px 9px;
            vertical-align: middle;
            font-size: 10px;
        }
        .status {
            display: inline-block;
            padding: 5px 8px;
            border-radius: 5px;
            white-space: nowrap;
            font-size: 9px;
            font-weight: bold;
        }
        .status-selesai {
            color: #087647;
            background: #d9f7e7;
        }
        .status-berlangsung {
            color: #9a6200;
            background: #fff0c2;
        }
        .status-ditunda {
            color: #b4232d;
            background: #ffe0e0;
        }
        .status-belum {
            color: #2059b5;
            background: #dceaff;
        }
        .action-btn {
            width: 27px;
            height: 27px;
            margin-right: 2px;
            border: 1px solid #dce7f2;
            border-radius: 5px;
            background: white;
            color: #2468bd;
        }
        .action-btn.delete { color: #e33d49; }
        .bottom-grid {
            display: grid;
            grid-template-columns: 1.15fr 1.15fr .7fr;
            gap: 12px;
            margin-top: 13px;
        }
        .detail-list {
            display: grid;
            grid-template-columns: 110px 1fr;
            gap: 9px;
            font-size: 10px;
        }
        .detail-label { color: var(--muted); }
        .quick-filter button {
            margin: 3px 2px 8px 0;
            padding: 5px 9px;
            border: 1px solid #d6e1ec;
            border-radius: 18px;
            background: white;
            color: #52677d;
            font-size: 10px;
        }
        .quick-filter button.active {
            background: var(--green);
            border-color: var(--green);
            color: white;
        }
        .quick-status label {
            display: block;
            margin-bottom: 9px;
            font-size: 11px;
        }
        .quick-status input { margin-right: 6px; }
        .pagination-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            padding-top: 12px;
            color: var(--muted);
            font-size: 10px;
        }
        .pagination-area button {
            padding: 5px 9px;
            border: 1px solid var(--border);
            background: white;
            color: #34495e;
        }
        .pagination-area button.active {
            background: var(--green);
            color: white;
        }
        @media (max-width: 1200px) {
            .filter-bar { grid-template-columns: repeat(2, 1fr); }
            .bottom-grid { grid-template-columns: 1fr 1fr; }
            .quick-panel { grid-column: 1 / -1; }
        }
        @media (max-width: 768px) {
            .sidebar {
                position: static;
                width: 100%;
            }
            .main { margin-left: 0; }
            .content { padding: 15px; }
            .page-heading { align-items: flex-start; }
            .bottom-grid { grid-template-columns: 1fr; }
            .quick-panel { grid-column: auto; }
        }
    </style>
</head>
<body>
<aside class="sidebar">
    <div class="brand">
        <div class="brand-mark">⬟</div>
        <div>
            <strong>HSSE PROJECT</strong>
            <small>PT Geo Dipa Energi (Persero) – Unit Dieng</small>
        </div>
    </div>
    <nav>
        <a href="{{ route('dashboard') }}" class="nav-item-link">
            <span class="nav-icon">▦</span> Dashboard
        </a>
        <a href="{{ route('daily-work.index') }}" class="nav-item-link active">
            <span class="nav-icon">▤</span> Daily Work
        </a>
<a href="{{ route('hsse-plan.index') }}"
   class="nav-item-link {{ request()->routeIs('hsse-plan.*') ? 'active' : '' }}">
    <span class="nav-icon">▣</span> HSSE Plan
</a>
        <a href="#" class="nav-item-link"><span class="nav-icon">▧</span> Events</a>
        <a href="#" class="nav-item-link"><span class="nav-icon">▣</span> Inventory</a>
        <div class="nav-heading">Data</div>
        <div class="nav-sub">
            <a href="#" class="nav-item-link">◷ &nbsp; Man Hours</a>
            <a href="#" class="nav-item-link">♙ &nbsp; Workforce</a>
            <a href="#" class="nav-item-link">⚠ &nbsp; Incident</a>
            <a href="#" class="nav-item-link">☑ &nbsp; Issue & Follow Up</a>
        </div>
        <a href="#" class="nav-item-link mt-3">
            <span class="nav-icon">♙</span> Manajemen Pengguna
        </a>
    </nav>
</aside>
<div class="main">
    <header class="topbar">
        <button type="button" aria-label="Menu"></button>
        <div class="d-flex align-items-center gap-3">
            <span>🔔</span>
            <div class="user-info">
                Administrator
                <small>HSSE Project</small>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-secondary btn-sm">Logout</button>
            </form>
        </div>
    </header>
    <main class="content">
        <div class="page-heading">
            <div>
                <h1>▤ &nbsp; Daily Work</h1>
                <div class="breadcrumb-text">Dashboard &nbsp;›&nbsp; Daily Work</div>
            </div>
            <button class="btn btn-green btn-sm" data-bs-toggle="modal" data-bs-target="#workModal">
                + Tambah Pekerjaan
            </button>
        </div>
        <section class="filter-bar">
            <input type="date" id="startDate" class="form-control" value="2025-01-01" aria-label="Tanggal mulai">
            <select id="unitFilter" class="form-select">
                <option value="">Semua Unit</option>
                <option>PMU</option>
                <option>Utility</option>
                <option>JOTRE</option>
                <option>BISMO</option>
            </select>
            <select id="statusFilter" class="form-select">
                <option value="">Semua Status</option>
                <option>Selesai</option>
                <option>Berlangsung</option>
                <option>Ditunda</option>
                <option>Belum Mulai</option>
            </select>
            <input type="search" id="searchInput" class="form-control"
                   placeholder="⌕ Cari nama pekerjaan, lokasi, atau pelaksana...">
            <button id="downloadBtn" class="btn btn-outline-success btn-sm">⇩ Download Excel</button>
        </section>
        <section class="row g-3 mb-3">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-icon blue">▤</div>
                    <div>
                        <div class="stat-label">Total Pekerjaan</div>
                        <div class="stat-number" id="totalCount">0</div>
                        <div class="stat-note">Berdasarkan filter aktif</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-icon green">✓</div>
                    <div>
                        <div class="stat-label">Selesai</div>
                        <div class="stat-number" id="doneCount">0</div>
                        <div class="stat-note">Pekerjaan selesai</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-icon orange">◷</div>
                    <div>
                        <div class="stat-label">Berlangsung</div>
                        <div class="stat-number" id="ongoingCount">0</div>
                        <div class="stat-note">Pekerjaan berjalan</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="stat-card">
                    <div class="stat-icon red">Ⅱ</div>
                    <div>
                        <div class="stat-label">Ditunda</div>
                        <div class="stat-number" id="pausedCount">0</div>
                        <div class="stat-note">Pekerjaan tertunda</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="row g-3">
            <div class="col-12 col-xl-5">
                <div class="panel">
                    <h2 class="panel-title">Tren Pekerjaan per Unit</h2>
                    <p class="panel-subtitle">Ilustrasi distribusi bulanan</p>
                    <div class="chart-box"><canvas id="trendChart"></canvas></div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="panel">
                    <h2 class="panel-title">Status Pekerjaan</h2>
                    <p class="panel-subtitle">Proporsi status dari data yang difilter</p>
                    <div class="chart-box"><canvas id="statusChart"></canvas></div>
                </div>
            </div>
            <div class="col-12 col-xl-3">
                <div class="panel">
                    <h2 class="panel-title">Pekerjaan per Kategori</h2>
                    <p class="panel-subtitle">Jumlah pekerjaan</p>
                    <div class="chart-box"><canvas id="categoryChart"></canvas></div>
                </div>
            </div>
        </section>
        <section class="panel table-panel">
            <h2 class="panel-title">Daftar Pekerjaan Daily Work</h2>
            <div class="table-top">
                <div class="d-flex align-items-center gap-2">
                    <label for="perPage">Tampilkan</label>
                    <select id="perPage" class="form-select" style="width:75px">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                    <span>data per halaman</span>
                </div>
                <input type="search" id="tableSearch" class="form-control"
                       style="max-width:240px" placeholder="Cari pekerjaan...">
            </div>
            <div class="table-responsive">
                <table class="table table-hover" id="workTable">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pekerjaan</th>
                        <th>Unit</th>
                        <th>Kategori</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Lokasi</th>
                        <th>Pelaksana</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody id="workTableBody"></tbody>
                </table>
            </div>
            <div class="pagination-area">
                <span id="tableInfo">Belum ada data</span>
                <div id="pagination"></div>
            </div>
        </section>
        <section class="bottom-grid">
            <div class="panel">
                <h2 class="panel-title">Detail Pekerjaan</h2>
                <p class="panel-subtitle">Pilih tombol detail pada tabel.</p>
                <div id="detailContent" class="empty-state">
                    Pilih salah satu pekerjaan untuk melihat detail.
                </div>
            </div>
            <div class="panel">
                <h2 class="panel-title">Grafik Detail Pekerjaan</h2>
                <p class="panel-subtitle">Jumlah pekerjaan dan persentase selesai</p>
                <div class="chart-box"><canvas id="detailChart"></canvas></div>
            </div>
            <div class="panel quick-panel">
                <h2 class="panel-title">Filter Cepat</h2>
                <div class="quick-filter mt-3">
                    <button type="button" class="active" data-unit="">Semua</button>
                    <button type="button" data-unit="PMU">PMU</button>
                    <button type="button" data-unit="Utility">Utility</button>
                    <button type="button" data-unit="JOTRE">JOTRE</button>
                    <button type="button" data-unit="BISMO">BISMO</button>
                </div>
                <hr>
                <strong style="font-size:11px">Status</strong>
                <div class="quick-status mt-3">
                    <label><input type="checkbox" value="" checked> Semua</label>
                    <label><input type="checkbox" value="Selesai"> Selesai</label>
                    <label><input type="checkbox" value="Berlangsung"> Berlangsung</label>
                    <label><input type="checkbox" value="Ditunda"> Ditunda</label>
                    <label><input type="checkbox" value="Belum Mulai"> Belum Mulai</label>
                </div>
            </div>
        </section>
        <footer class="text-center text-secondary mt-4 mb-2" style="font-size:10px">
            HSSE Project &copy; {{ date('Y') }} · Unit Dieng
        </footer>
    </main>
</div>
<div class="modal fade" id="workModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <form id="workForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Tambah Pekerjaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editId">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Pekerjaan *</label>
                            <input id="workName" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Unit *</label>
                            <select id="workUnit" class="form-select" required>
                                <option value="">Pilih unit</option>
                                <option>PMU</option>
                                <option>Utility</option>
                                <option>JOTRE</option>
                                <option>BISMO</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kategori *</label>
                            <select id="workCategory" class="form-select" required>
                                <option value="">Pilih kategori</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Safety Inspection">Safety Inspection</option>
                                <option value="Safety Induction">Safety Induction</option>
                                <option value="Toolbox Meeting">Toolbox Meeting</option>
                                <option value="Safety Patrol">Safety Patrol</option>
                                <option value="Risk Assessment">Risk Assessment</option>
                                <option value="Emergency Drill">Emergency Drill</option>
                                <option value="Monitoring">Monitoring</option>
                                <option value="Meeting">Meeting</option>
                                <option value="Environment">Environment</option>
                                <option value="Cleaning">Cleaning</option>
                                <option value="Perbaikan">Perbaikan</option>
                                <option value="Sosialisasi">Sosialisasi</option>
                                <option value="Safety">Safety</option>
                                <option value="Inspection">Inspection</option>
                                <option value="Emergency">Emergency</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pelaksana *</label>
                            <input id="workExecutor" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai *</label>
                            <input type="date" id="workStart" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Selesai *</label>
                            <input type="date" id="workEnd" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Lokasi *</label>
                            <input id="workLocation" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status *</label>
                            <select id="workStatus" class="form-select" required>
                                <option>Belum Mulai</option>
                                <option>Berlangsung</option>
                                <option>Selesai</option>
                                <option>Ditunda</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-green">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Data demo sementara; belum tersimpan ke database MySQL.
    let works = [
        {id:1, name:'Pengecekan Turbin Unit 1', unit:'PMU', category:'Maintenance', start:'2025-01-10', end:'2025-01-12', location:'PLTP Dieng', executor:'Tim PMU', status:'Selesai'},
        {id:2, name:'Perbaikan Fire Hydrant', unit:'Utility', category:'Safety', start:'2025-01-11', end:'2025-01-13', location:'Area Plant', executor:'Tim Utility', status:'Berlangsung'},
        {id:3, name:'Inspeksi APD', unit:'JOTRE', category:'Inspection', start:'2025-01-12', end:'2025-01-12', location:'Workshop', executor:'Tim JOTRE', status:'Selesai'},
        {id:4, name:'Sosialisasi K3', unit:'BISMO', category:'Sosialisasi', start:'2025-01-14', end:'2025-01-14', location:'Ruang Meeting', executor:'Tim BISMO', status:'Selesai'},
        {id:5, name:'Pembersihan Area BOP', unit:'PMU', category:'Cleaning', start:'2025-01-15', end:'2025-01-16', location:'Area BOP', executor:'Kontraktor', status:'Berlangsung'},
        {id:6, name:'Penggantian Lampu', unit:'Utility', category:'Perbaikan', start:'2025-01-17', end:'2025-01-17', location:'Gedung Admin', executor:'Tim Utility', status:'Selesai'},
        {id:7, name:'Drill Evakuasi', unit:'JOTRE', category:'Emergency', start:'2025-01-18', end:'2025-01-18', location:'Area Plant', executor:'Tim JOTRE', status:'Belum Mulai'},
        {id:8, name:'Pembersihan Limbah', unit:'BISMO', category:'Environment', start:'2025-01-20', end:'2025-01-21', location:'Area Workshop', executor:'Kontraktor', status:'Ditunda'},
        {id:9, name:'Monitoring Emisi', unit:'PMU', category:'Monitoring', start:'2025-01-22', end:'2025-01-22', location:'Stack Gas', executor:'Tim PMU', status:'Belum Mulai'},
        {id:10, name:'Perawatan Jalan Akses', unit:'Utility', category:'Maintenance', start:'2025-01-23', end:'2025-01-24', location:'Akses Utama', executor:'Tim Utility', status:'Berlangsung'}
    ];
    let selectedId = 1;
    let currentPage = 1;
    let trendChart, statusChart, categoryChart, detailChart;
    const $ = id => document.getElementById(id);

    function formatDate(date) {
        if (!date) return '-';
        return new Date(date + 'T00:00:00').toLocaleDateString('id-ID', {
            day:'2-digit', month:'short', year:'numeric'
        });
    }

    function getFilteredWorks() {
        const unit = $('unitFilter').value;
        const status = $('statusFilter').value;
        const search = ($('searchInput').value + ' ' + $('tableSearch').value).trim().toLowerCase();
        const startDate = $('startDate').value;

        return works.filter(w => {
            const matchesUnit = !unit || w.unit === unit;
            const matchesStatus = !status || w.status === status;
            const haystack = `${w.name} ${w.location} ${w.executor} ${w.category} ${w.unit}`.toLowerCase();
            const matchesSearch = !search || haystack.includes(search);
            const matchesDate = !startDate || w.end >= startDate;
            return matchesUnit && matchesStatus && matchesSearch && matchesDate;
        });
    }

    function statusClass(status) {
        return {
            'Selesai':'status-selesai',
            'Berlangsung':'status-berlangsung',
            'Ditunda':'status-ditunda',
            'Belum Mulai':'status-belum'
        }[status] || 'status-belum';
    }

    function renderTable() {
        const filtered = getFilteredWorks();
        const perPage = Number($('perPage').value);
        const totalPages = Math.max(1, Math.ceil(filtered.length / perPage));
        if (currentPage > totalPages) currentPage = totalPages;

        const startIndex = (currentPage - 1) * perPage;
        const pageItems = filtered.slice(startIndex, startIndex + perPage);

        $('workTableBody').innerHTML = pageItems.length
            ? pageItems.map((w, i) => `
                <tr>
                    <td>${startIndex + i + 1}</td>
                    <td>${escapeHtml(w.name)}</td>
                    <td>${escapeHtml(w.unit)}</td>
                    <td>${escapeHtml(w.category)}</td>
                    <td>${formatDate(w.start)}</td>
                    <td>${formatDate(w.end)}</td>
                    <td>${escapeHtml(w.location)}</td>
                    <td>${escapeHtml(w.executor)}</td>
                    <td><span class="status ${statusClass(w.status)}">${escapeHtml(w.status)}</span></td>
                    <td class="text-nowrap">
                        <button class="action-btn" title="Detail" data-action="view" data-id="${w.id}">◉</button>
                        <button class="action-btn" title="Edit" data-action="edit" data-id="${w.id}">✎</button>
                        <button class="action-btn delete" title="Hapus" data-action="delete" data-id="${w.id}">⌫</button>
                    </td>
                </tr>
            `).join('')
            : '<tr><td colspan="10" class="text-center py-5 text-secondary">Tidak ada pekerjaan yang cocok dengan filter.</td></tr>';

        $('tableInfo').textContent = filtered.length
            ? `Menampilkan ${startIndex + 1}–${Math.min(startIndex + perPage, filtered.length)} dari ${filtered.length} data demo`
            : 'Tidak ada data';

        let buttons = '';
        for (let p = 1; p <= totalPages; p++) {
            buttons += `<button class="${p === currentPage ? 'active' : ''}" data-page="${p}">${p}</button>`;
        }

        $('pagination').innerHTML = buttons;
        updateStats(filtered);
        updateCharts(filtered);
    }

    function updateStats(data) {
        $('totalCount').textContent = data.length;
        $('doneCount').textContent = data.filter(w => w.status === 'Selesai').length;
        $('ongoingCount').textContent = data.filter(w => w.status === 'Berlangsung').length;
        $('pausedCount').textContent = data.filter(w => w.status === 'Ditunda').length;
    }

    function updateCharts(data) {
        const units = ['PMU', 'Utility', 'JOTRE', 'BISMO'];
        const statuses = ['Selesai', 'Berlangsung', 'Ditunda', 'Belum Mulai'];
        const categories = [...new Set(data.map(w => w.category))];

        trendChart.data.datasets[0].data = units.map(unit => data.filter(w => w.unit === unit).length);
        trendChart.data.datasets[1].data = units.map(unit => data.filter(w => w.unit === unit && w.status === 'Selesai').length);
        trendChart.update();

        statusChart.data.labels = statuses;
        statusChart.data.datasets[0].data = statuses.map(s => data.filter(w => w.status === s).length);
        statusChart.update();

        categoryChart.data.labels = categories;
        categoryChart.data.datasets[0].data = categories.map(c => data.filter(w => w.category === c).length);
        categoryChart.update();

        detailChart.data.labels = units;
        detailChart.data.datasets[0].data = units.map(u => data.filter(w => w.unit === u).length);
        detailChart.data.datasets[1].data = units.map(u => {
            const group = data.filter(w => w.unit === u);
            return group.length ? Math.round(group.filter(w => w.status === 'Selesai').length / group.length * 100) : 0;
        });
        detailChart.update();
    }

    function renderDetail(id) {
        const w = works.find(item => item.id === Number(id));
        if (!w) return;

        selectedId = w.id;
        $('detailContent').innerHTML = `
            <div class="mb-3">
                <span class="status ${statusClass(w.status)}">${escapeHtml(w.status)}</span>
            </div>
            <div class="detail-list">
                <span class="detail-label">Nama Pekerjaan</span><strong>${escapeHtml(w.name)}</strong>
                <span class="detail-label">Unit</span><span>${escapeHtml(w.unit)}</span>
                <span class="detail-label">Kategori</span><span>${escapeHtml(w.category)}</span>
                <span class="detail-label">Tanggal Mulai</span><span>${formatDate(w.start)}</span>
                <span class="detail-label">Tanggal Selesai</span><span>${formatDate(w.end)}</span>
                <span class="detail-label">Lokasi</span><span>${escapeHtml(w.location)}</span>
                <span class="detail-label">Pelaksana</span><span>${escapeHtml(w.executor)}</span>
            </div>
        `;
    }

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({
            '&':'&amp;', '<':'&lt;', '>':'&gt;', '"':'&quot;', "'":'&#039;'
        }[char]));
    }

    function resetForm() {
        $('workForm').reset();
        $('editId').value = '';
        $('modalTitle').textContent = 'Tambah Pekerjaan';
    }

    function editWork(id) {
        const w = works.find(item => item.id === Number(id));
        if (!w) return;

        $('editId').value = w.id;
        $('workName').value = w.name;
        $('workUnit').value = w.unit;
        $('workCategory').value = w.category;
        $('workExecutor').value = w.executor;
        $('workStart').value = w.start;
        $('workEnd').value = w.end;
        $('workLocation').value = w.location;
        $('workStatus').value = w.status;
        $('modalTitle').textContent = 'Edit Pekerjaan';

        bootstrap.Modal.getOrCreateInstance($('workModal')).show();
    }

    // EKSPOR KE EXCEL XLSX
    function downloadXLSX() {
        if (typeof XLSX === 'undefined') {
            alert('Library Excel belum berhasil dimuat. Periksa koneksi internet lalu refresh halaman.');
            return;
        }

        const rows = getFilteredWorks();

        const headers = [
            'No.',
            'Nama Pekerjaan',
            'Unit',
            'Kategori',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Lokasi',
            'Pelaksana',
            'Status'
        ];

        function formatExcelDate(date) {
            if (!date) return '';

            const match = String(date).match(/^(\d{4})-(\d{2})-(\d{2})$/);

            if (match) {
                return `${match[3]}/${match[2]}/${match[1]}`;
            }

            return String(date);
        }

        const data = rows.map((w, index) => [
            index + 1,
            w.name ?? '',
            w.unit ?? '',
            w.category ?? '',
            formatExcelDate(w.start),
            formatExcelDate(w.end),
            w.location ?? '',
            w.executor ?? '',
            w.status ?? ''
        ]);

        const worksheet = XLSX.utils.aoa_to_sheet([headers, ...data]);

        // Lebar kolom agar teks dan tanggal tidak terpotong
        worksheet['!cols'] = [
            { wch: 6 },
            { wch: 32 },
            { wch: 18 },
            { wch: 24 },
            { wch: 18 },
            { wch: 18 },
            { wch: 30 },
            { wch: 24 },
            { wch: 18 }
        ];

        const workbook = XLSX.utils.book_new();

        XLSX.utils.book_append_sheet(
            workbook,
            worksheet,
            'Daily Work'
        );

        XLSX.writeFile(workbook, 'daily-work.xlsx');
    }

    function initCharts() {
        const common = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        boxWidth: 8,
                        font: { size: 10 }
                    }
                }
            }
        };

        trendChart = new Chart($('trendChart'), {
            type: 'line',
            data: {
                labels: ['PMU', 'Utility', 'JOTRE', 'BISMO'],
                datasets: [
                    {
                        label: 'Jumlah pekerjaan',
                        data: [],
                        borderColor: '#3979df',
                        backgroundColor: '#3979df',
                        tension: .35
                    },
                    {
                        label: 'Selesai',
                        data: [],
                        borderColor: '#139b69',
                        backgroundColor: '#139b69',
                        tension: .35
                    }
                ]
            },
            options: {
                ...common,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0, font: { size: 9 } }
                    },
                    x: { ticks: { font: { size: 9 } } }
                }
            }
        });

        statusChart = new Chart($('statusChart'), {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    backgroundColor: ['#139b69', '#f4c400', '#f0444b', '#a0a8b2'],
                    borderWidth: 2
                }]
            },
            options: { ...common, cutout: '65%' }
        });

        categoryChart = new Chart($('categoryChart'), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Pekerjaan',
                    data: [],
                    backgroundColor: ['#3979df', '#139b69', '#f9a51a', '#9254de', '#08a0a0']
                }]
            },
            options: {
                ...common,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0, font: { size: 9 } }
                    },
                    x: { ticks: { font: { size: 9 } } }
                }
            }
        });

        detailChart = new Chart($('detailChart'), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [
                    {
                        label: 'Jumlah Pekerjaan',
                        data: [],
                        backgroundColor: '#70a2f2',
                        yAxisID: 'y'
                    },
                    {
                        label: 'Persentase Selesai (%)',
                        data: [],
                        type: 'line',
                        borderColor: '#139b69',
                        backgroundColor: '#139b69',
                        yAxisID: 'y1',
                        tension: .3
                    }
                ]
            },
            options: {
                ...common,
                scales: {
                    y: {
                        beginAtZero: true,
                        position: 'left',
                        ticks: { precision: 0, font: { size: 9 } }
                    },
                    y1: {
                        beginAtZero: true,
                        max: 100,
                        position: 'right',
                        grid: { drawOnChartArea: false },
                        ticks: {
                            font: { size: 9 },
                            callback: value => value + '%'
                        }
                    }
                }
            }
        });
    }

    $('workTableBody').addEventListener('click', event => {
        const button = event.target.closest('[data-action]');
        if (!button) return;

        const id = Number(button.dataset.id);

        if (button.dataset.action === 'view') renderDetail(id);
        if (button.dataset.action === 'edit') editWork(id);

        if (button.dataset.action === 'delete') {
            if (confirm('Yakin ingin menghapus pekerjaan ini dari data demo?')) {
                works = works.filter(w => w.id !== id);
                renderTable();

                if (selectedId === id) {
                    $('detailContent').innerHTML =
                        '<div class="empty-state">Pilih pekerjaan untuk melihat detail.</div>';
                }
            }
        }
    });

    $('workForm').addEventListener('submit', event => {
        event.preventDefault();

        const id = $('editId').value;
        const start = $('workStart').value;
        const end = $('workEnd').value;

        if (end < start) {
            alert('Tanggal selesai tidak boleh lebih awal daripada tanggal mulai.');
            return;
        }

        const record = {
            id: id ? Number(id) : Math.max(0, ...works.map(w => w.id)) + 1,
            name: $('workName').value.trim(),
            unit: $('workUnit').value,
            category: $('workCategory').value,
            executor: $('workExecutor').value.trim(),
            start,
            end,
            location: $('workLocation').value.trim(),
            status: $('workStatus').value
        };

        if (id) {
            works = works.map(w => w.id === Number(id) ? record : w);
        } else {
            works.unshift(record);
        }

        bootstrap.Modal.getOrCreateInstance($('workModal')).hide();
        resetForm();
        currentPage = 1;
        renderTable();
        renderDetail(record.id);
    });

    ['unitFilter', 'statusFilter', 'searchInput', 'tableSearch', 'startDate', 'perPage']
        .forEach(id => {
            $(id).addEventListener('input', () => {
                currentPage = 1;
                renderTable();
            });
        });

    $('pagination').addEventListener('click', event => {
        if (!event.target.dataset.page) return;

        currentPage = Number(event.target.dataset.page);
        renderTable();
    });

    document.querySelectorAll('[data-unit]').forEach(button => {
        button.addEventListener('click', () => {
            $('unitFilter').value = button.dataset.unit;

            document.querySelectorAll('[data-unit]').forEach(b => {
                b.classList.remove('active');
            });

            button.classList.add('active');
            currentPage = 1;
            renderTable();
        });
    });

    document.querySelectorAll('.quick-status input').forEach(input => {
        input.addEventListener('change', () => {
            const selected = [
                ...document.querySelectorAll('.quick-status input:checked')
            ].map(i => i.value);

            const allCheckbox = document.querySelector('.quick-status input[value=""]');

            if (input.value === '' && input.checked) {
                document.querySelectorAll('.quick-status input').forEach(i => {
                    if (i.value !== '') i.checked = false;
                });

                $('statusFilter').value = '';
            } else {
                if (input.value !== '') allCheckbox.checked = false;

                const specific = selected.filter(v => v !== '');
                $('statusFilter').value = specific.length === 1 ? specific[0] : '';
            }

            currentPage = 1;
            renderTable();
        });
    });

    $('downloadBtn').addEventListener('click', downloadXLSX);

    initCharts();
    renderTable();
    renderDetail(selectedId);
</script>
</body>
</html>
