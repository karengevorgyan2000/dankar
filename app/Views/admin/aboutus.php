
<?= $this->include('layouts/header')?>
<div class = 'col-10 m-auto'>
    <h5 class="mb-4 font-weight-bold">About Us</h5>
    <textarea id = 'aboutus' name = 'aboutus'>
    </textarea>
    <button  type="submit" class="btn btn-default btn-primary addabout float-right mt-2"  >Save</button>
   
</div>

<script type="text/javascript">
    let aboutus;
    ClassicEditor
                .create( document.querySelector( '#aboutus' ), {
                    
                } )

                .then( editor => {
                       aboutus =  editor;
                } )
                .catch( err => {
                        console.error( err.stack );
                } );
    $(document ).ready(function() {
        <?php if(!empty($aboutUs)):?>
            aboutus.setData(`<?php echo $aboutUs['about_us'] ?>`);
        <?php endif;?>
    });
    $(".addabout").click(function(){
        var aboutData = new FormData();
        var about_us =  aboutus.getData();

        aboutData.append('aboutus', about_us);
        aboutData.append('id', '<?php echo $aboutUs['id'] ?>');
       
       
        $.ajax({
           url: '<?= APP_URL?>/admin/about-us/add',
           type: 'POST',
           processData: false,
           contentType: false,
           data: aboutData,
           dataType:'JSON',
           success: function(response) {
               if(response.status == 0){
                   Swal.fire({
                                icon: 'error',
                                title: 'Please fill required fields',
                                text: response.massage,

                            })
               } else{
                   Swal.fire(
                                'Good job!',
                                'Action successfully done',
                                'success'
                            ) 
               }
                
               
           }
        });


    }); 
</script>                
<?= $this->include('layouts/footer')?>
