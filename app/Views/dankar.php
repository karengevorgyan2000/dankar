<!DOCTYPE html>
 <?php
    $class = 'active';
 ?>
<html>
    <head>
        <title>Page</title>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container">
					<div class = 'row m-auto'>
						<div>
							<a class="navbar-brand text-white" href="#"><img id = 'logo' src = 'https://www.clipartkey.com/mpngs/m/238-2380439_blue-donate-button.png'></a>
						</div>
						
						<div class="collapse navbar-collapse" id="navbarsExampleDefault">
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
              
            <div id="carouselExampleControls" class="carousel slide carousel-fade home_slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php foreach ($slide as $key =>$row){?>
                        <div class="carousel-item <?php if($class == 'active'){echo $class;$class = '';} ?>">
                            
                            <img class="d-block w-100" src="<?= '/uploads/slider/'.$row->file_name; ?>" alt="First slide">
                            <div class="col-8  p-4 slide_text h-75 row justify-content-between">
                                <div class="col-5  align-self-center p-4">

                                    <p class = ' slide_text_style '><?= $row->title_left; ?></p>
                                </div>
                                <div class="col-6 align-self-center bg-white row justify-content-between p-4">
                                    <div class = 'col-8 '>
                                        <p class = 'text-dark slide_text_style '><?= $row->title_right; ?></p>
                                    </div>
                                    <div class = 'col-4 align-self-center text-left'>
                                        <div type="button" class="btn  slide-site">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>

                                        </div>
                                        <div type="button" class="btn  mt-3 mb-3 slide-site">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </div>
                                        <div type="button" class="btn  slide-site">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
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
            
        <div class="  donate_row position-relative slide">
			<div class = 'container'>
				<div class= 'row justify-content-around'>
				<div class = 'col-5 h-100 dante_col'>
					<form class = ''>
						<div class = ' p-3'>
							<h3 class = 'mb-3 text-white'>Choose donation amount</h3>
							<div>
								<div class="col-12 bg-white p-0 border border-white">
									<div class = '  donate_money_fild row'>
										<label class="btn btn-default col-4 checkbox  ">
											<input type="radio" name="testrad">
											<span>10$</span>
										</label>
										<div class="col-8 m-auto">
											<p class = 'm-auto text_money'>
												"Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
											</p>
										</div>
									</div>    
									   
									<div class = ' row donate_money_fild border-top border-bottom border-secondary'>
										<label class="btn btn-default col-4 checkbox ">
											<input type="radio" name="testrad">
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
											<input type="radio" name="testrad">
											<span>50$</span>
										</label>
										<div class="col-8 m-auto">
											<p class = 'm-auto text_money'>
												"Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
											</p>
										</div>
									</div>
								</div>
								<a class = 'donate_link' href = '#' >Enter a custom donation amount</a>
							</div>
							
						</div>
						<div class = ' pl-4 pr-4 '>
							<h3 class = 'mb-3 text-white'>Choose a donation frequency</h3>
							<div class="row time_chackbox border border-white">

								<div class=" col-sm p-0 time_chackbox_fild">
									<label class="btn btn-default col-12 p-3 ">
										<input type="radio" name="donate_time">
										<span class = 'pl-4 time_chackbox_fild_text'>Monthly</span>
									</label>
								</div>
								<div class=" col-sm p-0 time_chackbox_fild">
									<label class="btn btn-default col-12  p-3 ">
										<input type="radio" name="donate_time">
										<span class = 'pl-5 time_chackbox_fild_text'>One Time</span>
									</label>
								</div>
							</div>
						</div>
						<div class="p-4 d-flex align-items-end">

								<button class=" ml-auto btn donate_checkout" type="submit">Go to checkout</button>
						</div>
					</form>    
                

				</div>
				<div class = 'col-5  h-75 align-self-center'>
					<p class = 'text-white donate_text '>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
				</div>
			</div>
            
            </div>
        </div>
        <div>
			<div class="container">
				<div class="row">
					<div id="carouselExampleIndicators" class="carousel slide blog_slide col-12" data-ride="carousel" data-interval="false">
					  <ol class="carousel-indicators blog_indicator">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					  </ol>
					  <div class="carousel-inner">
						<div class="carousel-item active">
						  <div class="row h-100 align-items-center justify-content-end position-relative ">
							<div class="col-7 blog_bg h-75" style = 'background-image:url(https://haykdfs.com/images/2016-films/arcax-1.jpg);'>
							  
							</div>
							<div class="col-6 blog_left_col h-75 position-absolute">
								
								<div class = 'blog_text h-50'>
								
								</div>
								<div class = 'h-25 mt-5'>
									<button class=" ml-auto btn donate_checkout " type="submit">Go to checkout</button>
								</div>  
							</div>
						  </div>
						</div>
						<div class="carousel-item">
						  <div class="row h-100 align-items-center justify-content-end position-relative ">
							<div class="col-7 blog_bg h-75" style = 'background-image:url(https://haykdfs.com/images/2016-films/arcax/arcax-3.jpg);'>
							  
							</div>
							<div class="col-6 blog_left_col h-75 position-absolute">
								
								<div class = 'blog_text h-50'>
								
								</div>
								<div class = 'h-25 mt-5'>
									<button class=" ml-auto btn donate_checkout " type="submit">Read More</button>
								</div>  
							</div>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="container">
				<div class="row justify-content-around align-items-center about_us">
					<div>
						<h3 class = 'text-white'>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h3>
					</div>
					<div class="col-4 h-75 position-relative p-0 border about_info_col">
						<div class = 'about_image h-50 w-100' style = 'background-image:url(https://haykdfs.com/images/2016-films/arcax/arcax-3.jpg);'>
						
						</div>
						<div class = 'mt-3 p-4 h-50'>
							<h4>Three Planting</h4>
							<p class = 'p-0'>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500
							</p>
							<button class=" ml-auto btn donate_checkout " type="submit">Read More</button>
						</div>
					</div>
					<div class="col-4 h-75 position-relative p-0 border about_info_col">
						<div class = 'about_image h-50 w-100' style = 'background-image:url(https://haykdfs.com/images/2016-films/arcax/arcax-3.jpg);'>
							
						</div>
						<div class = 'mt-3 p-4 h-50'>
							<h4>Three Planting</h4>
							<p class = 'p-0'>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500
							</p>
							<button class=" ml-auto btn donate_checkout " type="submit">Read More</button>
						</div>
					</div>

				</div>
				
			</div>
		</div>
    </body>
    <script>
        
        $('.home_slide').carousel({
            'interval' : 3000,
            'keyboard' : false,
            'ride' : 'carousel',
            
        })
		$('.blog_slide').carousel({
            'interval' : false,
            'keyboard' : false,
            
        })
		
        $( ".checkbox" ).on( "click", function() {
            $('.donate_money_fild').find('span').css( "color", "#354463" );
            $('.donate_money_fild').css("background-color", "white")
            $('.donate_money_fild').find('.text_money').css( "color", "#354463" );
            $(this).parent().css( "background-color", "#354463" );
            $(this).parent().find('span').css( "color", "#fff" );
            $(this).parent().find('.text_money').css( "color", "#fff" );
        });
        $( ".time_chackbox_fild" ).on( "click", function() {
            $('.time_chackbox_fild').find('span').css( "color", "#354463" );
            $('.time_chackbox_fild').css("background-color", "white");
            $(this).css( "background-color", "#354463" );
            $(this).find('span').css( "color", "#fff" );
        });
        
    </script>
</html>