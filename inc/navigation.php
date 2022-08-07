<?php 
session_start();
?>
<div class="container">
  <header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="../pages/index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <strong>Project</strong>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="../pages/index.php" class="nav-link px-2 link-secondary">Home</a></li>
      <li><a href="../pages/features.php" class="nav-link px-2 link-dark">Features</a></li>
      <li><a href="../pages/pricing.php" class="nav-link px-2 link-dark">Pricing</a></li>
      <li><a href="../pages/faqs.php" class="nav-link px-2 link-dark">FAQs</a></li>
      <li><a href="../pages/about.php" class="nav-link px-2 link-dark">About</a></li>
    </ul>
    <?php
if(isset($_SESSION['username'])){
  echo ' <div class="col-md-3 text-end">
  <a href="../pages/profile.php" class="btn btn-outline-primary me-2">Profile</a>
  <a href=" ../inc/logout.inc.php " class="btn btn-primary">Logout</a>
</div>';
}else{
echo'<div class="col-md-3 text-end">
<a href="../pages/login.php" class="btn btn-outline-primary me-2">Login</a>
<a href="../pages/sign_up.php" class="btn btn-primary">Sign-up</a>
</div>';
}
?>

  </header>
</div>