
    <?= $this->include('layouts/header')?>


<div class='container'>
        
    <div class='row mt-4'>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Answer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form class= 'answer_form'>
				  <div class="modal-body">
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name = 'message'></textarea>
				  </div>
			  </form>	  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary send_email" data-mail = ''>Send</button>
			  </div>
			</div>
		  </div>
		</div>
        <div class='col'>
             <table id="messagesTable" class="display table-bordered mt-2 table" style="width:100%">
                <thead>
                    <tr >
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">File</th>
                        <th scope="col">Answer</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">File</th>
                        <th scope="col">Answer</th>
                    </tr>
                </tfoot>
            </table>
        </div>


        <!-- End of Main Content -->
    </div>
</div>
<script>
    $(document).ready(function() {
        var messagesDataTable = $('#messagesTable').DataTable( {
                "processing": true,
                "serverSide": true,
                "searching": false,
                ajax: {
                    
                    "url": "<?= APP_URL?>/admin/messages/list",
                    "type": "POST",
                },
                "columns": [
                    { "data": "id" , "orderable": true},
                    { "data": "name" , "orderable": false},
                    { "data": "email" , "orderable": false},
                    { "data": "subject", "orderable": false},
                    { "data": "message", "orderable": false},
                    { "data": "file", "orderable": false},
                    { "data": "answer ", "orderable": false},
                ],
                    "order":[['0' ,'desc']]
         } );
    } )
	
	  
	$(document).on('click','.answer',function(){
					
					var mail = $(this).attr('data-mail');
					var subject = $(this).attr('data-subject');
					$('.send_email').attr('mail', mail);
					$('.send_email').attr('subject', subject);

      });  
	  $(document).on('click','.send_email',function(){
					var mail = $(this).attr('mail');
					var subject = $(this).attr('subject');
					var formData = new FormData($('.answer_form')[0]);
					formData.append('mail',mail);
					formData.append('subject',subject);
					$.ajax({
						url: '/admin/sendmail',
						processData: false,
						contentType: false,
						data: formData,
						type: 'POST',
						dataType:'JSON',
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
	  });
	  
	
</script>


<?= $this->include('layouts/footer')?>('layouts/footer')?>
