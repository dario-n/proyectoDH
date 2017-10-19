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
        <li><a href="index.php">Home</a></li>
        <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 1): ?><li><a href="functions/desloguear.php">Desloguear</a></li>
      <?php else: ?><li><a href="login.php">Login</a></li>
<?php endif; ?>
<?php if (isset($_SESSION['status']) && $_SESSION['status'] == 1): ?><li><a href="index.php">Registro</a></li>
<?php else: ?>
        <li><a href="registro.php">Registro</a></li>
<?php endif; ?>
        <li><a href="faq.php">FAQ</a></li>
      </ul>
    </nav>
