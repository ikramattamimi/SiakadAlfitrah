<li class="nav-item has-treeview">
    <a href="{{ url('/') }}" class="nav-link" id="Home">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('siswa.absen.harian') }}" class="nav-link" id="AbsenSiswa">
        <i class="fas fa-calendar-check nav-icon"></i>
        <p>Absensi</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('jadwal.siswa') }}" class="nav-link" id="JadwalSiswa">
        <i class="fas fa-calendar-alt nav-icon"></i>
        <p>Jadwal</p>
    </a>
</li>
