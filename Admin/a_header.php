<header>
  <nav class="wrapper">
    <img class="logo" src="/Project-Rekam-Medis/img/logo.png" alt="logo">
    <ul class="navlinks">
      <li><a href="dashboard.php">Home</a></li>
      <li><a href="pasien.php">Pasien</a></li>
      <li><a href="kunjungan.php">Kunjungan</a></li>
      <li><a href="dokter.php">Dokter</a></li>
      <li><a href="poliklinik.php">Poliklinik</a></li>
      <li><a href="../index.php" class="logout">Logout</a></li>
    </ul>
  </nav>
</header>

<style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}


.wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100px;
  background-color: #A57865;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 28px;
  z-index: 1000;
}

.logo {
  height: 160px;
  padding-top:30px;
}

.navlinks {
  display: flex;
  list-style: none;
}

.navlinks li {
  margin: 0 25px;
}

.navlinks li a {
  font-size: 19px;
  font-weight: 500;
  color: #ffffff;
  text-decoration: none;
  transition: color 0.3s ease;
}

.navlinks li a:hover {
  color: #daa087;
}

.logout{
    width: 48%;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    border-radius: 7px;
    font-weight: bold;
    color: white;
    border: none;
    background-color:rgb(211, 136, 136);

}
.logout:hover {
            background-color:rgb(119, 62, 58);
        }
</style>
