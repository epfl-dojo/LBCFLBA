<?php
$previous_content= file_get_contents('./depenses.json');
$previous_content = (array)json_decode($previous_content);

if ($_POST) {
  $json = json_encode($_POST);
  //var_dump($previous_content);
  $previous_content[] = $_POST;
  file_put_contents('./depenses.json', json_encode($previous_content));
  header("Location: list.php");
  /* ?><pre><?php print_r ($previous_content); ?></pre><?php*/
}


parse_template("record");
require("headerhtml.php");

    require("menu.php");
     ?>
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
