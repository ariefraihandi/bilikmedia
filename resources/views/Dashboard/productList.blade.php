@extends('Dashboard.Index.appDashboard')

@push('header-script')    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<style>
    #product-table th, #product-table td {
        text-align: left;
    }
    .style-two {
        table-layout: fixed;
        width: 100%;
    }
    #product-table td:nth-child(2) {
        max-width: 300px;
        word-wrap: break-word;
        white-space: normal;
    }
    .bg-warning {
        background-color: yellow !important;
    }
    div.dataTables_filter {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px; /* Jarak antara elemen */
    }

    div.dataTables_filter label {
        margin-bottom: 0; /* Hilangkan margin bawah default label */
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
            <!-- Filter berdasarkan kategori -->
            
    
            <div class="table-responsive">
                <table id="product-table" class="table text-body mt--24" style="width:100%">  
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>                            
                            <th>Detail</th>
                            <th>Download</th>                                                   
                            <th>Action</th>                                                   
                        </tr>
                    </thead>
                </table>
            </div>
        </div>           
    </div>      
@endsection

@push('footer-script')

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
$('#product-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route("get.product.list.data") }}',
        type: 'GET',
        data: function (d) {
            // Kirimkan parameter kategori yang dipilih
            d.category_id = $('#category-filter').val();
        }
    },
    dom: '<"row"<"col-sm-5"l><"col-sm-7"f>>rt<"row"<"col-sm-6"i><"col-sm-6"p>>',
    initComplete: function () {
        // Tambahkan dropdown filter kategori sebelum elemen pencarian default
        const categoryFilter = `
            <label for="category-filter" style="margin-right: 10px;">Filter by Category:</label>
            <select id="category-filter" class="form-control form-control-sm" style="width: 200px; display: inline-block; margin-right: 10px;">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        `;

        // Sisipkan dropdown filter kategori sebelum elemen pencarian
        $("div.dataTables_filter").prepend(categoryFilter);

        // Event listener untuk dropdown kategori
        $('#category-filter').on('change', function () {
            $('#product-table').DataTable().ajax.reload(); // Reload DataTable dengan filter kategori
        });
    },
    columns: [
        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                return meta.row + 1; // Penomoran otomatis
            }
        },
        {
            data: 'product_title',
            name: 'product_title',
            orderable: false,
            searchable: true, // Kolom ini dapat dicari
            render: function (data, type, row) {
                const image = row.image ? '/uploads/products/' + row.image : 'default-avatar.png';
                const categories = row.categories;

                return `
                    <div style="display: flex; align-items: flex-start; max-width: 300px;">
                        <img src="${image}" style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
                        <div>
                            <strong>${data}</strong>
                            <div style="font-size: 12px; color: gray;">${categories}</div>
                        </div>
                    </div>
                `;
            }
        },
        {
            data: 'detail',
            name: 'detail',
            orderable: false,
        },
        {
            data: 'download_count',
            name: 'download_count',
            orderable: true,
            searchable: false
        },
        {
            data: 'edit_delete',
            name: 'edit_delete',
            orderable: false,
            searchable: false
        }
    ],
    order: [[0, 'desc']],
    language: {
        emptyTable: "No products available"
    },
    drawCallback: function (settings) {
        // Buat objek untuk memeriksa URL Source yang duplikat
        const urlMap = {};

        // Iterasi setiap baris
        $('#product-table tbody tr').each(function () {
            const row = $(this);
            const rowData = $('#product-table').DataTable().row(row).data();

            if (rowData && rowData.url_source) {
                const urlSource = rowData.url_source;

                // Periksa jika URL Source sudah ada di urlMap
                if (urlMap[urlSource]) {
                    // Jika URL Source duplikat, tambahkan warna kuning ke baris saat ini dan baris sebelumnya
                    row.addClass('bg-warning'); // Tambahkan warna kuning ke baris
                    urlMap[urlSource].addClass('bg-warning'); // Tambahkan warna kuning ke baris sebelumnya
                } else {
                    // Simpan baris di urlMap
                    urlMap[urlSource] = row;
                }
            }
        });
    }

});


$(document).on('click', '.delete-button', function () {
    const productId = $(this).data('id'); // Ambil ID dari atribut data-id tombol

    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Kirim permintaan AJAX DELETE
            $.ajax({
                url: `/delete/product/${productId}`,
                type: 'GET',
                success: function (response) {
                    // Tampilkan pesan sukses
                    Swal.fire(
                        'Deleted!',
                        response.message,
                        'success'
                    ).then(() => {
                        // Refresh DataTable atau halaman
                        $('#product-table').DataTable().ajax.reload();
                    });
                },
                error: function (xhr) {
                    // Tampilkan pesan error jika gagal
                    Swal.fire(
                        'Error!',
                        xhr.responseJSON.message || 'Something went wrong!',
                        'error'
                    );
                }
            });
        }
    });
});


</script>
@endpush
