@extends('Dashboard.Index.appDashboard')

@section('content')           
<div class="dashboard-body__content">
    <div class="card common-card">
        <div class="card-body">
                        <!-- ========================= Earning Section Start ============================= -->
            <div class="row gy-4">                                   
                <div class="col-lg-12">
                    <div class="card common-card border shadow-none border-gray-five">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-body mt--24">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Credit Used</th>
                                            <th>Claim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($referredUsers->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">You don't have any referrals yet</td>
                                            </tr>
                                        @else
                                            @foreach($referredUsers as $index => $reff)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>                                               
                                                <td>{{ $reff->username }}</td>  
                                                <!-- Status -->
                                                <td>
                                                    @if ($reff->status == 0)
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @elseif (!$reff->userDetail)
                                                        <span class="badge bg-warning">Incomplete</span>
                                                    @else
                                                        <span class="badge bg-success">Active</span>
                                                    @endif
                                                </td>
                                    
                                                <!-- Credit Used -->
                                                <td>
                                                    @php
                                                        // Hitung jumlah data yang memiliki credit_amount = 0
                                                        $creditUsed = \App\Models\Credit::where('user_id', $reff->id)
                                                            ->where('credit_amount', 0)
                                                            ->count();
                                                    @endphp
                                                    
                                                    @if($creditUsed == 0)
                                                        <span class="badge bg-danger">No Credit Used</span>
                                                    @else
                                                        <span class="badge bg-success">{{ $creditUsed }} Credit Used</span>
                                                    @endif
                                                </td>
                                    
                                                <!-- Claim Button -->
                                                <td>
                                                    @if($reff->userDetail && $reff->userDetail->is_claimed == 1)
                                                        <!-- Jika userDetail->is_claimed = 1, tampilkan "Claimed" -->
                                                        <span class="badge bg-success">Claimed</span>
                                                    @else
                                                        <!-- Jika syarat kredit terpenuhi (>= 10), tampilkan tombol Claim -->
                                                        @if($creditUsed >= 10)
                                                        <button class="btn btn-primary" onclick="confirmClaim('{{ $reff->id }}')">Claim</button>
                                                        @else                                                            
                                                            <button class="btn btn-primary" disabled>{{ $creditUsed }}/10</button>
                                                        @endif
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    
                                </table>             
                                @if(!$referredUsers->isEmpty())                   
                                    <div class="flx-between gap-2">
                                        <div class="paginate-content flx-align flex-nowrap gap-3">
                                            <span class="paginate-content__text fs-14">
                                                Showing {{ $referredUsers->firstItem() }} - {{ $referredUsers->lastItem() }} of {{ $referredUsers->total() }}
                                            </span>
                                        </div>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination common-pagination mt-0">
                                                <li class="page-item {{ $referredUsers->onFirstPage() ? 'disabled' : '' }}">
                                                    <a class="page-link flx-align gap-2 flex-nowrap" href="{{ $referredUsers->previousPageUrl() }}">
                                                        <span class="icon line-height-1 font-20"><i class="las la-arrow-left"></i></span>
                                                    </a>
                                                </li>
                                                @for ($i = 1; $i <= $referredUsers->lastPage(); $i++)
                                                    <li class="page-item {{ $i == $referredUsers->currentPage() ? 'active' : '' }}">
                                                        <a class="page-link" href="{{ $referredUsers->url($i) }}">{{ $i }}</a>
                                                    </li>
                                                @endfor
                                                <li class="page-item {{ $referredUsers->hasMorePages() ? '' : 'disabled' }}">
                                                    <a class="page-link flx-align gap-2 flex-nowrap" href="{{ $referredUsers->nextPageUrl() }}">
                                                        Next
                                                        <span class="icon line-height-1 font-20"><i class="las la-arrow-right"></i></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                @endif
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
<script>
    function confirmClaim(userId) {
        // Tampilkan SweetAlert untuk konfirmasi
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to claim the reward for this referral.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, claim it!',
            cancelButtonText: 'No, cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan pesan "Processing" setelah konfirmasi
                Swal.fire({
                    title: 'Processing',
                    text: 'Please wait while we process your claim...',
                    icon: 'info',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });

                // Kirim AJAX request ke route 'claimRefferal'
                fetch('{{ route('claimRefferal') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan CSRF token disertakan
                    },
                    body: JSON.stringify({
                        user_id: userId // Kirim ID user yang diklik
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Jika klaim sukses
                    if (data.success) {
                        Swal.fire({
                            title: 'Claimed!',
                            text: 'Your referral claim has been successfully processed.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload halaman setelah user menekan OK di SweetAlert
                                location.reload();
                            }
                        });
                    } else {
                        // Jika klaim gagal, tampilkan pesan dari server di SweetAlert
                        Swal.fire(
                            'Error!',
                            data.message, // Pesan error dari server
                            'error'
                        );
                    }
                })
                .catch((error) => {
                    // Jika ada masalah lain dalam permintaan
                    Swal.fire(
                        'Error!',
                        'There was a problem with the request. Please try again later.',
                        'error'
                    );
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Your referral claim was cancelled.',
                    'error'
                );
            }
        });
    }
</script>
@endpush