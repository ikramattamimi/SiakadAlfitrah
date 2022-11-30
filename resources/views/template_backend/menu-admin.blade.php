<li class="nav-item">
    <a href="{{ route('admin.home') }}" class="nav-link" id="AdminHome">
        <i class="fas fa-home nav-icon"></i>
        <p>Dashboard Admin</p>
    </a>
</li>
<li class="nav-item has-treeview" id="liMasterData">
    <a href="#" class="nav-link" id="MasterData">
        <i class="nav-icon fas fa-edit"></i>
        <p>
            Master Data
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview ml-4">
        <li class="nav-item">
            <a href="{{ route('jadwal.index') }}" class="nav-link" id="DataJadwal">
                <i class="fas fa-calendar-alt nav-icon"></i>
                <p>Data Jadwal</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('guru.index') }}" class="nav-link" id="DataGuru">
                <i class="fas fa-users nav-icon"></i>
                <p>Data Guru</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kelas.index') }}" class="nav-link" id="DataKelas">
                <i class="fas fa-home nav-icon"></i>
                <p>Data Kelas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('siswa.index') }}" class="nav-link" id="DataSiswa">
                <i class="fas fa-users nav-icon"></i>
                <p>Data Siswa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mapel.index') }}" class="nav-link" id="DataMapel">
                <i class="fas fa-book nav-icon"></i>
                <p>Data Mapel</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link" id="DataUser">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Data User</p>
            </a>
        </li>
    </ul>
</li>
@if (Auth::user()->role == 'Admin')
@else
@endif
<li class="nav-item">
    <a href="{{ route('guru.absensi') }}" class="nav-link" id="AbsensiGuru">
        <i class="fas fa-calendar-check nav-icon"></i>
        <p>Absensi Guru</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('siswa.absensi') }}" class="nav-link" id="AbsensiSiswa">
        <i class="fas fa-calendar-check nav-icon"></i>
        <p>Absensi Siswa</p>
    </a>
</li>
