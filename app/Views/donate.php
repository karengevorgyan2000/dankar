<!DOCTYPE html>
 <?php
    $class = 'active';
 ?>
<html>
    <head>
        <title>Page</title>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/admin/css/fontawesome.min.css">
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="col-5 payment">

            <form> 
                <div class="row p-5">
                    <div class="form-group col-sm-12">
                        <h3 class="title text-white">Payment Information</h3>
                    </div>
                    <div class="form-group col-12">
                        <div class="inner-addon right-addon">
                           <label for="card-holder">Card Holder</label>
                           <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
                        </div>	
                    </div>

                    <div class="form-group col-12">
                     <div class="inner-addon right-addon">
                        <label for="card-number">Credit Card Number</label>
                        <input id="card-number" type="text" class="form-control" placeholder="Credit Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
                     </div>	
                    </div>
                    <div class="form-group col-sm-8 ">
                        <label for="">Expiration</label>
                        <div class = 'row'>
                            <div class="input-group expiration-date form-group col-sm-4">
                                <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group expiration-date form-group col-sm-4">
                                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
                            </div>
                        </div>      
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="cvc">Cecurity Code</label>
                        <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group col-sm-12">
                        <h3 class = 'text-white'>Click the button to confirm your donation of $10,recurring monthly.</h3>
                    </div>
                    <div class="form-group col-sm-12">
                        <button type="button" class="btn btn-primary btn-block">Proceed</button>
                    </div>
                </div>
            </form>				

        </div>
    </body>
</html>