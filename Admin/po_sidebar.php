<div class="sidebar">
  <h2>Menu</h2>
  <ul>
    <li><a href="poliklinik.php">Form Poliklinik</a></li>
    <li><a href="poli_data.php">Data Poliklinik</a></li>
  </ul>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

 .sidebar {
  position: fixed;
  top: 100px;
  left: 0;
  width: 240px;
  height: calc(100vh - 100px);
  background-color: #F2D9CE;
  padding-top: 20px;
  overflow-y: auto;
}

.sidebar h2 {
  text-align: center;
  font-size: 24px;
  margin-bottom: 10px;
}

.sidebar ul {
  list-style: none;
  padding: 0;
}

.sidebar ul li {
  padding: 15px 20px;
}

.sidebar ul li a {
  text-decoration: none;
  font-size: 18px;
  color: #000;
  transition: background-color 0.3s ease;
  display: block;
  border-radius: 8px;
}

.sidebar ul li a:hover {
  background-color: #daa087;
}

</style>
