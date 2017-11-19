    <input type="checkbox" id="menunav">
    <label for="menunav" class="open-menu">
      <span class="ion-navicon-round"></span>
    </label>
    <nav class="navbar">
      <ul>
        <li>
          <label class="close-menu" for="menunav">
            <span class="ion-close-circled"></span>
          </label>
        </li>
        <li><a class="navpicto" href="index.php">Home</a></li>
        <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 1): ?>
          <li><a class="navtype" href="perfil.php"><?=$_SESSION['user']; ?></a></li>
        <?php else: ?>
                <li><a class="navtype" href="registro.php">Registro</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 1): ?>
          <li><a class="navpicto" href="logout.php">Desloguear</a></li>
        <?php else: ?><li><a class="navpicto" href="login.php">Login</a></li>
        <?php endif; ?>

        <li><a class="navtype" href="faq.php">FAQ</a></li>
      </ul>
    </nav>
