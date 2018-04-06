<?php
$previous_content= file_get_contents('./depenses.json');
$previous_content = (array)json_decode($previous_content);


function callback($matches) { print_r ($matches); }
function parse_template($template_file, $content)
{
  $template = file_get_contents(__DIR__. "/templates/" . $template_file . ".html");
  $parsed = preg_replace_callback('/\{\{([a-zA-Z]+.*)\}\}/', function($matches) {
    /*foreach ($matches as $match) {
      $match = '$' . $match;
    }
    return $matches;*/
    //$variable = substr(substr)
    return $matches[1];
  }, $template);
  var_dump($parsed);
  echo eval($parsed);
}


require("headerhtml.php");
require("menu.php");
     ?>
    <table border="1">
      <tr>
        <th> Personne:</th>
        <th> Prix:</th>
        <th> Description:</th>
      </tr>
        <?php
          foreach ($previous_content as $content){
            //parse_template('record', $content);
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
      </tr-->
      <?php
        }
      ?>
    </table>
<?php require('footerhtml.php'); ?>
