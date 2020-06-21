<?php
  if(!isset($_SESSION['usuarioLogado']) or empty($_SESSION['usuarioLogado'])) {
    header('location:../index.php');
  }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light py-0 container">
  <button class="navbar-toggler ml-auto my-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li onclick="window.location.href='Home.php'" class="nav-item active">
        <span class="nav-link">Início</span>
      </li>
      <li onclick="window.location.href='Perfil.php'" class="nav-item">
        <span class="nav-link">Perfil</span>
      </li>
      <li onclick="window.location.href='Sair.php'" class="nav-item">
        <span class="nav-link">Sair</span>
      </li>
    </ul>
  </div>
</nav>
