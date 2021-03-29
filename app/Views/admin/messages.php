
    <?= $this->include('layouts/header')?>


<div class='container'>
        
    <div class='row mt-4'>
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
                ],
                    "order":[['0' ,'desc']]
         } );
    } )
      
</script>


<?= $this->include('layouts/footer')?>('layouts/footer')?>
