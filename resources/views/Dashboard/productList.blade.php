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
                <table  id="product-table" class="table text-body mt--24">            
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Categories</th>
                            <th>URL Source</th>
                            <th>URL Download</th>
                            <th>Live Preview URL</th>                        
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
        $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("get.product.list.data") }}',
                type: 'GET',
                error: function(xhr, status, error) {
                    console.log('Error in DataTables AJAX request:', error);
                    console.log(xhr.responseText); // Debug response
                }
            },
            columns: [
                { 
                    data: null, 
                    orderable: false, 
                    searchable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + 1; // Numbering
                    }
                },  // Kolom nomor urut
                { 
                    data: null, 
                    name: 'product',
                    render: function(data) {
                        const image = data.image ? '/uploads/products/' + data.image : 'default-avatar.png'; // URL gambar atau default avatar
                        const title = data.title;
                        const author = data.author;

                        return `
                            <div style="display: flex; align-items: center;">
                                <img src="${image}" style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
                                <div>
                                    <div><strong>${title}</strong></div>
                                    <div style="font-size: 12px; color: gray;">${author}</div>
                                </div>
                            </div>
                        `;
                    } 
                },  // Kolom product (Image + Title + Author)
                { 
                    data: 'description', 
                    name: 'description', 
                    render: function(data) {
                        const shortDescription = data.length > 200 ? data.substring(0, 200) + '...' : data;
                        const fullDescription = data;

                        return `
                            <span>${shortDescription}</span>
                            ${data.length > 200 ? `<a href="#" class="read-more" data-description="${fullDescription}" data-toggle="modal" data-target="#descriptionModal">Read More</a>` : ''}
                        `;
                    }
                },  // Kolom description dengan read more
                { data: 'categories', name: 'categories' },  // Kolom categories
                { data: 'url_source', name: 'url_source' },  // Kolom URL Source
                { data: 'url_download', name: 'url_download' },  // Kolom URL Download
                { data: 'live_preview_url', name: 'live_preview_url' }  // Kolom Live Preview URL
            ],
            autoWidth: false,
            language: {
                emptyTable: "No products available"  // Pesan ketika tidak ada data
            }
        });

        // Event listener untuk Read More
        $(document).on('click', '.read-more', function(e) {
            e.preventDefault();
            const fullDescription = $(this).data('description');
            $('#descriptionModal .modal-body').text(fullDescription);  // Isi modal dengan deskripsi lengkap
            $('#descriptionModal').modal('show');  // Tampilkan modal
        });
    });
</script>

@endpush

