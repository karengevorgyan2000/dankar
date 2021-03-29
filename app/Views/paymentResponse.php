<html>
<head>
  <title>Page</title>
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">

  <script src="js/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="js/jquery3.5.1jquery.min.js" ></script>
  <script src="js/popper.min.js"  crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"  crossorigin="anonymous"></script>

</head>
<body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <div class = 'row m-auto'>
        <div >
          <a class="navbar-brand text-white" href="/"><img id = 'logo' src = '<?= APP_URL?>/images/logo.png'></a>
        </div>

        <div class="collapse navbar-collapse " id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link " href="#"> About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">  Our Stories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">News And Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">Contact Us</a>
            </li>
            <li class="nav-item donate_menu pl-4 pr-4">
              <a class="nav-link " href="#">Donate</a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>


<div class = 'container'>
  <div class= 'row justify-content-around'>
    <div class="col">
      <div class="alert alert-primary" role="alert">
        <?= $message?>
      </div>
    </div>
  </div>
</div>

<div class = 'contact_us'>
    <div class = 'container'>
        <div class = 'row'>
            <section  class="mb-4 col-12">

                <!--Section heading-->
                <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                    a matter of hours to help you.</p>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 mb-md-0 mb-5">
                        <form id="contact-form" name="contact-form" >

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Your name" required="required">
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Your email" required="required">
                                        <label for="email" class=""></label>
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required="required">
                                        <label for="subject" class=""></label>
                                    </div>
                                </div>
                            </div>

                            <!--Grid row-->

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Your messages" required="required"></textarea>
                                        <label for="message"></label>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form mb-0">
                                        <input type="file" name="file" id="file" class="input-file">
                                        <label for="file" class="col-4 btn btn-tertiary js-labelFile">
                                            <i class="icon fa fa-check"></i>
                                            <span class="js-fileName">Choose a file</span>
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class=" btn text-center text-md-left">
                                <a class="contact_btn btn ">Send</a>
                            </button>
                        </form>


                        <div class="status"></div>
                    </div>
                    <div class = 'col-md-6 mb-md-0 mb-5'>
                        <div style="width: 100%"><iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=erevan+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                        <div>

                        </div>
                    </div>
                    <!--Grid column-->


                </div>

            </section>
        </div>
    </div>
</div>

</body>
</html>