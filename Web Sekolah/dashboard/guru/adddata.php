<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
    
    body{
      font-family: Tahoma;
    }
      input {
      border: 2px solid #c6c5fc;
      padding: 7px;
      border-radius: 7px;
      width: 300px;
    }

    button {
      border: 2px solid #817ff1;
      padding: 6px;
      border-radius: 5px;
      background-color: #2c4c9c;
      color: white;
      font-weight: bold;
      font-size: medium;
    }
    select:focus {
      border: 2px solid blue;
    }
    label {
      margin-left: 7px;
      font-weight: bold;
      font-size: medium;
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
      <div
        style="
          width: 100%;
          display: flex;
          flex-direction: row;
          height: 500px;
          border-radius: 15px;
          box-shadow: 1px 1px 20px rgba(0, 0, 0, 0.3);
          overflow: hidden;
        "
      >
        <div
          style="
            width: 65%;
            padding: 40px 80px;
            display: flex;
            flex-direction: column;
            row-gap: 15px;
          "
        >
          <div
            style="
              font-size: 30px;
              font-weight: bold;
              color: #2c4c9c;
              margin-bottom: 20px;
              text-align: center;
            "
          >
            Tambah Data Guru
          </div>
          <form
            action="./crud/proses_adddata.php"
            method="POST"
            enctype="multipart/form-data"
            style="display: flex; flex-direction: column; row-gap: 15px"
          >
            <div
              style="
                display: flex;
                justify-content: space-between;
                align-items: center;
              "
            >
              <label for="nama">Nama Guru</label>
              <input type="text" name="nama" id="nama" />
            </div>
            <div
              style="
                display: flex;
                justify-content: space-between;
                align-items: center;
              "
            >
              <label for="jabatan">Jabatan</label>
              <input type="text" name="jabatan" id="jabatan" />
            </div>
            <div
              style="
                display: flex;
                justify-content: space-between;
                align-items: center;
              "
            >
              <label for="whatsapp">Whatsapp</label>
              <input type="text" name="whatsapp" id="whatsapp" />
            </div>
            <div
              style="
                display: flex;
                justify-content: space-between;
                align-items: center;
              "
            >
              <label for="email">Email</label>
              <input type="text" name="email" id="email" />
            </div>
            <div
              style="
                display: flex;
                justify-content: space-between;
                align-items: center;
              "
            >
              <label for="password">Password</label>
              <input type="text" name="password" id="password" />
            </div>
            <div
              style="
                display: flex;
                justify-content: space-between;
                align-items: center;
              "
            >
              <label for="photo">Photo</label>
              <input type="file" name="photo" id="photo" />
            </div>
            <button type="submit">Simpan</button>
          </form>
        </div>
        <div
          style="
            background-color: #2c4c9c;
            width: 35%;
            padding: 50px;
            color: white;
            display: flex;
            flex-direction: column;

            justify-content: center;
          "
        >
          <div
            style="
              font-size: 30px;
              font-weight: bold;
              background-color: white;
              transform: translateY(-25px);
              width: 220px;
              height: 12px;
              color: #2c4c9c;
              -webkit-text-stroke: 0.5px white;
              padding: 3px 10px;
              border-radius: 2px;
            "
          >
            <div
              style="
                transform: translateY(-25px);
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
              "
            >
              Emyu Bapuk
            </div>
          </div>
          <div>
            "Kekuatan sejati terletak pada bagaimana kita bangkit dari masa-masa
            sulit. Kegagalan adalah langkah awal menuju kesuksesan yang lebih
            besar. Semangatlah dan teruslah berjuang."
          </div>
          <div style="width: 50%; margin-top: 10px"><hr /></div>
          <div>Harry Maguire</div>
        </div>
      </div>
    
      </div>
    </div>
  </body>
</html>
