<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->routeIs('administrators.dashboard') ? 'active' : '' }}">
      <a href="{{ route('administrators.dashboard') }}" class="sidebar-link">
        <i class="bi bi-grid-fill"></i>
        <span>Beranda</span>
      </a>
    </li>

    <li class="sidebar-title">Managemen Data</li>

    <li class="sidebar-item {{ request()->routeIs('administrators.items.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.items.index') }}" class="sidebar-link">
        <i class="bi bi-collection-fill"></i>
        <span>Barang</span>
      </a>
    </li>

    <li class="sidebar-item {{ request()->routeIs('administrators.program-studies.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.program-studies.index') }}" class="sidebar-link">
        <i class="bi bi-bookmarks-fill"></i>
        <span>Program Studi</span>
      </a>
    </li>

    <li class="sidebar-item {{ request()->routeIs('administrators.subjects.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.subjects.index') }}" class="sidebar-link">
        <i class="bi bi-book-half"></i>
        <span>Mata Kuliah</span>
      </a>
    </li>

    <li class="sidebar-item has-sub">
      <a href="#" class="sidebar-link">
        <i class="bi bi-stack"></i>
        <span>Peminjaman</span>
      </a>
      <ul class="submenu {{ request()->routeIs('administrators.borrowings*') ? 'active' : '' }}">
        <li class="submenu-item {{ request()->routeIs('administrators.borrowings.index') ? 'active' : '' }}">
          <a href="{{ route('administrators.borrowings.index') }}">Manage Data<br/>Peminjaman</a>
        </li>
        <li class="submenu-item {{ request()->routeIs('administrators.borrowings-report.index') ? 'active' : '' }}">
          <a href="{{ route('administrators.borrowings-report.index') }}">Laporan</a>
        </li>
      </ul>
    </li>

    <li class="sidebar-title">Managemen Akun</li>

    <li class="sidebar-item {{ request()->routeIs('administrators.students.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.students.index') }}" class="sidebar-link">
        <i class="bi bi-people-fill"></i>
        <span>Mahasiswa</span>
      </a>
    </li>

    <li class="sidebar-item {{ request()->routeIs('administrators.profile-settings.*') ? 'active' : '' }}">
      <a href="{{ route('administrators.profile-settings.index') }}" class="sidebar-link">
        <i class="bi bi-person-fill-gear"></i>
        <span>Pengaturan Profil</span>
      </a>
    </li>

    <li class="sidebar-title"></li>

    <li class="sidebar-item">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="{{ route('logout') }}" class="sidebar-link" id="logout">
          <i class="bi bi-box-arrow-right"></i>
          <span>Keluar</span>
        </a>
      </form>
    </li>
  </ul>
</div>
