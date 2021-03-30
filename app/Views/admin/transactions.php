<?= $this->include('layouts/header')?>


<div class='container'>
        
    <div class='row mt-4'>
		<!-- Modal -->
		<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">All Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
					<table class="table">
					  
					  <tbody class = 'all_data_table'>
					  
					  </tbody>
					</table>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
        <div class='col'>
             <table id="transactionsTable" class="display table-bordered mt-2 table" style="width:100%">
                <thead>
                    <tr >
                        <th scope="col">Id</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Payment Id</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Card Holder</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created Time</th>
                        <th scope="col">All Details</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Payment Id</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Card Holder</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created Time</th>
                        <th scope="col">All Details</th>
                    </tr>
                </tfoot>
            </table>
        </div>


        <!-- End of Main Content -->
    </div>
</div>
<script>
    $(document).ready(function() {
        var transactionsDataTable = $('#transactionsTable').DataTable( {
                "processing": true,
                "serverSide": true,
                "searching": true,
                ajax: {
                    
                    "url": "<?= APP_URL?>/admin/transactions/list",
                    "type": "POST",
                },
                "columns": [
                    { "data": "id" , "orderable": true},
                    { "data": "order_id" , "orderable": false},
                    { "data": "payment_id" , "orderable": false},
                    { "data": "amount", "orderable": false},
                    { "data": "status", "orderable": true},
                    { "data": "name", "orderable": false},
                    { "data": "email", "orderable": false},
                    { "data": "created_at", "orderable": false},
                    { "data": "all_details", "orderable": false},
                ],
                    "order":[['0' ,'desc']]
         } );
    } );
    $(document).on('click','.show_all_data ',function(){
        
		var allData = JSON.parse($(this).attr('data-all'));		
        $.each( allData, function( key, value ) {
			$('.all_data_table').append("<tr><td>"+key+"</td><td>"+value+"<td></tr>");
		});
    })
      
</script>


<?= $this->include('layouts/footer')?>('layouts/footer')?>