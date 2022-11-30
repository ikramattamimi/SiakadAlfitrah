<li class="nav-item has-treeview">
    <a href="{{ url('/') }}" class="nav-link" id="Home">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('absen.harian') }}" class="nav-link" id="AbsenGuru">
        <i class="fas fa-calendar-check nav-icon"></i>
        <p>Absen</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('jadwal.guru') }}" class="nav-link" id="JadwalGuru">
        <i class="fas fa-calendar-alt nav-icon"></i>
        <p>Jadwal</p>
    </a>
</li>
