  <!-- Navbar -->
  <header class="mb-auto">
    <div>

      <!-- Klickbar logga -->

      <?php if (isset($_SESSION["isLoggedIn"])) { ?>
        <h3 class="mb-0 mb-3 mt-1"><a style="text-decoration: none!important; color: white;" href="?page=flow"><canvas id="ctx" width="200" height="50"></canvas></a></h3>
      <?php } else { ?>
        <h3 class="mb-0 mb-3 mt-1"><a style="text-decoration: none!important; color: white;" href="?page=login"><canvas id="ctx" width="200" height="50"></canvas></a></h3>
      <?php } ?>
    </div>
  </header>