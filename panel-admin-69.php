<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style>
body {
  background-color: #1E1F29;
  color: #b4b4b4;
    font-family: 'Montserrat', sans-serif;
}

.inp1 {
  color: #fff;
  border: none;
  padding: 10px 15px;
  margin: 0 10px;
  background-color: #343541;
}

button {
  width: 100px;
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  margin: 0 10px;
}

.random-number {
  margin-left: 10px;
}

.copy-btn {
  background-color: #008CBA;
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  margin: 0 10px;
}

.copy-btn:hover {
  background-color: #0077AA;
}

.prem {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

</style>



<!--Note atau teks bisa diedit-->
<div id="stu" align="center" class="prem">
  <button onclick="lmao12()" style="">Oke dek</button><br>
 <p>Ini adalah ADMIN web panel, dimana kamu bisa ngecek IP user yang udah ngelakuin percobaan GET KEY. Dan kamu bisa monitoring mereka.</p><br>Ga ada gunanya sih, tapi cuman buat monitoring doang dan bisa ngehapus IP yang lagi getkey (tapi juga buat apa lmao). Buat cek IP, usernya bisa disuru pake website https://whatismyipaddress.com/
</div>
<div id="pre" style="display:none;" align="center">
  <h1 align="center">Admin Shortlink Panel</h1>
  <p style="font-size: 10px;">Ijo = Baru neken tombol Get Key<br> Biru = Udah solve rechaptcha<br> Kalau IPnya udah dapat key, yaudah dihapus dan ga ada dilist</p><br>
  <div align="center" class="container">
<div align="center" class="container">
<div align="center" class="container">
  <?php

    $jsonDataFilePath = $_SERVER['DOCUMENT_ROOT'] . '/test/data/data-whitelist.txt'; //bisa diedit kalo nt mau ngerubah path folder
    $jsonData = file_get_contents($jsonDataFilePath);
    $data = json_decode($jsonData, true);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $ipToDelete = $_POST['ip'];

      if (isset($data[$ipToDelete])) {
        unset($data[$ipToDelete]); 

        $updatedJsonData = json_encode($data);
        file_put_contents($jsonDataFilePath, $updatedJsonData);
        echo json_encode(['success' => true]);
        exit; 
      } else {
        echo json_encode(['success' => false]);
        exit;
      }
    }
    foreach ($data as $ip => $status) {
      echo '<input type="text" class="inp1" value="' . $ip . '" readonly style="background-color: #343541;">';
      if ($status == 1) {
        echo '<button onclick="removeIP(\'' . $ip . '\')">Delete</button>';
      } elseif ($status == 2) {
        echo '<button style="background-color: blue;" onclick="removeIP(\'' . $ip . '\')">Delete</button>';
      }
      echo '<br><br>';
    }
  ?>
</div>

<script>
  function removeIP(ip) {
    fetch('', {
      method: 'POST',
      body: new URLSearchParams('ip=' + encodeURIComponent(ip)),
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
        }
      })
      .catch(error => console.error(error));
                location.reload();
  }
</script>

  </div>



<!--Ini bs dihapus-->
  <br><br>
  Note (hapus aja kalau sudah dibaca): Saran aja sih, kalau bikin key generator kek ginian yg mirip fakecez sekalian buat "term of page" ajae buat jaga2. ngambil data IP tanpa ijin setau ane sih dilarang, tapi kalau semisal ga bikin term of page juga gpp sih tpi jangan bilang kalau pake konsep IP whitlist didata kek gini.
  <br><br>
  <input value="Good luck!" readonly></input>
</div>
<!--Ini bs dihapus-->







<script>
function lmao12() {
  var button = document.getElementById("stu");
  var div = document.getElementById("pre");
  if (div.style.display === "none") {
    div.style.display = "block";
    button.style.display = "none";
  } else {
    div.style.display = "none";
  }
}
</script>
