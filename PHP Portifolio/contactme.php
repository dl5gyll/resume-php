       <?php require('inc/header.php');?>


    <div class="contact-section">
      <h2 class="heading1">Contact Me</h2>
      <div class="border"></div>
      <!--Use this later in the email section [htmlspecialchars()] To avoid script attact-->
      <form class="contact-form" action="kgerson@gmail.com" method="post">
        <input class="contact-form-input input-radius" type="text" placeholder="Your name" name="fName">
        <input class="contact-form-input" type="email" placeholder="Enter your email.">
        <input class="contact-form-input" type="tel" placeholder="Your phone number">
        <textarea class="contact-form-input text-radius" placeholder="Your message"></textarea>
        <input type="submit" class="contact-form-btn" value="Send">
      </form>


        <?php require('inc/footer.php');?>
