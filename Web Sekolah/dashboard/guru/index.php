<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      body {
      font-family: Tahoma;
      margin: 0;
      padding: 0;
    }
      .table-container {
        max-height: 370px; /* Ubah nilai tinggi sesuai kebutuhan */
        overflow-y: auto;
        overflow-x: hidden;
        border: 1px solid #ccc;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }

      table th,
      table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }

      thead {
        color: white;
        background-color: #2c4c9c;
        font-weight: bold;
        position: sticky;
        top: 0;
      }

      tbody tr:nth-child(even) {
        background-color: #f9f9f9;
      }

      tbody tr:hover {
        background-color: #f1f1f1;
      }
      span{
        font-family: Tahoma;
        margin-left: 20px;
        font-size: 15px;
      }
      button{
        padding: 4px;
        border-radius: 5px;
        background-color: rgb(87, 87, 245);
        color: white;
        font-weight: bold;
        font-size: small;
        cursor: pointer;
        
      }
      table button{
        background-color: red;

      }
      a{
        text-decoration: none;
        color: black;

      }
      i{
        padding: 10px 20px;
      }
      i:hover{
        background-color: white;
        cursor: pointer;
      }
    </style>
  </head>
  <body style="padding: 14px">
    <div
      style="
        display: flex;
        flex-direction: row;

        background-color: whitesmoke;
        gap: 25px;
        padding: 20px;
      "
    >
      <div
        style="
          width: 19%;
          align-items: center;
          display: flex;
          flex-direction: column;
        "
      >
        <div
          class="logo"
          style="
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            background-color: white;
            padding: 5px 30px;
          "
        >
          <div
            style="
              width: 60px;
              height: 60px;
              object-fit: cover;
              overflow: hidden;
            "
          >
            <img style="width: 100%" src="../../../image/logo.png" alt="" />
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
        <nav
          style="
            display: flex;
            gap: 15px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
          "
        >
        <div style="display: flex;flex-direction: column;gap:4px">
          <i class='fas fa-chalkboard-teacher' style='font-size:18px'><span>
            <a href="index.php">Daftar Guru</a>
          </span></i>
          <i class='fas fa-user-graduate' style='font-size:18px'><span>
            <a href="../murid/index.php">Daftar Murid</a>
          </span></i>
          <i class="fa fa-home" style='font-size:18px'><span>
            <a href="../../home.php">Home</a>
          </span></i>
          <i class="fa fa-sign-out" style="font-size:18px">
            <a href="../../auth_logout.php">Log out</a>
          </i>
        </div>
        
          
        </nav>
      </div>
      <div style="background-color: white; width: 83%; padding: 30px">
        <div style="font-size: 20px; font-weight: bold">DASHBOARD</div>
        <div style="padding: 20px">
          <div style="font-size: 17px; font-weight: bold; margin-bottom: 10px">
            Daftar Guru
          </div>
          <div class="table-container">
            <table>
              <thead>
                <tr>
                  <th style="width: 200px;">Nama</th>
                  <th style="width: 150px;">Jabatan</th>
                  <th>Whatsapp</th>
                  <th>Gmail</th>
                  <th>Password</th>
                  <th style="width: 200px;">Path Foto</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody id="table-body">
                <?php
                include "../../koneksi.php";
                $sql = "SELECT * FROM guru";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><a href="update.php?id=<?php echo $row["id_guru"] ?>"><?= $row["nama"] ?></a></td>
                            <td><?= $row["jabatan"] ?></td>
                            <td><?= $row["wa"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["password"] ?></td>
                            <td style="font-size: 13px;"><?= $row["foto"] ?></td>
                            <td><button onclick="haddledelete(<?php echo $row['id_guru']; ?>)">Hapus</button></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7'>Tidak ada data guru</td></tr>";
                }
                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
          <button style="margin-top: 20px;" onclick="window.location.href=`adddata.php`">Tambah Data</button>
        </div>
      </div>
    </div>
    <script>
      const haddledelete = (id)=>{
        let kom =  confirm('Apakah Anda yakin ingin menghapus data ini?');
        if (kom){
          window.location.href=`./crud/deletedata.php?id=${id}`
        }else{
        }
      }
    </script>
  </body>
</html>
