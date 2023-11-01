<?php include('part/header.php'); ?>


  <?php
      if(isset($_SESSION['order'])){
          echo $_SESSION['order'];
          unset($_SESSION['order']);
      }
  ?>
  
  <!-- Contact Start -->
    <div class="container">
        <h2 class="text-center inner-content">Contact Us</h2>
        <img src="text/images/about-us-page-heading.jpg" alt="about-us-image" class="aimg">
    </div>
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="500" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Heldan,%20Myanmar&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://embedgooglemap.net/124/"></a><br></div></div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Say Hello. Don't Be Shy!</h2>
                    </div>
                    <form id="contact" action="" method="post">
                        <div class="row">
                          <div class="col-lg-6">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your name" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-6">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Your email" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="description" rows="6" id="message" placeholder="Your message" required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-2">
                            <fieldset>
                                <input type="submit" name="submit" class="btn btn-outline-info">
                              </fieldset>
                          </div>
                        </div>
                      </form>
                      <?php
                        if(isset($_POST['submit'])){
                          $name = $_POST['name'];
                          $email = $_POST['email'];
                          $description = $_POST['description'];
                          $sql2 = "INSERT INTO feedback SET
                                name = '$name',
                                email = '$email',
                                description = '$description'";
                          $res2 = mysqli_query($conn, $sql2);
                          if($res2==true){
                            $_SESSION['feedback'] = "<div class='success text-center'>Feedback Successfully.</div>";
                           
                          }else{
                            $_SESSION['feedback'] = "<div class='error text-center'>Feedback Failed.</div>";
                            header('location:'.SITE.'contact.php');
                          }
                        }
                      ?>
                </div>
            </div>
        </div>
    </div>
  <!-- Contact End -->

<?php include('part/footer.php'); ?>