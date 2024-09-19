@extends('Dashboard.Index.appDashboard')

@push('header-script')    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<style>
    #product-table th, #product-table td {
        text-align: left; /* Set all text to align left */
    }
    .style-two {
        table-layout: fixed; /* Fix column widths to match thead and tbody */
        width: 100%;
    }
</style>
@endpush

@section('content')       
    <div class="welcome-balance mt-2 mb-40 flx-between gap-2">
        <div class="welcome-balance__left">
            <h4 class="welcome-balance__title mb-0">Welcome back!</h4>
        </div>     
    </div>
    <div class="dashboard-body__item-wrapper">
        <div class="dashboard-body__item">
            <div class="table-responsive">
                <table class="table style-two" id="request-table"  style="width: 100%; table-layout: fixed;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 25%;">Product_url</th>
                            <th style="width: 30%;">Email</th>
                            <th style="width: 15%;">Status</th>
                            <th style="width: 10%;">Action</th>                          
                        </tr>
                    </thead>
                </table>
            </div>
        </div>           
    </div>      

    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Full Description</h5>
                    <!-- Gaya tombol close yang benar sesuai dengan versi Bootstrap -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Deskripsi lengkap akan dimasukkan di sini melalui JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
          
@endsection
@push('footer-script')

<script type="text/javascript">
    $(document).ready(function() {
        $('#request-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("showDownloadRequestlist") }}',
                type: 'GET',
                error: function(xhr, status, error) {
                    console.log('Error in DataTables AJAX request:', error);
                    console.log(xhr.responseText); // Debug response
                }
            },
            columns: [
                { 
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    orderable: false, 
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + 1; // Numbering
                    }
                },
                { data: 'url', name: 'url' },
                { data: 'email', name: 'email' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            rowCallback: function(row, data, index) {
                if (data.product_url) {  // Check if product_url exists
                    $(row).addClass('table-success');  // Green for exists
                } else {
                    $(row).addClass('table-danger');  // Red for not exists
                }
            },
            autoWidth: false,
            language: {
                emptyTable: "No requests available"
            }
        });

        // Event listener for Notify button
        $('#request-table').on('click', '.notify-btn', function() {
            var requestId = $(this).data('id'); // Retrieve the data-id from the button

            // Send AJAX request to trigger notification
            $.ajax({
                url: '/send-download-notification',  // Ganti dengan route yang sesuai
                type: 'POST',
                data: {
                    id: requestId,
                    _token: '{{ csrf_token() }}'  // Include CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Notification email sent successfully!'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Failed to send notification email.'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Log the error for debugging
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An error occurred while sending the notification.'
                    });
                }
            });
        });
    });
</script>

@endpush

