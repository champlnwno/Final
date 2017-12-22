
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="./">
      <img src="LOGOWAB1.png" width="70">Field Smile</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
          <?php if (isset($_SESSION['user_id'])) {?>
            <li class="nav-item active">
                <a class="nav-link" href="./">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./logout.php">Logout</a>
            </li>
            <?php }else{?>
            <li class="nav-item active">
                <a class="nav-link" href="./login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./register.php">Register</a>
            </li>
            <?php } ?>
        
      </ul>
    </div>
</nav>