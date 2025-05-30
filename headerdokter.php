<header>
  <nav class="wrapper">
    <img class="logo" src="/Project-Rekam-Medis/img/logo.png" alt="logo">
    <ul class="navlinks">
      <li><a href="/Project-Rekam-Medis/Dokter/rekammedis.php">Rekam Medis</a></li>
      <li><a href="/Project-Rekam-Medis/Dokter/dokter.php">Profil Dokter</a></li>
      <li><a href="/Project-Rekam-Medis/Dokter/kunjungan.php">Kunjungan</a></li>
    </ul>
  </nav>
</header>
<style>
    *{
    box-sizing:border-box;
    margin: 0;
    padding: 0;
}

.header {
 display: flex;
 width: 100%;
}

.wrapper {
 display: flex;
 justify-content: space-between;
 align-items: center;
 font-size: 20px;
 padding: 15px;
 width: 100%;
 height: 70px;
 background-color: #A57865;
}

.logo{
    height: 97px;
    padding-top: 11px;
}

li, a{
 font-weight: 500;
 font-size: 19px;
 color:rgb(255, 255, 255);
 text-decoration: none;
 font-family: 'Times New Roman', Times, serif;


}

.navlinks {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
}

.navlinks li {
    display: inline-block;
    padding: 8px 20px;
}

.navlinks li a {
    transition: all 0.3s ease 0s;
}

.navlinks li a:hover{
    color: #daa087;
}
</style>