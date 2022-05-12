  <!-- Navbar -->
  <header class="mb-auto">
    <div>
      <?php if (isset($_SESSION["isLoggedIn"])) { ?>
        <h3 class="mb-0"><a style="text-decoration: none!important; color: white;" href="?page=flow">Kwitter</a></h3>
      <?php } else { ?>
        <h3 class="mb-0"><a style="text-decoration: none!important; color: white;" href="?page=login">Kwitter</a></h3>
      <?php } ?>
 <!--      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="?page=login">Sign in</a>
        <a class="nav-link" href="?page=flow">Flow</a> -->
        <!-- <a class="nav-link" href="?page=myflow">My Flow</a> -->
   <!--      <a class="nav-link" href="?page=postmsg">Post Kwitts</a> -->
        <!-- <a class="nav-link" href="?page=update">Delete from Table</a> -->
<!--       </nav> -->
    </div>
  </header>