<?php
require('inc/database.php');

  $db_conn = getDb();
$sql = "SELECT *
        FROM articles
        ORDER BY title;";

$results = mysqli_query($db_conn, $sql);

if($results===false){
  echo mysqli_error($db_conn);
}else{
  $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);

}

?>

<?php require('inc/header.php');?>

<div class="container">
  <img class="bg-img" src="image/cover.svg" alt="mountain image" height="400px" width="100%";>
    <div class="heading">
      Hello, I'm <span class="highlight">Gerson Hauwanga</span>
      <br>
      I'm a full-stack web developer.
    </div>
</div>

<div class="bg-image">
  <div class="profile">
    <img class="cover-photo" src="image/cover.jpg" alt="Gerson's Photo">
    <h2>School</h2>
    <p class="Hello">
      Fusce eget mi quis erat cursus aliquam eu sed ligula. Interdum et
      malesuada fames ac ante ipsum primis in faucibus. Proin porta magna
      non blandit tempus. Aenean consectetur nibh turpis, sed fermentum odio posuere in.
      Donec cursus metus varius arcu accumsan, id eleifend velit gravida.
      Phasellus elementum sapien molestie elit imperdiet vestibulum.
      Ut placerat ac turpis et pellentesque.
      Praesent interdum nulla enim, sed sodales lectus venenatis sed.
      Sed hendrerit massa nec elit egestas ultrices. Cras id est consequat,
      lacinia ante ut, commodo lacus. Integer commodo, turpis sed varius pharetra, ante elit fermentum justo, eu fringilla turpis magna ac sapien. Curabitur sit amet est ut mi semper commodo et vel felis. Pellentesque tristique faucibus malesuada. Integer nibh nisi, ultricies eget consectetur ut, ultrices euismod sem. Ut egestas imperdiet ipsum quis scelerisque. Morbi ex erat, pharetra vel est vehicula, ornare egestas ante.
    </p>
  </div>
  <hr>
  <div class="skills">

    <h2>Who Am I?</h2>

    <div class="skill-row">
      <img class="diamond-img" src="https://image.flaticon.com/icons/svg/1455/1455283.svg" alt="Web devlopement Icon">

      <?php foreach ($articles as $article):?>
      <article class="article">
        <h3><a href="article.php?id=<?= $article['id']; ?>"><?= $article['title']; ?></a></h3>
        <p> <?=$article['content'];?></p>
      </article>
      <?php endforeach;?>

    </div>
  </div>

  <div class="contact-me">
    <a class="batn"href="about.php" target="_blank">About</a>
  </div>

<hr>
<div class="contact-me">
  <a class="batn" href="contactme.php" target="_blank">Contact Me</a>
</div>

</div>



  <?php require('inc/footer.php');?>
