
<style>
    nav ul li a:hover {
        background-color:grey;
        color:white !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-secondary p-2">
  <div class="container-fluid">
    <a class="navbar-brand text-color" href="#">
        <img class="rounded-circle border border-primary" style="width: 35px;" alt="avatar1" src="../assets/images/logo.png" />
        Voting System in PHP
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-color" aria-current="page" href="<?=go('dashboard/dashboard.php')?>">DASHBOARD</a>
          </li>
          <?php if($_SESSION['user']['standard'] == 'group'): ?>
          <li class="nav-item">
            <a class="nav-link active text-color" aria-current="page" href="<?=go('dashboard/home.php')?>">HOME</a>
          </li>
        <?php endif; ?>
        </ul>
        
        <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-color" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?=$_SESSION['user']['username']?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Dashboard</a></li>
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item" href="<?=go('logout.php')?>">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
