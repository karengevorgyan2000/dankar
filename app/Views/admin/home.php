<?= $this->include('layouts/header')?>


<div class='container'>

    <div class='row'>
        <div class='col'>
            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#slideModal">Add new slide</button>

            <div class="modal fade" id="slideModal" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                      <h4 class="modal-title">slider</h4>
                    </div>
                        <div class="modal-body">
                          <div class="input-group mb-3">
                              <form class ='col-12' id = 'slide-form'>
                                  <div class = 'w-100' >
                                      <div class = 'mb-2'>
                                            <input type="text"  name = 'title_left' class="form-control " placeholder="Title Left" >
                                            <input type="text"  name = 'title_right' class="form-control mt-2" placeholder="Title Right" >
                                            <input id = 'image' type="file" class="my-pond border-top-0 border-secondary" required = "required" name="filepond">
                                            
                                            
                                      </div>
                                        
                                 </div> 
                              </form>     



                            </div>
                        </div>
                        <div class="modal-footer">
                            
                          <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
                          <button  type="submit" class="btn btn-default btn-primary addslide" data-slide-id='0' >Add</button>
                        </div>

                </div>
              </div>
            </div>
            <div class="modal fade" id="slideModalEdit" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">

                      <h4 class="modal-title">slider</h4>
                    </div>
                        <div class="modal-body">
                          <div class="input-group mb-3">
                              <form class ='col-12' id='edit-title-form'>
                                  <div class = 'w-100' >
                                      <div class = 'mb-2'>
                                            <input type="text"  name = 'title_left_update' class="form-control " placeholder="Title Left" >
                                            <input type="text"  name = 'title_right_update' class="form-control mt-2" placeholder="Title Right" >
                                      </div>
                                        
                                 </div> 
                              </form>     



                            </div>
                        </div>
                        <div class="modal-footer">
                            
                          <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
                          <button  type="submit" class="btn btn-default btn-primary editslide" data-slide-id='0' >Add</button>
                        </div>

                </div>
              </div>
            </div>
        </div>
    </div>
    <div class='row mt-4'>
        <div class='col'>
             <table id="slideTable" class="display table-bordered mt-2 table" style="width:100%">
                <thead>
                    <tr >
                        <th scope="col">Id</th>
                        <th scope="col">Title Left</th>
                        <th scope="col">Title Right</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title Left</th>
                        <th scope="col">Title Right</th>
                        <th scope="col">Image</th>
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
<script>
    var image =  '';
  
    $(function(){

    // Turn input element into a pond with configuration options
    
    const pond = $('.my-pond').filepond({
        allowMultiple: false,
        onaddfile :function(error, obj) {
            image = obj.file;
        },
        onremovefile:function(error, obj) {
            image = '';
            
        }
    });
    

    $(".addslide").click(function(){
          //var id = $(this).attr('data-slide-id');  
          var formData = new FormData($('#slide-form')[0]);

          formData.append('file', image);
          $.ajax({
             url: '<?= APP_URL?>/admin/home/add',
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
                              ) ;
                     $('#slideModal').modal('toggle');
                     //$('#slideModalEdit').modal('toggle');
                     slideDataTable.ajax.reload( null, false );
                 }


             }
          });


      });
      $(document).on('click','.editslide',function(){
          var id = $(this).attr('data-slide-id');  
          var editData = new FormData($('#edit-title-form')[0]);
          // todo :: check tarorinak error
          editData.append('_method', 'PUT');
          $.ajax({
             url: '<?= APP_URL?>/admin/home/edit/'+id,
             type: 'POST',
             processData: false,
             contentType: false,
             data: editData,
             dataType:'JSON',
             success: function(response) {
                 if(response == 0){
                     Swal.fire(
                                  'Good job!',
                                  'Action successfully done',
                                  'success'
                              ) ;
                     $('#slideModalEdit').modal('toggle');
                     slideDataTable.ajax.reload( null, false );
                 }


             }
          });


      });
      var slideDataTable = $('#slideTable').DataTable( {
                  "processing": true,
                  "serverSide": true,
                  "ajax": {
                      "url": "<?= APP_URL?>/admin/home/slide_list",
                      "type": "POST"
                  },
                  "columns": [
                      { "data": "id" , "orderable": true},
                      { "data": "title_left", "orderable": true},
                      { "data": "title_right", "orderable": true},
                      { "data": "image", "orderable": false},
                      { "data": "status", "orderable": true},
                      { "data": "created_at", "orderable": true},
                      { "data": "action", "orderable": false},
                  ],
                      "order":[['0' ,'desc']]
      } );
      $(document).on('click','.js-delete-file',function(){
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
                var id = $(this).attr('data-slide-id');
                  $.ajax({
                      url: '<?= APP_URL?>/admin/home/delete/'+id,
                      type: 'DELETE',
                      success: function(response) {
                          if(response == 1){
                              Swal.fire(
                                  'Good job!',
                                  'Blog deleted successfully',
                                  'success'
                              );
                              slideDataTable.ajax.reload( null, false );
                          }else{
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'Something went wrong!',

                              });
                          }


                      }
                   });
                  }
            });




      });
      $(document).on('click','.js-status-file',function(){
            
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
                    var id = $(this).attr('data-slide-id');
                    var status = $(this).attr('data-slide-status');
                    $.ajax({
                        url: "<?= APP_URL?>/admin/home/update-status/"+id+"/"+status,
                        type: 'PUT',
                        success: function(response) {
                            if(response == 1){
                                Swal.fire(
                                    'Good job!',
                                    'Blog status changed successfully',
                                    'success'
                                );
                                slideDataTable.ajax.reload(null, false);
                            } else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "Something went wrong!",

                                });
                            }


                        }
                     });
                }
              });     

      });
      $(document).on('click','.js-edit-file',function(){
        
        
            var id = $(this).attr('data-slide-id');
           
            $.ajax({
                url: "<?= APP_URL?>/admin/home/show/"+id,
                type: 'GET',
                dataType:'JSON',
                success: function(response) {
                    $("input[name='title_left_update']").val(response.title_left);
                    $("input[name='title_right_update']").val(response.title_right);
                    $('.editslide').attr('data-slide-id',response.id);
                    $('#slideModalEdit').modal('toggle');
                    //$('.addblog').attr('data-blog-id',response.id)

                }

            });
      });
      $('#slideModal').on('hidden.bs.modal', function () {
          $("input[name='title_left']").val('');
          $("input[name='title_right']").val('');
          $('.my-pond').filepond('removeFile');
          $('.addblog').attr('data-slide-id', 0);
      });
      

    
  
  });
</script>


<?= $this->include('layouts/footer')?>('layouts/footer')?>