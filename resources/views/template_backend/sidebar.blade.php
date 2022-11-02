<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link" style="">
    <img src="{{ asset('img/alfitrah.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">SMPIT Alfitrah</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
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
        @elseif (Auth::user()->role == 'Guru' && Auth::user()->guru(Auth::user()->id))
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
        @elseif (Auth::user()->role == 'Siswa' && Auth::user()->siswa(Auth::user()->no_induk))
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
        @else
          <li class="nav-item has-treeview">
            <a href="{{ url('/') }}" class="nav-link" id="Home">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
