
<?= $this->include('layouts/header')?>
<div class = 'col-10 m-auto'>
    <h5 class="mb-4 font-weight-bold">About Us</h5>
    <textarea id = 'aboutus' name = 'aboutus'>
    </textarea>
    <button  type="submit" class="btn btn-default btn-primary addabout float-right mt-2"  >Save</button>
   
</div>

<script type="text/javascript">

function f(callback) {
    // gorcoxutyun
    
    
    
    
    
    callback()
}



f(function c() {
//    dfjhsdjkhjkfsjkfd
})



    tinymce.init({
        selector: '#aboutus',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| media',
        height: 400,
        image_title: true,
        automatic_uploads: true,
        init_instance_callback : function(editor) {
            <?php if(!empty($aboutUs)):?>
                editor.setContent(`<?php echo $aboutUs['about_us'] ?>`);
            <?php endif;?>
        },
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            /*
              Note: In modern browsers input[type="file"] is functional without
              even adding it to the DOM, but that might not be the case in some older
              or quirky browsers like IE, so you might want to add it to the DOM
              just in case, and visually hide it. And do not forget do remove it
              once you do not need it anymore.
            */

            input.onchange = function () {
              var file = this.files[0];

              var reader = new FileReader();
              reader.onload = function () {
                /*
                  Note: Now we need to register the blob in TinyMCEs image blob
                  registry. In the next release this part hopefully won't be
                  necessary, as we are looking to handle it internally.
                */
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), { title: file.name });
              };
              reader.readAsDataURL(file);
            };

            input.click();
        },

    });

    $(".addabout").click(function(){
        var aboutData = new FormData();
        var about_us =  tinymce.get("aboutus").getContent();

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
