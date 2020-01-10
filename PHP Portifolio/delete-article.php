<?php

require('inc/database.php');
require('inc/articlefunc.php');
require('inc/pageRedirect.php');

$db_conn = getDb();

if (isset($_GET['id'])){
  $articles = getArticle($db_conn, $_GET['id'], 'id');
  if($articles){
          $id = $articles['id'];
          
              } else {
                    die("article not found");
               }
    } else {
        die("id not supplied, article not found");
  }

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $sql = "DELETE FROM articles
             WHERE id = ?";

  $stmt= mysqli_prepare($db_conn, $sql);

  if ($stmt === false) {
  echo mysqli_error($db_conn);
  } else {

        mysqli_stmt_bind_param($stmt, "i", $id);

         if (mysqli_stmt_execute($stmt)) {
           redirect("/resume.php");
          } else {
            echo mysqli_stmt_error($stmt);
          }
        }
}

?>
<?php require('inc/header.php');?>
<h2>Delete post</h2>

<form class="contact-form" method="post">
  <p>Are you sure?</p>
  <input type="submit" class="form-btn2" value="Delete Post">
  <a class="batn"href="article.php?id=<?=$articles['id']; ?>">Cancel</a>
</form>

<?php require('inc/footer.php');?>
