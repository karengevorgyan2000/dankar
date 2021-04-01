<!DOCTYPE html>
 <?php
    $class = 'active';
    $class2 = 'active';
    $class3 = 'active';
    $i = 0;

 ?>
<html>
    <head>
        <title>Page</title>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
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
                        <div class="collapse navbar-collapse " id="navbarsExampleDefault">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item ">
                                    <a class="navbar-brand text-white p-0" href="/"><img id = 'logo' src = '<?= APP_URL?>/images/logo.png'></a>
                                </li>
                                <li class="nav-item ">
                                        <a class="nav-link " href="#about_us"> About Us</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link " href="#our_stories">  Our Stories</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link " href="#">News And Events</a>
                                </li> 
                                <li class="nav-item">
                                        <a class="nav-link " href="#contact_us">Contact Us</a>
                                </li> 
                                <li class="nav-item donate_menu pl-4 pr-4">
                                        <a class="nav-link " style="color: #FFFFFF !important;" href="#donate">Donate</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <select class="form-control border-0 lang" id="exampleFormControlSelect1">
                                        <option name = 'lang' value="am">Armenian</option>
                                        <option name = 'lang' value="en">English</option>
                                        <option name = 'lang' value="ru">Russian</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
              
            <div id="carouselExampleControls" class="carousel slide carousel-fade home_slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php foreach ($slide as $key =>$row){?>
                        <div class="carousel-item <?php if($class == 'active'){echo $class;$class = '';} ?>">
                            
                            <img class="d-block w-100" src="<?= '/uploads/slider/'.$row->file_name; ?>" alt="First slide">
                            <div class="col-8  p-4 slide_text h-75 row justify-content-between">
                                <div class="col-lg-5 col-sm-12  align-self-center p-4">

                                    <p class = ' slide_text_style '><?= $row->title_left; ?></p>
                                </div>
                                <div class="col-xl-5 col-lg-6 col-sm-12 align-self-center bg-white row justify-content-between p-4">
                                    <div class = 'col-8 '>
                                        <p class = 'text-dark slide_text_style '><?= $row->title_right; ?></p>
                                    </div>
                                    <div class = 'col-3 align-self-center text-left'>
                                        <div type="button" class="btn  slide-site">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>

                                        </div>
                                        <div type="button" class="btn  mt-3 mb-3 slide-site">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div  type = 'button' class="btn position-absolute slide_share">
                                        <a>SHARE</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
              </div>
            
        <div class="  donate_row position-relative slide" >
			<div class = 'container'>
				<div class= 'row justify-content-around'>
				<div class = 'col-xl-6 col-lg-6 col-sm-12 h-100 dante_col'>
					<form class = '' id = 'donate' action="/donate" method="post">
						<div class = ' p-3'>
							<h3 class = 'mb-3 text-white'>Choose donation amount</h3>
							<div>
								<div class="col-12 bg-white p-0 border border-white">
									<div class = '  donate_money_fild row'>
										<label class="btn btn-default col-4 checkbox  ">
											<input type="radio" name="testrad" value='10'>
											<span>10$</span>
										</label>
										<div class="col-8 m-auto">
											<p class = 'm-auto text_money' >
												"Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
											</p>
										</div>
									</div>    
									   
									<div class = ' row donate_money_fild border-top border-bottom border-secondary'>
										<label class="btn btn-default col-4 checkbox ">
											<input type="radio" name="testrad" value ='25'>
											<span>25$</span>
										</label>
										<div class="col-8 m-auto">
											<p class = 'm-auto text_money'>
												"Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
											</p>
										</div>
									</div>
									<div class = 'row donate_money_fild'>
										<label class="btn btn-default col-4 checkbox ">
											<input type="radio" name="testrad" value = '50'>
											<span>50$</span>
										</label>
										<div class="col-8 m-auto">
											<p class = 'm-auto text_money'>
												"Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
											</p>
										</div>
									</div>
								</div>
                                    <div class = 'col-12 mt-2  p-0'>
                                        <a class = 'donate_link' >Enter a custom donation amount</a>
                                        <div class="row " id = 'custom_donation' style = 'display:none;'>
                                            <div class="col">
                                              <select class="custom-select mr-sm-2" name ='currency' id="inlineFormCustomSelect">
                                                <option selected value="840">USD</option>
                                                <option value="051">AMD</option>
                                                <option value="978">EUR</option>
                                                <option value="643">RUB</option>
                                            </select>
                                            </div>
                                            <div class="col">
                                                <input type="number" name ='testrad2' id ='donate_custom_input' class="form-control" >
                                            </div>
                                        </div>
                                    </div>
							</div>
							
						</div>
						
						<div class="p-4 d-flex align-items-end">
								<button class=" ml-auto btn donate_checkout" type="submit">Go to checkout</button>
						</div>
					</form>    
                

				</div>
				<div class = 'col-xl-5 col-lg-5 col-sm-12 h-75 align-self-center'>
					<p class = 'text-white donate_text '>
                        Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:
                    </p>
				</div>
			</div>
            
            </div>
        </div>
        <div id = 'our_stories'>
                <div class="container">
                        <div class="row">
								<div class="col-12">
									<h2 class="h1-responsive font-weight-bold text-center my-4 text-dark"><?= lang('text.our_stories')?></h2>
								</div>
                                <div id="carouselExampleIndicators" class="carousel slide blog_slide col-12" data-ride="carousel" data-interval="false">
                                    <ol class="carousel-indicators blog_indicator">
                                        <?php foreach ($blog as $key =>$row){?>

                                                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="<?php if($class2 == 'active'){echo $class2;$class2 = '';} ?> bg-dark"></li>

                                        <?php $i++;} ?> 

                                    </ol>
                                    <div class="carousel-inner bg-white">


                                        <?php foreach ($blog as $key =>$row){?>
                                                <div class="carousel-item <?php if($class3 == 'active'){echo $class3;$class3 = '';} ?>">
                                                    <div class="row h-100 align-items-center justify-content-end position-relative ">
                                                        <div class="col-7 blog_bg h-75" style = 'background-image: url("<?= '/uploads/blog/'.$row->file_name;?>");background-size:cover;background-repeat:no-repeat; '>

                                                        </div>
                                                        <div class="col-6 blog_left_col h-75 position-absolute">

                                                            <div class = 'blog_text h-50 p-3'>
                                                                <h5 class = 'text-white'>
                                                                    <?= $row->{"title_".$_COOKIE['lang']};?>
                                                                </h5>
                                                                <h5 class = 'text-white' style="font-size: 12px">
                                                                    <?= $row->{'body_'.$_COOKIE['lang']};?>
                                                                </h5>
                                                            </div>
                                                            <div class = 'h-25 mt-5'>
<!--                                                                    <button class=" ml-auto btn donate_checkout " type="submit">Go to checkout</button>-->
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php } ?> 

                                    </div>
                                </div>
                        </div>
                </div>
        </div>
        <div class = 'about_us' id = 'about_us'>
                <div class="container">
                        <div class="row align-items-center  p-4">
							<div class="col-12">
								<h2 class="h1-responsive font-weight-bold text-center my-4 text-white">About us</h2>
							</div>
                            <div class="col-12 mb-5 ">
                                    <h4 class = 'text-white text-center' style="overflow-wrap: break-word!important;"> <?php foreach ($aboutUs as $key =>$row){
                                                                        echo  $row->{"aboutus_".$_COOKIE['lang']};
                                                                    }  ?>   
                                    </h4>    
                            </div>
                            <div class = ' row justify-content-around '>
                                <div class="col-xl-4 col-sm-5  position-relative p-0 border about_info_col">
                                        <div class = 'about_image  w-100' style = 'background-image:url(<?= APP_URL?>/images/artyom/image0.jpeg);background-size: cover'>

                                        </div>
                                        <div class = 'mt-3 p-4 '>
                                                <h5>Արտոմ Կարապետյան</h5>
                                                <p class = 'p-0'>
                                                    1978 թ. քաղաք Լենինական: Դերասան։ Աշխատել է «Շանթ» հեռուստաընկերությունում, նկարահանվել է բազմաթիվ սերիալներում, թատերական բեմադրություններում և հեռուստանախագծերում: Աշխատել է նաև Ախուրյանի գուղշին տրեստում, որպես բանվոր, հետո աշխղեկ:</p>
                                                <button class=" ml-auto btn donate_checkout " type="submit">Read More</button>
                                        </div>
                                </div>
                                <div class="col-xl-4 col-sm-5  position-relative p-0 border about_info_col">
                                        <div class = 'about_image  w-100' style = 'background-image:url(<?= APP_URL?>/images/sergey/image.JPG);background-size: cover'>

                                        </div>
                                        <div class = 'mt-3 p-4 '>
                                                <h5>Սերգեյ Դանիելյան</h5>
                                                <p class = 'p-0'>
                                                    1964 թ․ ք․ երևան:Դերասան, աշխատել է «Շանթ» հեռուստաընկերությունում, երևանի Կամերային թատրոնում, ունի յութուբյան ալիք՝ «Սերգեյ Դանիելյան»։ Բազմաթիվ ներկայացումների, ինպես նաև մոնո ներկայացումների հեղինակ է, նաև նկարահանվել է մի շարք սերիալներում, ֆիլմերում:
                                                </p>
                                                <button class=" ml-auto btn donate_checkout " type="submit">Read More</button>
                                        </div>
                                </div>
                            </div>    
                        </div>

                </div>
        </div>
        <div class = 'contact_us' id = 'contact_us'>
            <div class = 'container'>
                <div class = 'row'>
                    <section  class="mb-4 col-12">

                        <!--Section heading-->
                        <div class = 'my-5'>
                            <h2 class="h1-responsive font-weight-bold text-center ">Contact us</h2>
                        </div>

                        <div class="row mt-4">

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
        <footer class=" text-center text-lg-start " style = 'background-color:#6d6a6a;'>
            <!-- Copyright -->
            <div class="text-center p-3" >
                <p class = 'text-white m-0'>
                    All Rights Reserved
                </p>
            </div>
            <!-- Copyright -->
        </footer>
    </body>
    <script>
        (function() {


            $('.input-file').each(function() {
                var $input = $(this),
                    $label = $input.next('.js-labelFile'),
                    labelVal = $label.html();

                $input.on('change', function(element) {
                var fileName = '';
                if (element.target.value) fileName = element.target.value.split('\\').pop();
                    fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
                });
            });

          })();
        $( ".donate_link" ).click(function() {
           
            $( "#donate_custom_input" ).val('');
            
            $("#custom_donation").fadeToggle("slow");
            $('.donate_money_fild').find('span').css( "color", "#505d7c" );
            $('.donate_money_fild').css("background-color", "white")
            $('.donate_money_fild').find('.text_money').css( "color", "#505d7c" );
            $('.donate_money_fild').find('input').prop("checked", false);
        });
        $('.home_slide').carousel({
            'interval' : 3000,
            'keyboard' : false,
            'ride' : 'carousel',
            
        })
		$('.blog_slide').carousel({
            'interval' : false,
            'keyboard' : false,
            
        })
		
        $( ".donate_money_fild" ).on( "click", function() {
            $('.donate_money_fild').find('span').css( "color", "#505d7c" );
            $('.donate_money_fild').css("background-color", "white")
            $('.donate_money_fild').find('.text_money').css( "color", "#505d7c" );
            $('.donate_money_fild').find('input').prop("checked", false);
            $(this).css( "background-color", "#505d7c" );
            $(this).find('span').css( "color", "#fff" );
            $(this).find('input').prop("checked", true);
            $(this).find('.text_money').css( "color", "#fff" );
            $( "#donate_custom_input" ).val('');
            $("#custom_donation").fadeOut("slow");
        });
        $( ".time_chackbox_fild" ).on( "click", function() {
            $('.time_chackbox_fild').find('span').css( "color", "#505d7c" );
            $('.time_chackbox_fild').css("background-color", "white");
            $(this).css( "background-color", "#505d7c" );
            $(this).find('span').css( "color", "#fff" );
        });
        
        
        $(".contact_btn").click(function(){
          //var id = $(this).attr('data-slide-id');  
          var formData = new FormData($('#contact-form')[0]);
          console.log(formData);
          //formData.append('file', image);
          $.ajax({
             url: '<?= APP_URL?>/mail',
             type: 'POST',
             processData: false,
             contentType: false,
             data: formData,
             dataType:'JSON',
             success: function(response) {
                 if(response.status == 0){
                     
                 } else{
                     
                 }


             }
          });


        });

        $(".lang").change('change', function() {
          var lang = $(this).val();
          window.location.href = "<?= APP_URL?>/local/"+lang
        });

          if(document.cookie){
            var cookie = document.cookie.split('=')[1];
            console.log(cookie);
            $( "option[value = "+cookie+"]" ).attr('selected','selected')
          }
    </script>
</html>