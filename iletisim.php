<?php
include 'header2.php';
?>






<main id="main">
<img style="width: 100%" src="img/hero-bg2.jpg">
  
  
    
   




        
    <!--==========================
      Contact Section
      ============================-->
      <section id="contact">
        <div class="container wow fadeInUp">
          <div class="section-header">
            <h3 class="section-title">BİZE ULAŞIN</h3>
          </div>
        </div>
        <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>
        <div class="container wow fadeInUp">
          <div class="row justify-content-center">

            <div class="col-lg-4 col-md-4">

              <div class="info">
                <div>
                  <i class="fa fa-map-marker"></i>
                  <p>Cumhuriyet Cad. Çukurambar, Çankaya<br>Ankara, Türkiye</p>
                </div>

                <div>
                  <i class="fa fa-envelope"></i>
                  <p><a class="" href="mailto:info@sdyazilim.com.tr"></i> info@sdyazilim.com.tr </a></p>
                </div>
                <div>
                  <i class="fa fa-envelope"></i>
                  <p><a class="" href="mailto:sdyazilim@gmail.com"></i> sdyazilim@gmail.com </a></p>
                </div>

                <div>
                  <i class="fa fa-phone"></i>
                  <p>+90 533 153 0000</p>
                </div>
                <div>
                  <i class="fa fa-fax"></i>
                  <p>+90 533 153 0001</p>
                </div>
              </div>

              <div class="social-links">
                <a href="http://www.twitter.com/" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="http://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="http://www.twitter.com/" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="http://www.google.com/" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="http://www.linkedin.com/" class="linkedin"><i class="fa fa-linkedin"></i></a>
                <a href="http://www.youtube.com/" class="google-plus"><i class="fa fa-youtube"></i></a>
                <a href="http://www.pinterest.com/" class="linkedin"><i class="fa fa-pinterest"></i></a>
              </div>

            </div>

            <div class="col-lg-5 col-md-8">
              <div class="form">
                <div id="sendmessage">Mesajınız başarıyla iletildi. Teşekkür ederiz.</div>
                <div id="errormessage">Özür dileriz. Mesajınız iletilemedi.</div>
                <form action="" method="post" role="form" class="contactForm">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Ad Soyad" data-rule="minlen:4" data-msg="Minimum 4 karakter girmelisiniz." />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail adresi" data-rule="email" data-msg="Geçerli bir mail adresi girmelisiniz" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Konu" data-rule="minlen:8" data-msg="Minimum 8 karakter girmelisiniz." />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Lütfen mesajınızı giriniz." placeholder="Mesaj"></textarea>
                    <div class="validation"></div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div>
            </div>

          </div>

        </div>
      </section><!-- #contact -->
    </main>


    <?php
    include 'footer.php';
    ?>