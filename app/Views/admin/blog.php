
<?= $this->include('layouts/header')?>


<div class='container'>

    <div class='row'>
        <div class='col'>
            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#blogModal">Add new blog</button>

            <div class="modal fade" id="blogModal" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                      <h4 class="modal-title">Add new blogr</h4>
                    </div>
                        <div class="modal-body">
                          <div class="input-group mb-3">
                              <form class ='col-12' id='blog-form'>
                                  <div class = 'w-100' >
                                      <div class = 'mb-2'>
                                          <input id = 'blog_image' type="file" class="blog_image border-top-0 border-secondary" required = "required" name="filepond" '>
                                          <input type="text" value='<?= old('title_am')?>' name = 'title_am' class="form-control " placeholder="Title Am" required = "required" aria-label="Recipient's username" aria-describedby="basic-addon2">

                                      </div>

                                      <textarea id="editor" name ='editor'>

                                      </textarea>
                                 </div> 
                                  <div class = 'w-100 mt-4 ' >
                                    <button class="btn  btn-outline-secondary" type="button" data-toggle="collapse" href="#ru" role="button" aria-expanded="false" aria-controls="collapseExample">
                                      Russia
                                    </button>
                                 </div> 
                                 <div class ='mt-4 w-100 collapse multi-collapse'  id="ru">
                                         <div class = 'mb-2'>
                                             <input type="text"  required = "required" name = 'title_ru' class="form-control" placeholder="Title Ru" aria-label="Recipient's username" aria-describedby="basic-addon2">

                                         </div>

                                         <textarea id="editor2" name ='editor2' >

                                          </textarea> 
                                 </div>
                                  <div  class = 'w-100 mt-4 ' >
                                      
                                    <button class="btn  btn-outline-secondary" type="button" data-toggle="collapse" data-target="#en" aria-expanded="false" aria-controls="collapseExample">
                                      English
                                    </button>
                                  </div>
                                 <div class ='mt-4 w-100 collapse multi-collapse' id="en"">
                                      <div class = 'mb-2'>
                                          <input type="text" name = 'title_en' class="form-control" placeholder="Title En" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                          
                                      </div>
                                     
                                      <textarea id="editor3" name ='editor3' >

                                      </textarea> 
                                 </div>
                              </form>     



                            </div>
                        </div>
                        <div class="modal-footer">
                            
                          <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
                          <button  type="submit" class="btn btn-default btn-primary addblog" data-blog-id='0' >Add</button>
                        </div>

                </div>
              </div>
            </div>
        </div>
    </div>
    <div class='row mt-4'>
        <div class='col'>
             <table id="blogTable" class="display table-bordered mt-5 table" style="width:100%">
                <thead>
                    <tr >
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>


        <!-- End of Main Content -->
    </div>
</div>


    
<script type="text/javascript">
    var blog_image =  '';
  
    $(function(){
        // Turn input element into a pond with configuration options

        const pond = $('.blog_image').filepond({
            allowMultiple: false,
            maxFileSize: '1MB',
            onaddfile :function(error, obj) {
                blog_image = obj.file;
            },
            onremovefile:function(error, obj) {
                blog_image = '';

            }
        });
    })
    tinymce.init({
        selector: '#editor',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| media',
        height: 300,
        image_title: true,
        automatic_uploads: true,
       
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
        selector: '#editor2',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| media',
        height: 300,
        image_title: true,
        automatic_uploads: true,
        
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
        selector: '#editor3',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| media',
        height: 300,
        image_title: true,
        automatic_uploads: true,
        
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




    var blogDataTable = $('#blogTable').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?= APP_URL?>/admin/blog/list",
                    "type": "POST"
                },
                "columns": [
                    { "data": "id" , "orderable": true},
                    { "data": "title_am", "orderable": true},
                    { "data": "status", "orderable": true},
                    { "data": "created_at", "orderable": true},
                    { "data": "action", "orderable": false},
                ],
                    "order":[['0' ,'desc']]
    } );

    
    
    
    
    $(".addblog").click(function(){
        if($('.js-edit-blog').attr('data-blog-id')){
            var id = $('.js-edit-blog').attr('data-blog-id');
        }else{
            var id = 0;
        }
        var file_id = $(this).attr('data-blog-id');
        var formData = new FormData($('#blog-form')[0])
        var datablogid = $(this).attr('data-blog-id');
        var editor_am =  tinymce.get("editor").getContent();
        var editor_ru =  tinymce.get("editor2").getContent();
        var editor_en =  tinymce.get("editor3").getContent();
        
        formData.append('editor', editor_am)
        formData.append('editor2', editor_ru)
        formData.append('editor3', editor_en)
        formData.append('blogid', datablogid)
        formData.append('file', blog_image);
       
        $.ajax({
           url: '<?= APP_URL?>/admin/blog/add/'+id+'/'+file_id,
           type: 'POST',
           processData: false,
           contentType: false,
           data: formData,
           dataType:'JSON',
           success: function(response) {
               if(response.status == 0){
                   Swal.fire({
                                icon: 'error',
                                title: 'Please fill required fields...',
                                text: response.massage,

                            })
               } else{
                   Swal.fire(
                                'Good job!',
                                'Action successfully done',
                                'success'
                            ) 
                   $('#blogModal').modal('toggle');
                   blogDataTable.ajax.reload( null, false );
               }
                
               
           }
        });


    });
    $(document).on('click','.js-edit-blog',function(){
        
        
        var id = $(this).attr('data-blog-id');
       
        $.ajax({
            url: "<?= APP_URL?>/admin/blog/show/"+id,
            type: 'GET',
            dataType:'JSON',
            success: function(response) {
               
               if(response.file_name != '') {
                   $('.blog_image').filepond('addFile', "<?= APP_URL?>/uploads/blog/"+response.file_name).then(function(file){
                        console.log('file added', file);
                    });
               }
               
               $("input[name='title_am']").val(response.title_am);
               $("input[name='title_ru']").val(response.title_ru);
               $("input[name='title_en']").val(response.title_en);
//               $("input[name='filepond']").val(response);
               tinymce.get("editor").setContent(response.body_am);
               tinymce.get("editor2").setContent(response.body_ru);
               tinymce.get("editor3").setContent(response.body_en);
               
               
               $('#blogModal').modal('toggle');
               $('.addblog').attr('data-blog-id',response.id)
               
            }

        })
    })
    $(document).on('click','.js-delete-blog',function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              var id = $(this).attr('data-blog-id');
                $.ajax({
                    url: '<?= APP_URL?>/admin/blog/delete/'+id,
                    type: 'DELETE',
                    success: function(response) {
                        if(response == 1){
                            Swal.fire(
                                'Good job!',
                                'Blog deleted successfully',
                                'success'
                            )
                            blogDataTable.ajax.reload(null, false);
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',

                            })
                        }


                    }
                 });
                }
          })
        
            
             
        
    });
    $(document).on('click','.js-status-blog',function(){
        
        Swal.fire({
            title: 'Do you want to change status?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, change it!'
          }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).attr('data-blog-id');
                var status = $(this).attr('data-blog-status');
                $.ajax({
                    url: "<?= APP_URL?>/admin/blog/update-status/"+id+"/"+status,
                    type: 'PUT',
                    success: function(response) {
                        if(response == 1){
                            Swal.fire(
                                'Good job!',
                                'Blog status changed successfully',
                                'success'
                            )
                            blogDataTable.ajax.reload(null, false);
                        } else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',

                            })
                        }


                    }
                 });
            }
          })     
        
    })
    
    
    $('#blogModal').on('hidden.bs.modal', function () {
        $("input[name='title_am']").val('');
        $("input[name='title_ru']").val('');
        $("input[name='title_en']").val('');
        tinymce.get("editor").setContent('');
        tinymce.get("editor2").setContent('');
        tinymce.get("editor3").setContent('');
        $('.blog_image').filepond('removeFile');       
        $('.addblog').attr('data-blog-id', 0)
    })
 </script>

<?= $this->include('layouts/footer')?>