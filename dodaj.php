<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="dodaj.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dodaj nazwe</title>
  </head>
  <body>
    <form action="dodaj.php" method="POST">
      <label for="nazwa">Nazwa</label>
      <input type="text" name="nazwa" required><br>
        <?php
          $conn = new mysqli('localhost', 'root', '', 'staszek');
          if($conn->connect_error){
            die("Wystąpił błąd z połączeniem: " . $conn->connect_error);
          }

          $sel = "select * from cechy;";
          $que = $conn->query($sel);

          while($row = $que->fetch_array()){
            echo "<label for=$row[CECHA]>$row[CECHA]</label>
            <input type=checkbox name=$row[CECHA] class=check><br>";
          }

          ?>
          <input type="submit" value="dodaj" class="sub">
          <a href="listowanie.php" style="float: right;">Idź do listowania</a>
          <?php

          @$nazwa_o = $_POST['nazwa'];

          $cechy = "select ID, CECHA from cechy;";
          $cechy_q = $conn->query($cechy);

          $insert = "insert into obiekty(NAZWA) values('$nazwa_o');";

          if (isset($nazwa_o)) {
            if ($conn->query($insert) === TRUE ) {
              $last_id = $conn->insert_id;
              while ($cechy_r = $cechy_q->fetch_array()) {
                $c = $cechy_r['CECHA'];
                  if (@$_POST[$c] === "on") {
                    $scope = "insert into obi_cechy(ID_O, ID_C) values($last_id, $cechy_r[ID])";
                    $conn->query($scope) === TRUE;
                  }
              } 
              $check = "Select ID_O from obi_cechy where ID_O=$last_id";
              $check_q = $conn->query($check);
              if ($row = $check_q->num_rows == 0){
                $brak = "insert into obi_cechy(ID_O) values($last_id);";
                $conn->query($brak);
              }
              header('location:wpisano.php');
            } else {
              echo "<br>Wystąpił problem" . $insert . "<br>" . $conn->error ;
            }
          } 
          $conn->close();
        ?>
    </form>
  </body>
</html>