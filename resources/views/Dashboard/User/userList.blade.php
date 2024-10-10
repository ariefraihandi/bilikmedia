@extends('Dashboard.Index.appDashboard')
@push('header-script')  
<style>
    /* Atur padding agar lebih rapi */
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
        padding: 15px;
    }

    /* Atur lebar kolom */
    .table td {
        word-wrap: break-word;
    }

    /* Gunakan Flexbox untuk memisahkan info dan pagination */
    .dataTables_wrapper .dataTables_info {
        float: left;
        padding-top: 0.85em;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: right;
        margin-top: 15px;
    }

    /* Float right untuk kolom search */
    .dataTables_wrapper .dataTables_filter {
        float: right;
        margin-bottom: 10px;
    }

    /* Gunakan Flexbox untuk pengaturan posisi */
    .dataTables_wrapper .row {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Atur background dan warna */
    .badge {
        font-size: 14px;
    }

</style>
@endpush
@section('content')           
<div class="dashboard-body__content">
    <div class="card common-card">
        <div class="card-body">
                        <!-- ========================= Earning Section Start ============================= -->
            <div class="row gy-4">
                <div class="col-lg-4 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Daily</h6>                           
                        </div>
                        <div>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 mt-3 pt-3 border-top text-white">
                                {{ $usersToday }} User
                            </h5>                           
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Weekly</h6>
                        </div>
                        <div>
                            <h5 class="earning-card__amount sharing-credit-amount mb-1 mt-3 pt-3 border-top text-white">
                                {{ $usersThisWeek }} User
                            </h5>                           
                        </div>
                    </div>
                </div>           
                     
                <div class="col-lg-4 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets') }}/images/gradients/testimonial-bg.png" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Monthly</h6>                          
                        </div>
                        <div>
                            <h5 class="earning-card__amount ads-credit-amount mb-1 mt-3 pt-3 border-top text-white">
                                {{ $usersThisMonth}} User
                            </h5>                           
                        </div>
                    </div>
                </div>                

                <div class="col-lg-12">
                    <div class="card common-card border shadow-none border-gray-five">
                        <div class="card-body">
                            <div class="table-responsive">
                                    <h5>User List with DataTables</h5>
                                    <table id="user-table" class="table text-body mt--24" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Status</th>
                                                <th>Credit</th>
                                                <th>Download</th>
                                                <th>Since</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>                             
                                {{-- <div class="flx-between gap-2">
                                    <div class="paginate-content flx-align flex-nowrap gap-3">
                                        <span class="paginate-content__text fs-14">
                                            Showing {{ $credits->firstItem() }} - {{ $credits->lastItem() }} of {{ $credits->total() }}
                                        </span>
                                    </div>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination common-pagination mt-0">
                                            <li class="page-item {{ $credits->onFirstPage() ? 'disabled' : '' }}">                                                
                                                <a class="page-link flx-align gap-2 flex-nowrap" href="{{ $credits->previousPageUrl() }}">
                                                    <span class="icon line-height-1 font-20"><i class="las la-arrow-left"></i></span>
                                                </a>
                                            </li>
                                            @for ($i = 1; $i <= $credits->lastPage(); $i++)
                                                <li class="page-item {{ $i == $credits->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ $credits->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item {{ $credits->hasMorePages() ? '' : 'disabled' }}">
                                                <a class="page-link flx-align gap-2 flex-nowrap" href="{{ $credits->nextPageUrl() }}">
                                                    Next
                                                    <span class="icon line-height-1 font-20"><i class="las la-arrow-right"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>      
@endsection
@push('footer-script')  
<script type="text/javascript">
    $(document).ready(function() {
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('user.list.datatables') }}',
            columns: [
                { data: 'user', name: 'user', className: "text-left" }, // User gabungan name, phone, email
                { data: 'status', name: 'status', orderable: false, searchable: false, className: "text-center" },
                { data: 'kredit', name: 'kredit', className: "text-center" },
                { data: 'download_count', name: 'download_count', className: "text-center" },
                { data: 'since', name: 'since', className: "text-center" },
                { 
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false, 
                    className: "text-center",
                    render: function(data, type, row) {
                        // Jika status user Incomplete, tampilkan tombol notifikasi
                        if (row.status.includes('Incomplete')) {
                            return '<button class="btn btn-warning notify-incomplete" data-id="' + row.id + '"><i class="fas fa-bell"></i></button>';
                        }
                        return '';
                    }
                }
            ],
            autoWidth: false, // Nonaktifkan auto width agar kolom lebar dinamis
            responsive: true, // Agar tabel tetap responsive
        });

        // Event handler untuk tombol notifikasi
        $('#user-table').on('click', '.notify-incomplete', function() {
            var userId = $(this).data('id');
            
            Swal.fire({
                title: 'Processing...',
                text: 'Please wait while the notification is being sent.',
                allowOutsideClick: false, // Mencegah pengguna menutup alert
                didOpen: () => {
                    Swal.showLoading(); // Menampilkan spinner loading
                }
            });

            // Akses route untuk notifikasi
            $.ajax({
                url: '{{ route("notify.incomplete") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Pastikan CSRF token digunakan untuk keamanan
                    user_id: userId
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message, // Menampilkan pesan sukses dari server
                        icon: 'success',
                        timer: 2000
                    });
                },
                error: function(xhr) {
                    // Ambil pesan error dari response
                    var errorMessage = xhr.responseJSON.error || 'An error occurred';

                    Swal.fire({
                        title: 'Error!',
                        text: errorMessage, // Menampilkan pesan error dari response server
                        icon: 'error',
                        timer: 4000
                    });
                }
            });
        });
    });
</script>


@endpush