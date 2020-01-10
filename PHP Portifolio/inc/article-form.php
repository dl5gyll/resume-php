<?php if (!empty($errors)): ?>

  <ul>
  <?php foreach ($errors as $error): ?>
  <li>  <?= $error ?></li>
  <?php endforeach;?>
  <?php endif; ?>
</ul>
<hr>
<form method="post" class="contact-form">
  <div class="form-group">
    <input type="text" name="title" class="contact-form-input input-radius" id="title"  placeholder="title" value="<?=htmlspecialchars($title)?>">
  </div>
  <div class="form-group">
    <textarea name="content" id="content" class="contact-form-input" rows="5" placeholder="Write Blog"><?=htmlspecialchars($content)?></textarea>
  </div>
  <div class="form-group">
  <input type="datetime-local" class="contact-form-input text-radius" id="published_at"  name="published_at" value="<?=htmlspecialchars($published_at)?>">
  </div>
  <input type="submit" class="contact-form-btn" value="Publish">
</form>
