<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item @if(Route::is('dashboard')) active @endif">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-apps menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Data</li>
        <li class="nav-item @if(Route::is('data-wisata.*')) active @endif">
            <a class="nav-link" href="{{ route('data-wisata.index') }}">
                <i class="mdi mdi-map-marker menu-icon"></i>
                <span class="menu-title">Data Wisata</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Route::is('data-berita.*')) active @endif" href="{{ route('data-berita.index') }}">
                <i class="mdi mdi-newspaper menu-icon"></i>
                <span class="menu-title">Data Berita</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Route::is('data-review.*')) active @endif" href="{{ route('data-review.index') }}">
                <i class="mdi mdi-message-processing menu-icon"></i>
                <span class="menu-title">Data Review</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(Route::is('data-admin.*')) active @endif" href="{{ route('data-admin.index') }}">
                <i class="mdi mdi-account-circle menu-icon"></i>
                <span class="menu-title">Data Admin</span>
            </a>
        </li>
    </ul>
</nav>
