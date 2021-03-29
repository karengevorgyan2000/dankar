<?= $this->include('layouts/header')?>


<div class='container'>
        
    <div class='row mt-4'>
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
                "searching": false,
                ajax: {
                    
                    "url": "<?= APP_URL?>/admin/transactions/list",
                    "type": "POST",
                },
                "columns": [
                    { "data": "id" , "orderable": true},
                    { "data": "order_id" , "orderable": false},
                    { "data": "payment_id" , "orderable": false},
                    { "data": "amount", "orderable": false},
                    { "data": "status", "orderable": false},
                    { "data": "name", "orderable": false},
                    { "data": "email", "orderable": false},
                    { "data": "created_at", "orderable": false}
                ],
                    "order":[['0' ,'desc']]
         } );
    } );
    
      
</script>


<?= $this->include('layouts/footer')?>('layouts/footer')?>