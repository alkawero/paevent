<nav class="navbar navbar-expand navbar-dark bg-success static-top">

    <a class="navbar-brand mr-1" href="<?php echo site_url('admin') ?>">Seminar Pahoa</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    

    <!-- Navbar -->
    <ul class="navbar-nav push-right">
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Login/logout')?>" role="button"
                aria-expanded="false">
				<i class="fas fa-user-circle fa-fw"></i>				
				Logout
            </a>            
        </li>
    </ul>

</nav>
