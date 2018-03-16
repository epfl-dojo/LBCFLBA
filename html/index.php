<?php
var_dump($_POST);

if ($_POST) {
  $json = json_encode($_POST);
  $previous_content= file_get_contents('./depenses.json');
  $previous_content = (array)json_decode($previous_content);
  var_dump($previous_content);
  $previous_content[] = $_POST;
  file_put_contents('./depenses.json', json_encode($previous_content));

}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TEST</title>
  </head>
  <body>
    <form action="index.php" method="post">
          <fieldset>
          <legend>Dépenses</legend>
          Prénom : <input type="text" name="guy" /><br>
          Prix : <input type="number" name="price" /><br>
         Description : <input type="text" name="object" /><br>
          <input type="submit" />
          </fieldset>
    </form>
  </body>
</html>
