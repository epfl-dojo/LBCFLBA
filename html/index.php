<?php
$previous_content= file_get_contents('./depenses.json');
$previous_content = (array)json_decode($previous_content);

if ($_POST) {
  $json = json_encode($_POST);
  //var_dump($previous_content);
  $previous_content[] = $_POST;
  file_put_contents('./depenses.json', json_encode($previous_content));

  /* ?><pre><?php print_r ($previous_content); ?></pre><?php*/
}

function callback($matches) { print_r ($matches);}
function parse_template($template_file)
{
  $template = file_get_contents(__DIR__. "/templates/" . $template_file . ".html");
  $parsed = preg_replace_callback('/\{\{([a-zA-Z]+.*)\}\}/', 'callback', $template);
  echo $parsed;
}


parse_template("record");
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

    <table border="1">
      <tr>
        <th> Personne:</th>
        <th> Prix:</th>
        <th> Description:</th>
      </tr>
        <?php
          foreach ($previous_content as $content){
        ?>
        <tr>
        <td>
          <?php
              echo $content->guy;
           ?>
        </td>
        <td>
          <?php
          echo $content->price;
           ?>
        </td>
        <td>
          <?php
          echo $content->object;
           ?>
        </td>
      </tr>
      <?php
        }
      ?>
    </table>
  </body>
</html>
