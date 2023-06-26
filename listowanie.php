<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="listowanie.css"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listowanie</title>
  </head>
  <body>
    <div class="cont">
      <h1>Listowanie danych</h1>
      <a href="dodaj.php">Dodaj obiekt</a>
    </div>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'staszek');

    if($conn -> connect_error){
      die("Wystąpił problem z połączeniem: " . $conn->connect_error);
    }

    $sel_o = "select nazwa, id from obiekty;";
    $que_o = $conn->query($sel_o);

    
    if($que_o->num_rows == 0){
      echo "Nie ma obiektów w bazie";
    }else{
      while($row_o = $que_o->fetch_array()){
        echo "<div class=listowanie>$row_o[id]. $row_o[nazwa]:";
        $sel_c = "select cecha from cechy inner join obi_cechy on cechy.id = obi_cechy.ID_C where obi_cechy.ID_O = $row_o[id];";
        $que_c = $conn->query($sel_c);
        $que_b = $conn->query($sel_c);
        if($que_b->fetch_array() == null){
          echo "<un><li>Nie ma cech</li></un>";
        }
        while($row_c = $que_c->fetch_array()){
          echo "<un><li>$row_c[cecha]</li></un>";
        }
        echo "</div>";
      }
    }
    $conn->close();
    ?>
  </body>
</html>