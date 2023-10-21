
<style>
    nav ul li a:hover {
        background-color:grey;
        color:white !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-secondary p-2">
  <div class="container-fluid">
    <a class="navbar-brand text-color" href="#">
        <img class="rounded-circle border border-primary" style="width: 35px;" alt="avatar1" src="assets/images/logo.png" />
        Voting System in PHP
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav ms-auto">
           <li class="nav-item">
            <a class="nav-link text-color" href="<?=go('login.php')?>">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-color" href="<?=go('signup.php')?>">SIGNUP</a>
          </li>
        </ul>
    </div>
  </div>
</nav>
