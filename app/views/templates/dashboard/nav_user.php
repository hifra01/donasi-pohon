<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= BASEURL; ?>assets/dashboard/img/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, <?= AuthManager::getUserName() ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Akun</div>
                <div class="dropdown-divider"></div>
                <a href="<?= BASEURL ?>auth/logout" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= BASEURL; ?>">Donasi Pohon</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= BASEURL; ?>">DP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown">
                <a href="<?= BASEURL; ?>user" class="nav-link">
                    <i class="fas fa-home"></i><span>Beranda</span>
                </a>
            </li>
        </ul>
    </aside>
</div>