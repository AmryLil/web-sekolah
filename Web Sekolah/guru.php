<?php
session_start();

$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$isAdmin = isset($_SESSION['status']) && $_SESSION['status'] === 'admin';
$isGuru = isset($_SESSION['status']) && $_SESSION['status'] === 'guru';
$isMurid = isset($_SESSION['status']) && $_SESSION['status'] === 'siswa';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <style>
    body {
      font-family: Tahoma;
      margin: 0;
      padding: 0;
    }
    .logo {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    header {
      position: fixed;
      width: 100%;
      z-index: 10;
      background-color: white;
    }
    .elementhead {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 130px;
    }
    header nav {
      display: flex;
      column-gap: 10px;
    }
    a {
      color: black;
      text-decoration: none;
    }
    a:hover {
      color: rgb(87, 87, 252);
    }
    .header-blur {
      backdrop-filter: blur(5px);
      background-color: rgba(220, 220, 220, 0.8); 
    }
    .con div {
      display: flex;
      flex-direction: column;
      background-color: white;
      padding: 2px 10px;
      border-radius: 10px;
    }
    .con {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-top: 17px;
      box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3);
      padding: 15px;
      border-radius: 15px;
      background-color: ghostwhite;
    }
    .con div label {
      font-weight: bold;
      font-size: 15px;
      margin-bottom: 5px;
    }
    .con div div {
      margin-left: 10px;
    }
  </style>
  <body>
    <script src="handlebg.js"></script>
    <script>
      window.addEventListener("DOMContentLoaded", () => {
        const profileButton = document.getElementById("profileButton");
        const profileSidebar = document.getElementById("profileSidebar");
        const close = document.querySelector(".close");
        const opa = document.querySelector(".opa");

        profileButton.addEventListener("click", function () {
          if (profileSidebar.style.display === "none") {
            profileSidebar.style.display = "block";
            opa.style.display = "block";
          } else {
            profileSidebar.style.display = "none";
            opa.style.display = "none";
          }
        });
        close.addEventListener("click", function () {
          profileSidebar.style.display = "none";
          opa.style.display = "none";
        });
      });
    </script>
    <header class="header-blur">
      <div
        class="opa"
        style="
          width: 1500px;
          height: 800px;
          position: fixed;
          top: 0px;
          right: 0px;
          background-color: black;
          opacity: 0.5;
          z-index: 20;
          display: none;
        "
      ></div>
      <div
        id="profileSidebar"
        style="
          display: none;
          position: absolute;
          right: 0px;
          top: 0px;
          width: 350px;
          background: rgb(44, 76, 156);
          background: linear-gradient(
            180deg,
            rgba(44, 76, 156, 1) 0%,
            rgba(44, 76, 156, 1) 15%,
            rgba(255, 255, 255, 1) 15%
          );
          height: 600px;
          padding: 10px 30px;
          z-index: 200;
        "
      >
        <div style="">
          <div
            class="close"
            style="
              position: absolute;
              left: 10px;
              top: 5px;
              font-weight: bold;
              font-size: 20px;
              cursor: pointer;
              color: white;
            "
          >
            x
          </div>
          <div
            style="
              margin-top: 30px;
              display: flex;
              flex-direction: column;
              justify-content: center;
              align-items: center;
            "
          >
            <div
              style="
                width: 110px;
                height: 110px;
                overflow: hidden;
                border-radius: 10px;
              "
            >
              <img src="../image/noprofile.png" alt="" style="width: 100%" />
            </div>
            <div style="font-weight: bold; padding-top: 20px">Alex Telles</div>
          </div>
          <div class="con">
            <div>
              <label>Email</label>
              <div>alex@example.com</div>
            </div>
            <div>
              <label>Whatsapp</label>
              <div>08245677645</div>
            </div>
            <div>
              <label>Kelas</label>
              <div>A</div>
            </div>
            <div>
              <label>Jurusan</label>
              <div>IPA</div>
            </div>
            <div>
              <label>Status</label>
              <div>Siswa</div>
            </div>
          </div>
          <div style="display: flex; justify-content: center">
            <div
              style="
                padding: 5px 16px;
                font-weight: bold;
                font-size: 20px;
                border: none;
                color: dimgray;
                margin-top: 20px;
                cursor: pointer;
              "
              onclick="window.location.href='auth_logout.php'"
            >
              Log out
            </div>
          </div>
        </div>
      </div>

      <div
        class="contact-info"
        style="
          width: 100%;
          background-color: #2c4c9c;
          display: flex;
          padding: 8px;
          flex-direction: row;
          justify-content: center;
          column-gap: 30px;
          color: white;
          font-size: 14px;
        "
      >
        <div style="display: flex; column-gap: 4px">
          <i class="fa fa-map-marker" style="font-size: 17px"> </i>
          <div>
            Konoha High School, 456 Hokage Avenue, Leaf Village, Fire Country
          </div>
        </div>
        <div style="display: flex; column-gap: 4px">
          <i class="fa fa-phone" style="font-size: 17px"></i>
          <div>+62 8237447743</div>
        </div>
        <div style="display: flex; column-gap: 4px">
          <i class="fa fa-envelope" style="font-size: 17px"></i>
          <div>example@gmail.com</div>
        </div>
      </div>
      <!-- Bagian navigasi dan logo -->
      <div class="elementhead">
        <div class="logo">
          <div
            style="
              width: 60px;
              height: 60px;
              object-fit: cover;
              overflow: hidden;
            "
          >
            <img style="width: 100%" src="../image/logo.png" alt="" />
          </div>
          <div
            style="
              display: flex;
              flex-direction: column;
              font-size: 17px;
              font-family: 'Trebuchet MS', sans-serif;
            "
          >
            <div>Konoha</div>
            <div>High School</div>
          </div>
        </div>
        <div>
          <nav
            style="
              column-gap: 50px;
              font-weight: 400;
              font-size: 16px;
              display: flex;
              justify-content: center;
              transform: translateX(-15px);
            "
          >
            <a href="home.php" style="cursor: pointer; text-decoration: none"
              >Home</a
            >
            <a href="jurusan.php" style="cursor: pointer; text-decoration: none"
              >Jurusan</a
            >

            <a href="guru.php" style="cursor: pointer; text-decoration: none"
              >Guru</a
            >
            <a href="kontak.php" style="cursor: pointer; text-decoration: none"
              >Kontak</a
            >
            <?php if (!$isLoggedIn) : ?>
            <button
              style="
                transform: translateX(50px);
                padding: 5px 16px;
                font-weight: bold;
                background-color: rgb(100, 100, 253);
                font-size: 15px;
                border: none;
                box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3);
                border-radius: 5px;
                transform: translateY(-3px);
              "
            >
              <a href="login.html" style="text-decoration: none; color: white"
                >Login</a
              >
            </button>
            <?php endif; ?>

            <?php if ($isLoggedIn) : ?>
            <?php if ($isMurid) : ?>
            <a href="jadwal.php" style="cursor: pointer; text-decoration: none"
              >Jadwal</a
            >
            <a
              href="learnpage.php"
              style="cursor: pointer; text-decoration: none"
              >Learn</a
            >
            <?php endif; ?>
            <?php if ($isAdmin||$isGuru) : ?>
            <a
              href="crudlearn.php"
              style="cursor: pointer; text-decoration: none"
              >Learn</a
            >
            <?php endif; ?>
            <?php if ($isAdmin) : ?>
            <a
              href="./dashboard/guru/index.php"
              style="cursor: pointer; text-decoration: none"
              >Dashboard</a
            >
            <?php endif; ?>
            
            <?php endif; ?>
          </nav>
          
        </div>
        <?php if ($isLoggedIn) : ?>
        <a
              href="#"
              id="profileButton"
              style="cursor: pointer; text-decoration: none;display: flex; gap: 10px;justify-content: center;align-items: center;font-size: 13px;color:black;"
              >
              <div
                style="
                  width: 40px;
                  height: 40px;
                  overflow: hidden;
                  border-radius: 100%;
                "
              >
                <img style="width: 100%" src="../image/noprofile.png" alt="" />
              </div>
              <?php echo $_SESSION['nama'] ;?>
            </a>
          <?php endif; ?>
      </div>
    </header>

    <main style="height: 100%; padding-top: 110px;padding-bottom: 20px;">
      <div
        style="
          background-image: url('../image/bg1.jpg');
          width: 100%;
          height: 330px;
          background-position: center;
          border-radius: 10px;
          font-weight: bold;
        "
      >
        <div
          style="
            width: 100%;
            height: 100%;
            color: white;
            font-size: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: black;
            opacity: 0.5;
          "
        >
          <div>Sebuah investasi dalam ilmu pengetahuan adalah investasi dalam masa depan,</div>
          <div>dan guru adalah pemandunya</div>
        </div>
      </div>
      <div style="
        display: flex;
        justify-content:space-between;
        padding: 0px 80px;
        margin-top: 40px;
        font-weight: bold;
        font-size: xx-large;
         color:blue;
        margin-bottom: 70px;
        position: relative;
        ">
        <div>Daftar Guru</div>
        
      </div>
      <div
        style="
          width: 100%;
          display: flex;
          justify-content: center;
          flex-wrap: wrap;
          gap: 20px;
          column-gap: 70px;
          
          margin-top: 20px;
        "
      >
      
      <?php
      include "koneksi.php";

      $per_page = 8;
      if (!isset($_GET['page']) || $_GET['page'] <= 0) {
          $page = 1;
      } else {
          $page = $_GET['page'];
      }

      $start_from = ($page - 1) * $per_page;

      $sql = "SELECT * FROM guru LIMIT $start_from, $per_page";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($data = $result->fetch_assoc()) {
              $photo = $data["foto"];
              if ($data["foto"] == null) {
                  $photo = "../image/noprofile.png";
              } else {
                  $photo = "../foto/upload/" . $photo;
              }
              ?>
              <div class="cardupdate" 
              
              style="width: 15%;
                     height: 250px;
                     border-radius: 10px;
                     overflow: hidden;
                     padding:10px;
                     box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3);
                     position: relative;
                    ">
                  <div 
                      class="btnhapus" 
                      style="position:absolute;
                              top: 6px;
                               display: none;
                              z-index: 50;
                              background-color: white;
                              padding: 2px 1px;
                              ">
                    <i class="fa fa-trash-o" style="font-size:22px;color:red"></i>
                  </div>
                  <div style="height: 65%;
                      width: 100%;
                      background-image: url('<?php echo $photo; ?>');
                      background-size: cover; 
                      background-position: center;"></div>
                  <a   
                      class="cardupdate"
                      style="width: 100%; display: flex; flex-direction: column; align-items: center; padding-top: 10px; row-gap: 5px;"
                  >
                      <div style="font-weight: bold"><?php echo $data["nama"]; ?></div>
                      <div style="font-size: small"><?php echo $data["jabatan"]; ?></div>
                  </a>
                  <div style="padding: 0px 40px"><hr /></div>
                  <div style="display: flex; justify-content: center; column-gap: 10px">
                      <i class="fa fa-whatsapp" style="font-size: 20px"></i>
                      <i class="fa fa-envelope" style="font-size: 20px"></i>
                      <i class="fa fa-phone" style="font-size: 20px"></i>
                  </div>
              </div>
              <?php
          }

          echo "</div>";
          $sql_pagination = "SELECT COUNT(*) AS total FROM guru";
          $result_pagination = $conn->query($sql_pagination);
          $row_pagination = $result_pagination->fetch_assoc();
          $total_records = $row_pagination['total'];
          $total_pages = ceil($total_records / $per_page);

          echo "<div style='margin-top: 50px;display:flex;justify-content:center;gap:20px'>";
          for ($i = 1; $i <= $total_pages; $i++) {
              echo "<a style='font-weight:bold;font-size:15px;text-decoration:none;background-color:blue;padding:7px;color:white' href='?page=$i'>$i</a> ";
          }
      } else {
          echo "Tidak ada data guru.";
      }

      $conn->close();
      ?>

    </main>
    <footer
      style="
        background-color: #2c4c9c;
        height: 100px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 0px 50px;
        color: white;
      "
    >
      <div
        style="
          display: flex;
          justify-content: center;
          column-gap: 10px;
          color: white;
        "
      >
        <i class="fa fa-whatsapp" style="font-size: 25px"></i>
        <i class="fa fa-envelope" style="font-size: 22px"></i>
        <i class="fa fa-instagram" style="font-size: 24px"></i>
      </div>
      <div style="font-weight: 200">Copyright 2024 | Ulil Amry</div>
      <div class="logo">
        <div
          style="width: 60px; height: 60px; object-fit: cover; overflow: hidden"
        >
          <img style="width: 100%" src="../image/logo.png" alt="" />
        </div>
        <div
          style="
            display: flex;
            flex-direction: column;
            font-size: 17px;
            font-family: 'Trebuchet MS', sans-serif;
          "
        >
          <div>Konoha</div>
          <div>High School</div>
        </div>
      </div>
    </footer>
    <script>

      const haddledelete = (id)=>{
        let kom =  confirm('Apakah Anda yakin ingin menghapus data ini?');
        if (kom){
          window.location.href=`./crud/delete.php?id= ${id}`
        }else{
          

        }
      }

      let isEditClicked = false;
      function showedit() {
          const btnhapus = document.querySelectorAll('.btnhapus');
          const btnedit =document.querySelector('.btnedit')
          const note =document.querySelector('.note')
          const cardupdate = document.querySelectorAll('.cardupdate'); 
          
          isEditClicked = !isEditClicked;
          btnhapus.forEach((btn, index) => {
            if (isEditClicked) {
            btnedit.textContent = "Batal";
            btn.style.display = "block";
            note.style.display = "block";
            cardupdate[index].href=`./crud/update.php?id=${btn.id}`

          } else {
            btn.style.display = "none";
            note.style.display = "none";
            btnedit.textContent = "Edit";
            // cardupdate.remove
          }
    });
      }
    </script>

  </body>
</html>
