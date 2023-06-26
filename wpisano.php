<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dodaj.css">
  <title>Dobrze</title>
</head>
<body>
  <form action="wpisano.php" method="POST" style="text-align:center">
  <label>Pomyślnie wpisano wynik</label><br>
  <input type="submit" name="sub" value="Wróc do strony" class="sub">
  </form>
  <?php
    @$sub = $_POST['sub'];
    if(isset($sub)){
      header("location:dodaj.php");
    }
  ?>
</body>
</html>