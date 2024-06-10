<?php
session_start();

// Mengecek apakah pengguna sudah login atau belum
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
    }
    a {
      color: black;
    }
    a:hover {
      color: rgb(87, 87, 252);
    }
    .header-blur {
      backdrop-filter: blur(5px);
      background-color: rgba(220, 220, 220, 0.8);
    }
    .image-content {
      width: 100%;
      height: 100%;
      color: white;
      font-size: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: black;
      background-size: cover;
      background-position: center;

      transition: opacity 0.5s;
      position: relative;
      object-fit: cover;
    }

    .text-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    .prev-button,
    .next-button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: white;
      font-size: 24px;
      cursor: pointer;
    }

    .prev-button {
      left: 10px;
    }

    .next-button {
      right: 10px;
    }
    .card:hover {
      background-color: black;
      color: white;
    }
    .card {
      padding-bottom: 20px;
      border-radius: 10px;
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
                  >Jadwal</a>
                <a
                  href="learnpage.php"
                  style="cursor: pointer; text-decoration: none"
                  >Learn</a>
              <?php endif; ?>
              <?php if ($isAdmin||$isGuru) : ?>
                <a
                  href="crudlearn.php"
                  style="cursor: pointer; text-decoration: none"
                  >Learn</a>
              <?php endif; ?>
              <?php if ($isAdmin) : ?>
                <a
                  href="./dashboard/guru/index.php"
                  style="cursor: pointer; text-decoration: none"
                  >Dashboard</a>
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
    <main style="height: 100%; padding-top: 112px">
      <div
        class="image-content"
        style="
          background-image: url('../image/bg5.avif');
          width: 100%;
          height: 500px;
        "
      >
        <button class="prev-button">◀️</button>
        <button class="next-button">▶️</button>
      </div>
      <div
        style="
          display: flex;
          flex-direction: row;
          column-gap: 20px;
          width: 100%;
          justify-content: center;
          margin-top: 20px;
        "
      >
        <div style="width: 25%; text-align: center">
          <div style="font-weight: bold; margin-bottom: 10px">
            Prakata Kepala Sekolah
          </div>
          <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ipsum
            accusantium excepturi rem magni labore vitae cumque, deleniti
            accusamus. Optio neque cumque ipsa similique ullam. Quisquam
            expedita illum deleniti necessitatibus Lorem, ipsum dolor sit amet
            consectetur adipisicing elit. Laborum quas repudiandae porro optio
            blanditiis nisi veritatis sunt, vel nihil, amet, est fugiat? Sunt
            iste, pariatur totam doloremque est enim nisi!
          </div>
        </div>
        <div style="width: 25%; text-align: center">
          <div style="font-weight: bold; margin-bottom: 10px">
            Qoutes Today
          </div>
          <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ipsum
            accusantium excepturi rem magni labore vitae cumque, deleniti
            accusamus. Optio neque cumque ipsa similique ullam. Quisquam
            expedita illum deleniti necessitatibus Lorem, ipsum dolor sit amet
            consectetur adipisicing elit. Laborum quas repudiandae porro optio
            blanditiis nisi veritatis sunt, vel nihil, amet, est fugiat? Sunt
            iste, pariatur totam doloremque est enim nisi!
          </div>
        </div>
        <div style="width: 25%; text-align: center">
          <div style="font-weight: bold; margin-bottom: 10px">
            Lorem Ipsum
          </div>
          <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ipsum
            accusantium excepturi rem magni labore vitae cumque, deleniti
            accusamus. Optio neque cumque ipsa similique ullam. Quisquam
            expedita illum deleniti necessitatibus Lorem, ipsum dolor sit amet
            consectetur adipisicing elit. Laborum quas repudiandae porro optio
            blanditiis nisi veritatis sunt, vel nihil, amet, est fugiat? Sunt
            iste, pariatur totam doloremque est enim nisi!
          </div>
        </div>
      </div>
      <div
        style="
          font-size: 35px;
          font-weight: bold;
          text-align: center;
          margin: 40px 0px;
        "
      >
        Kenapa Konoha High School?
      </div>
      <div
        style="
          display: flex;
          flex-direction: row;
          gap: 30px;
          justify-content: center;
          margin-bottom: 30px;
        "
      >
        <div style="text-align: center">
          <div
            class="card"
            style="
              width: 250px;
              display: flex;
              flex-direction: column;
              gap: 20px;
            "
          >
            <div style="background-color: #2c4c9c; height: 90px;font-size: 40px;font-weight: bold;color: white;text-align: center;display: flex;align-items: center;justify-content: center;">HIGH</div>
            <div style="font-size: 20px; font-weight: bold">
              Akreditasi Unggul
            </div>
            <div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Consequuntur perspiciatis alias ipsum debitis! Molestias
              perferendis optio iure
            </div>
          </div>
        </div>
        <div style="text-align: center">
          <div
            class="card"
            style="
              width: 250px;
              display: flex;
              flex-direction: column;
              gap: 20px;
            "
          >
            <div style="background-color: #2c4c9c; height: 90px;font-size: 40px;font-weight: bold;color: white;text-align: center;display: flex;align-items: center;justify-content: center;">NEW</div>
            <div style="font-size: 20px; font-weight: bold">
              Kurikulum Baru
            </div>
            <div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Consequuntur perspiciatis alias ipsum debitis! Molestias
              perferendis optio iure
            </div>
          </div>
        </div>
        <div style="text-align: center">
          <div
            class="card"
            style="
              width: 250px;
              display: flex;
              flex-direction: column;
              gap: 20px;
            "
          >
            <div style="background-color: #2c4c9c; height: 90px;font-size: 40px;font-weight: bold;color: white;text-align: center;display: flex;align-items: center;justify-content: center;">TOP</div>
            <div style="font-size: 20px; font-weight: bold">
              Fasilitas Unggulan
            </div>
            <div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Consequuntur perspiciatis alias ipsum debitis! Molestias
              perferendis optio iure
            </div>
          </div>
        </div>
        <div style="text-align: center">
          <div
            class="card"
            style="
              width: 250px;
              display: flex;
              flex-direction: column;
              gap: 20px;
            "
          >
            <div style="background-color: #2c4c9c; height: 90px;font-size: 40px;font-weight: bold;color: white;text-align: center;display: flex;align-items: center;justify-content: center;">FAST</div>
            <div style="font-size: 20px; font-weight: bold">
              Online Support
            </div>
            <div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Consequuntur perspiciatis alias ipsum debitis! Molestias
              perferendis optio iure
            </div>
          </div>
        </div>
      </div>
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
  </body>
</html>
