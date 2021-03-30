
<?= $this->include('layouts/header')?>
<div class = 'col-10 m-auto'>
    <h5 class="mb-4 font-weight-bold">About Us</h5>
	<button class="btn btn-outline-secondary w-25"  >
		Armenian
	</button>	
    <textarea id = 'aboutus_am' name = 'aboutus_am'>
    </textarea>
	<div>
		<button class="btn btn-outline-secondary w-25" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
			Russian
		</button>
	</div>
		
	
	<div class="collapse" id="collapseExample">
		<textarea id = 'aboutus_ru' name = 'aboutus_ru' class = 'collapse'>
		</textarea>
	</div>
	<div>
		<button class="btn  btn-outline-secondary w-25" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
			English
		</button>
	</div>
	
	<div class="collapse" id="collapseExample2">
		<textarea id = 'aboutus_en' name = 'aboutus_en'>
		</textarea>
	</div>
    
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
        selector: '#aboutus_am',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| media',
        height: 200,
        image_title: true,
        automatic_uploads: true,
        init_instance_callback : function(editor) {
            <?php if(!empty($aboutUs)):?>
                editor.setContent(`<?php echo $aboutUs['aboutus_am'] ?>`);
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
	tinymce.init({
        selector: '#aboutus_ru',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| media',
        height: 200,
        image_title: true,
        automatic_uploads: true,
        init_instance_callback : function(editor) {
            <?php if(!empty($aboutUs)):?>
                editor.setContent(`<?php echo $aboutUs['aboutus_ru'] ?>`);
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
	tinymce.init({
        selector: '#aboutus_en',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| media',
        height: 200,
        image_title: true,
        automatic_uploads: true,
        init_instance_callback : function(editor) {
            <?php if(!empty($aboutUs)):?>
                editor.setContent(`<?php echo $aboutUs['aboutus_en'] ?>`);
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
        var aboutus_am =  tinymce.get("aboutus_am").getContent();
        var aboutus_ru =  tinymce.get("aboutus_ru").getContent();
        var aboutus_en =  tinymce.get("aboutus_en").getContent();

        aboutData.append('aboutus_am', aboutus_am);
        aboutData.append('aboutus_ru', aboutus_ru);
        aboutData.append('aboutus_en', aboutus_en);
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
