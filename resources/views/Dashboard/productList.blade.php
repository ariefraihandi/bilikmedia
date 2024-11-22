@extends('Dashboard.Index.appDashboard')

@push('header-script')    
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
                <table id="product-table"  class="table text-body mt--24" style="width:100%">   
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>                            
                            <th>Detail</th>
                            <th>Download</th>                                                   
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
                        const categories = data.categories; // Penulis
                        const description = data.description; // Deskripsi produk
                        const fullDescription = description; // Deskripsi lengkap untuk modal

                        return `
                            <div style="display: flex; align-items: flex-start;">
                                <img src="${image}" style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
                                <div>
                                    <div><strong>${title}</strong></div>
                                    <div style="font-size: 12px; color: gray;">${categories}</div>                                    
                                    <div>
                                        ${description.length > 10 
                                            ? `<a href="#" class="read-more" data-description="${fullDescription}" data-toggle="modal" data-target="#descriptionModal">Deskripsi</a>`
                                            : description}
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                },            
                { data: 'detail', name: 'detail' },  // Kolom URL Source
                { data: 'download_count', name: 'download_count', orderable: true, searchable: false }
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

