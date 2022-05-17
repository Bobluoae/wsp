  <!-- Navbar -->
  <header class="mb-auto">
    <div>
      <!-- Klickbar logga -->
      <?php if (isset($_SESSION["isLoggedIn"])) { ?>
        <h3 class="mb-0"><a style="text-decoration: none!important; color: white;" href="?page=flow">Kwitter</a></h3>
      <?php } else { ?>
        <h3 class="mb-0"><a style="text-decoration: none!important; color: white;" href="?page=login">Kwitter</a></h3>
      <?php } ?>
    </div>
  </header>