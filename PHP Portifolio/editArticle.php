<?php

require('inc/database.php');
require('inc/articlefunc.php');
require('inc/pageRedirect.php');

$db_conn = getDb();

if (isset($_GET['id'])){
  $articles = getArticle($db_conn, $_GET['id']);
  if($articles){
          $id = $articles['id'];
          $title = $articles['title'];
          $content = $articles['content'];
          $published_at = $articles['published_at'];
              } else {
                    die("article not found");
               }
    } else {
        die("id not supplied, article not found");
  }

  if($_SERVER["REQUEST_METHOD"]=="POST"){
  //form validation
  $errors = validateArticle($title, $content, $published_at);

  if(empty($errors)){
    //updating an existing article
    $sql = "UPDATE articles
               SET title = ?,
                   content = ?,
                   published_at = ?
               WHERE id = ?";

    $stmt= mysqli_prepare($db_conn, $sql);

    if ($stmt === false) {
    echo mysqli_error($db_conn);
    } else {
          if($published_at == ''){
                $published_at = null;
                  }

          mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $published_at, $id);

           if (mysqli_stmt_execute($stmt)) {
             redirect("/article.php?id=$id");
            } else {
              echo mysqli_stmt_error($stmt);
            }
          }
        }
      }
?>



<?php require('inc/header.php');?>

<h3>Edit post</h3>

<?php require('inc/article-form.php');?>

<hr>

<?php require('inc/footer.php');?>
