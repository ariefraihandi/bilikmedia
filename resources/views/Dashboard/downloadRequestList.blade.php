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
    .small-btn {
    padding: 1px 3px;    /* Kurangi padding */
    font-size: 12px;     /* Ukuran teks lebih kecil */
    margin: 0 2px;       /* Kurangi jarak antar tombol */
}

</style>
@endpush

@section('content')       
    <div class="welcome-balance mt-2 mb-40 flx-between gap-2">
        <div class="welcome-balance__left">
            <h4 class="welcome-balance__title mb-0">Welcome back!</h4>
        </div>     
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAdModal">
            Create New Ad
        </button>
    </div>
    <div class="dashboard-body__item-wrapper">
        <div class="dashboard-body__item">
            <div class="table-responsive">
                <table class="table style-two" id="request-table"  style="width: 100%; table-layout: fixed;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 20%;">Product</th>
                            <th style="width: 5%;"><i class="fas fa-smile"></i></th>
                            <th style="width: 30%;">Email</th>
                            <th style="width: 15%;">Status</th>
                            <th style="width: 25%;">Action</th>
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

    <div class="modal fade" id="createAdModal" tabindex="-1" aria-labelledby="createAdModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAdModalLabel">Create New Ad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ads.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <textarea class="form-control" id="code" name="code" rows="3" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Ad</button>
                        </div>
                    </form>
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
                    { 
                        data: 'url', 
                        name: 'url',
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `
                                <button class="btn btn-sm btn-primary open-url-btn" data-url="${data}" title="Open URL" target="_blank">
                                    <i class="fas fa-external-link-alt"></i>
                                </button>
                                <button class="btn btn-sm btn-secondary copy-url-btn" data-url="${data}" title="Copy URL">
                                    <i class="fas fa-copy"></i>
                                </button>`;
                        }
                    },
                    { 
                        data: 'type_icon', 
                        name: 'type_icon',
                        orderable: false, 
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<img src="${data}" alt="${row.type}" width="60" height="60" style="vertical-align: middle;">`;
                        }
                    },
                    { data: 'email', name: 'email' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                rowCallback: function(row, data, index) {
                    if (data.product_url) {  
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
                var requestId = $(this).data('id');

                // Tampilkan SweetAlert "Processing"
                Swal.fire({
                    title: 'Processing...',
                    text: 'Please wait while the notification is being sent.',
                    allowOutsideClick: false, // Mencegah pengguna menutup alert
                    didOpen: () => {
                        Swal.showLoading(); // Menampilkan spinner loading
                    }
                });
                
                $.ajax({
                    url: '/send-download-notification',
                    type: 'POST',
                    data: {
                        id: requestId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Tutup SweetAlert "Processing"
                        Swal.close();

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
                        // Tutup SweetAlert "Processing"
                        Swal.close();

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'An error occurred while sending the notification.'
                        });
                    }
                });
            });


            $('#request-table').on('click', '.invalid-notify-btn', function() {
                var requestId = $(this).data('id');

                // Tampilkan SweetAlert "Processing"
                Swal.fire({
                    title: 'Processing...',
                    text: 'Please wait while the notification is being sent.',
                    allowOutsideClick: false, // Mencegah pengguna menutup alert
                    didOpen: () => {
                        Swal.showLoading(); // Menampilkan spinner loading
                    }
                });

                $.ajax({
                    url: '/send-invalid-notification',
                    type: 'POST',
                    data: {
                        id: requestId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Tutup SweetAlert "Processing"
                        Swal.close();

                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message || 'Invalid URL notification sent successfully!'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message || 'Failed to send invalid URL notification.'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tutup SweetAlert "Processing"
                        Swal.close();

                        // Menangkap pesan error dari response JSON
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'An error occurred while sending the invalid URL notification.';

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errorMessage // Menampilkan pesan error yang diterima dari server
                        });
                    }
                });
            });


            // Event listener for Delete button
            $('#request-table').on('click', '.delete-btn', function() {
                var requestId = $(this).data('id');

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
                        // Send AJAX request to delete the record
                        $.ajax({
                            url: '/delete-download-request/' + requestId, // Ganti dengan route yang sesuai
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        'The request has been deleted.',
                                        'success'
                                    );
                                    $('#request-table').DataTable().ajax.reload();  // Reload DataTables
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'Failed to delete the request.',
                                        'error'
                                    );
                                }
                            },
                            error: function(xhr, status, error) {
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the request.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            $('#request-table').on('click', '.open-url-btn', function() {
                var url = $(this).data('url');
                window.open(url, '_blank');  // Buka URL di tab baru
            });

            // Event listener for Copy URL button
            $('#request-table').on('click', '.copy-url-btn', function() {
                var url = $(this).data('url');
                var tempInput = $("<input>");
                $("body").append(tempInput);
                tempInput.val(url).select();
                document.execCommand("copy");
                tempInput.remove();

                // Show SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'URL Copied!',
                    text: 'The URL has been copied to your clipboard.'
                });
            });
        });
    </script>
@endpush