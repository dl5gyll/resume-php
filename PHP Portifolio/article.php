
<?php

require('inc/database.php');
require('inc/articlefunc.php');


$db_conn = getDb();

if (isset($_GET['id'])){
  $articles = getArticle($db_conn, $_GET['id']);
}else{
  $articles = null;
}

?>

<?php require('inc/header.php');?>


    <?php if ($articles === null): ?>
    <p>Article not found.</p>
<?php else: ?>
    <div class="skill-row">
    <article class="article">
        <h2><?= htmlspecialchars($articles['title']); ?></h2>
        <p><?= htmlspecialchars($articles['content']); ?></p>

    </article>

    <form class="contact-form" action="editArticle.php?id=<?= $articles['id']; ?>" method="post">
      <input type="submit" class="form-btn1" value="Edit Post">
    </form>
    <a class="batn"href="delete-article.php?id=<?=$articles['id']; ?>">Delete</a>


<?php endif; ?>
</div>
<hr>
<?php require('inc/footer.php');?>
