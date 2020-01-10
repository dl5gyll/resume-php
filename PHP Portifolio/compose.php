<?php


require('inc/database.php');
require('inc/articlefunc.php');
require('inc/pageRedirect.php');

$title = '';
$content = '';
$published_at = '';

if($_SERVER["REQUEST_METHOD"]=="POST"){

$title = $_POST['title'];
$content = $_POST['content'];
$published_at = $_POST['published_at'];
//form validation
$errors = validateArticle($title, $content, $published_at);

if(empty($errors)){

  $db_conn = getDb();

  $sql = "INSERT INTO articles (title, content, published_at)
           VALUES (?, ?, ?)";

  $stmt= mysqli_prepare($db_conn, $sql);

if ($stmt === false) {
  echo mysqli_error($db_conn);
  } else {
        if($published_at == ''){
              $published_at = null;
                }

        mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_at);

         if (mysqli_stmt_execute($stmt)) {
                $id = mysqli_insert_id($db_conn);
                redirect("/article.php?id=$id");
         } else {
                 echo mysqli_stmt_error($stmt);
                }
          }
      }
  }
 ?>

<?php require('inc/header.php');?>


<h3>Compose New post</h3>

<?php require('inc/article-form.php');?>

<hr>

<?php require('inc/footer.php');?>
