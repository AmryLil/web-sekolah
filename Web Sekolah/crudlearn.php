<?php
session_start();

// Mengecek apakah pengguna sudah login atau belum
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$isAdmin = isset($_SESSION['status']) && $_SESSION['status'] === 'admin';
$isGuru = isset($_SESSION['status']) && $_SESSION['status'] === 'guru';
$isMurid = isset($_SESSION['status']) && $_SESSION['status'] === 'siswa';

// Ambil parameter ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan koneksi ke database Anda
    include "koneksi.php";
    $sql = "SELECT * FROM tugas_materi WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $jurusan = $row["jurusan"];
        $kelas = $row["kelas"];
        $mata_pelajaran = $row["mata_pelajaran"];
        $judul = $row["judul"];
        $path_file = $row["path_file"];
        $deskripsi = $row["deskripsi"];
        $conn->close();
    }

  $path_update="onclick=window.location.href = 'updatedata.php?id=$id'";
}


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
    }
    a:hover {
      color: rgb(87, 87, 252);
    }
    .header-blur {
      backdrop-filter: blur(5px);
      background-color: rgba(220, 220, 220, 0.8);
    }
    

    /* Styling untuk card */
    label {
      display: block;
      font-weight: bold;
      font-size:13px;
    }
    form div label {
      margin-bottom: 6px;
      padding-left: 5px;
    }
    form div{
      margin: 0;
    }
    input {
      padding: 3px;
      border: 2px solid #c6c5fc;
      width: 400px;
    }
    select {
      padding: 3px;
      border: 2px solid #c6c5fc;
      width: 412px;
    }
    textarea {
      padding: 3px;
      border: 2px solid #c6c5fc;
      width: 400px;
    }
    .btn button {
      border: 2px solid #c6c5fc;
      width: 150px;
      padding: 5px;
      background-color: #2c4c9c;
      color: white;
      letter-spacing: 5px;
      font-weight: bold;
    }
    .inp1 div select{
      width: 200px;
    }
    .card2 {
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 25px;
      margin: 20px;
      width: 614px; /* Mengubah lebar card */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background-color: white;
      position: relative;
    }
    

    .card2 div {
      width: 80%;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      font-size: 13px;
      
    }

    .card2 div:first-child {
      font-weight: bold;
    }

    .card2 label {
      font-weight: bold;
      margin-top: 15px;
      margin-bottom: 5px;
    }

    .scrollable-wrapper {
      height: 100%;
      overflow-y: auto;
      border: 1px solid #ccc;
      padding: 10px;
      overflow-x: hidden;
    }
    form div {
      display: flex;
      flex-direction: column;
    }
    form {
      width: 40%;
      display: flex;
      flex-direction: column;
      gap: 15px;
      justify-content: center;
      align-items: center;
    }
    /* Menghilangkan scrollbar by default */
    .scroll-div::-webkit-scrollbar {
      display: none;
      overflow-x: hidden;
    }

    /* Menampilkan scrollbar hanya ketika dihover */
    .scroll-div:hover::-webkit-scrollbar {
      display: block;
      overflow-x: hidden;
    }

    /* Menyesuaikan warna background scrollbar */
    .scroll-div::-webkit-scrollbar-track {
      background-color: #2c4c9c;
    }

    /* Mengatur warna thumb atau bagian yang dapat digeser */
    .scroll-div::-webkit-scrollbar-thumb {
      background-color: #f1f1f1;
    }

    /* Menyesuaikan ukuran thumb scrollbar */
    .scroll-div::-webkit-scrollbar-thumb:hover {
      background-color: #555;
    }
    .scroll-div::-webkit-scrollbar {
      width: 3px; /* Mengatur lebar scrollbar */
      height: 5px; /* Mengatur tinggi scrollbar (opsional jika horizontal) */
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

    <main style="height: 100%; padding-top: 112px">
    
      <div
        style="
          display: flex;
          flex-direction: row;
          padding: 5px 30px;
          justify-content: center;
          align-items: center;
        "
      >
        <div
          class="scrollable-wrapper scroll-div"
          style="
            width: 60%;
            background-color: #2c4c9c;
            height: 475px;
            padding: 0px 0px;
          "
        >
        <?php
              include "koneksi.php";
              $sql = "SELECT * FROM tugas_materi";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  // Output data dari setiap baris
                  while($row = $result->fetch_assoc()) {
              ?>
                <div class="card2">
                    <div>
                        <div>Mata Pelajaran</div>
                        <div>: <?php echo $row["mata_pelajaran"]; ?></div>
                    </div>
                    <div>
                        <div>Kelas</div>
                        <div>: <?php echo $row["kelas"]; ?></div>
                    </div>
                    <div>
                        <div>Judul Tugas</div>
                        <div>: <?php echo $row["judul"]; ?></div>
                    </div>
                    <label>Deskripsi:</label>
                    <div style="margin-bottom: 10px">
                        <?php echo $row["deskripsi"]; ?>
                    </div>
                    <div>
                        <a href="upload/<?php echo $row["path_file"]; ?>" download="<?php echo $row["path_file"]; ?>">Download File</a>
                    </div>
                    <div style="position: absolute;
                                top: 4px;
                                right: 6px;
                                width: 70px;
                                display: flex;
                                flex-direction: column;
                                gap: 5px;
                                
                                " >
                      <button 
                        onclick="window.location.href = 'crudlearn.php?id=<?php echo $row['id']; ?>'" 
                        style="background-color: yellow;"
                      >Ubah</button>
                      <button 
                        onclick="window.location.href = './learncrud/deletedata.php?id=<?php echo $row['id']; ?>'"
                        style="background-color: red;color: white;">Hapus</button>
                    </div>
                </div>
              <?php
                  }
              } else {
                  echo "Tidak ada data";
              }

              // Tutup koneksi database
              $conn->close();
              ?>
        </div>
        <form 
          action="<?php echo isset($judul) ? "./learncrud/updatedata.php?id=$id" : './learncrud/adddata.php'; ?>" 
          method="post" 
          style="width: 50%"
          enctype="multipart/form-data">
          <div style="font-weight: bold; font-size: 15px">
              FORM INPUT MATERI
          </div>
          <div style="display: flex; flex-direction:row;column-gap:10px" class="inp1">
              <div>
                  <label for="jurusan">Pilih Jurusan:</label>
                  <select name="jurusan" id="jurusan">
                      <option value="">Pilih</option>
                      <option value="IPA" <?php if (isset($jurusan) && $jurusan == 'IPA') echo 'selected'; ?>>IPA</option>
                      <option value="IPS" <?php if (isset($jurusan) && $jurusan == 'IPS') echo 'selected'; ?>>IPS</option>
                      <option value="Bahasa" <?php if (isset($jurusan) && $jurusan == 'Bahasa') echo 'selected'; ?>>Bahasa</option>
                      <option value="Seni" <?php if (isset($jurusan) && $jurusan == 'Seni') echo 'selected'; ?>>Seni</option>
                  </select>
              </div>
              <div>
                  <label for="jurusan">Pilih Kelas:</label>
                  <select name="kelas" id="kelas">
                      <option value="Kelas A" <?php if (isset($kelas) && $kelas == 'Kelas A') echo 'selected'; ?>>A</option>
                      <option value="Kelas B" <?php if (isset($kelas) && $kelas == 'Kelas B') echo 'selected'; ?>>B</option>
                      <option value="Kelas C" <?php if (isset($kelas) && $kelas == 'Kelas C') echo 'selected'; ?>>C</option>
                  </select>
              </div>
          </div>
          <div>
              <label for="mata_pelajaran">Mata Pelajaran:</label>
              <select name="mata_pelajaran" id="mata_pelajaran">
                  <option value="">Pilih</option>
                  <option value="<?php echo $mata_pelajaran; ?>" <?php if (!empty($mata_pelajaran)) echo 'selected'; ?>><?php echo $mata_pelajaran; ?></option>
              </select>
          </div>
          <div>
              <label for="judul">Judul:</label>
              <input type="text" name="judul" id="judul" value="<?php echo isset($judul) ? $judul : ''; ?>" />
          </div>
          <div>
              <label for="">File Materi</label>
              <input type="file" name="file_materi" id="file" />
          </div>
          <div>
              <label for="deskripsi">Deskripsi:</label>
              <textarea name="deskripsi" id="deskripsi" rows="4" cols="50"><?php echo isset($deskripsi) ? $deskripsi : ''; ?></textarea>
          </div>
          <div style="display: flex; flex-direction: row; column-gap: 20px" class="btn">
          <?php if (isset($judul)): ?>
              <button type="submit" >Update</button>
          <?php else: ?>
              <button type="submit">Kirim</button>
          <?php endif; ?>
              <button type="reset">Reset</button>
          </div>

        </form>

      </div>
      
      <script>
      const jurusanDropdown = document.getElementById('jurusan');
      const mataPelajaranDropdown = document.getElementById('mata_pelajaran');

      // Definisikan objek mata pelajaran
      const mataPelajaran = {
        IPS: [
          "Ekonomi",
          "Sosiologi",
          "Geografi",
          "Sejarah",
          "Antropologi",
          "Kebijakan Publik",
          "Psikologi",
          "Pendidikan Kewarganegaraan",
          "Bahasa Asing",
        ],
        IPA: [
          "Matematika",
          "Fisika",
          "Kimia",
          "Biologi",
          "Astronomi",
          "Geologi",
          "Statistika",
          "Ilmu Lingkungan",
          "Teknologi Informasi dan Komunikasi",
        ],
        Bahasa: [
          "Bahasa Indonesia",
          "Bahasa Inggris",
          "Sastra Indonesia",
          "Sastra Inggris",
          "Bahasa Asing Lainnya",
          "Linguistik",
          "Kebahasaan",
          "Fonetik dan Fonologi",
          "Penerjemahan dan Interpretasi",
        ],
        Seni: [
          "Seni Rupa",
          "Seni Musik",
          "Seni Tari",
          "Teater",
          "Seni Patung",
          "Desain Grafis",
          "Film dan Fotografi",
          "Seni Bela Diri",
          "Kriya",
        ],
      };

      jurusanDropdown.addEventListener('change', function() {
          const selectedJurusan = jurusanDropdown.value;
          mataPelajaranDropdown.innerHTML = '';
          const selectedSubjects = mataPelajaran[selectedJurusan];
          selectedSubjects.forEach(subject => {
              const option = document.createElement('option');
              option.value = subject;
              option.textContent = subject;
              mataPelajaranDropdown.appendChild(option);
          });
      });

      </script>
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
          <img style="width: 100%" src="../image/logo.png" alt="" />jj
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
