@extends('Dashboard.Index.appDashboard')

@section('content')           
<div class="dashboard-body__content">
    <div class="card common-card">
        <div class="card-body">
                        <!-- ========================= Earning Section Start ============================= -->
            <div class="row gy-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Daily Credit</h6>
                            <form id="claim-credit-form" action="{{ route('claim.daily.credit') }}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-primary pill btn-sm mt-2" onclick="confirmClaim()">Claim Daily Credit</button>
                            </form>
                        </div>
                        <div>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 mt-3 pt-3 border-top text-white">
                                {{ $dailyCredits->sum('credit_amount') }} Credits
                            </h5>
                            <p class="earning-card__text font-14 text-white fw-200">
                                Expires at 11:59 PM GMT +7
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Credits by Sharing</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="showShareOptions()">Get More Credits</a>
                        </div>
                        <div>
                            <h5 class="earning-card__amount sharing-credit-amount mb-1 mt-3 pt-3 border-top text-white">
                                {{ $shareCredits->sum('credit_amount') }} Credits
                            </h5>
                            <p class="earning-card__text font-14 text-white fw-200">
                                Share this website and earn credits for free!
                            </p>
                        </div>
                    </div>
                </div>           
                     
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets') }}/images/gradients/testimonial-bg.png" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Ads Credit</h6>
                            <button class="btn btn-primary pill btn-sm mt-2" onclick="startAdWatching()">Get More Credit</button>
                        </div>
                        <div>
                            <h5 class="earning-card__amount ads-credit-amount mb-1 mt-3 pt-3 border-top text-white">
                                {{ $adCredits->sum('credit_amount') }} Credits                                
                            </h5>
                            <p class="earning-card__text font-14 text-white fw-200">
                                This is your total ad-watching credit balance
                            </p>
                        </div>
                    </div>
                </div>
                                    
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets') }}/images/gradients/testimonial-bg.png" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Referral Credit</h6>
                
                            @if(!$isReferred)                              
                                <!-- Tombol Generate dengan ID -->
                                <button id="generate-btn" class="btn btn-primary pill btn-sm mt-2" onclick="generateReffCode()">Generate</button>
                
                                <!-- Tombol Share, disembunyikan dulu -->
                                <button id="share-btn" class="btn btn-primary pill btn-sm mt-2" style="display: none;" onclick="shareReffCode()">Share</button>
                            @else
                                <!-- Jika user sudah memiliki refferal, tampilkan tombol Share -->
                                <button id="share-btn" class="btn btn-primary pill btn-sm mt-2" onclick="shareReffCode()">Share</button>
                            @endif
                        </div>
                        <div>
                          
                            <h5 class="earning-card__amount mb-1 mt-3 pt-3 border-top text-white">{{ $totalReffCredits}} Credits</h5>
                            <p class="earning-card__text font-14 text-white fw-200">Share the Happiness, and Get Even More</p>
                        </div>
                    </div>
                </div>
                
                     

                <div class="col-lg-12">
                    <div class="card common-card border shadow-none border-gray-five">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-body mt--24">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Credit Amount</th>
                                            <th>Credit Type</th>
                                            <th>Expires At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($credits as $index => $credit)
                                        <tr>
                                            <td>{{ $index + 1 }}</td> <!-- Nomor urut -->
                                            <td>{{ $credit->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                @if ($credit->credit_amount == 0)
                                                    expired / used
                                                @elseif (empty($credit->credit_amount))
                                                    +
                                                @elseif ($credit->credit_amount > 0)
                                                    +{{ $credit->credit_amount }}
                                                @else
                                                    {{ $credit->credit_amount }}
                                                @endif
                                            </td>
                                             
                                            <td>
                                                @if ($credit->credit_type === 'share')
                                                    Get credit from sharing the URL
                                                @elseif ($credit->credit_type === 'daily')
                                                    Free credit for daily
                                                @elseif ($credit->credit_type === 'ad')
                                                    Watching ad credit
                                                @else
                                                    {{ ucfirst($credit->credit_type) }}
                                                @endif
                                            </td>
                                            
                                            <td>
                                                {{ $credit->expires_at ? $credit->expires_at->format('d-m-Y H:i') : 'No' }}
                                            </td> <!-- Tanggal kedaluwarsa atau 'No' jika tidak ada -->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flx-between gap-2">
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
                                </div>
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
    function confirmClaim() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You can only claim your daily credit once per day!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, claim it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show a loading alert while processing the request
                Swal.fire({
                    title: 'Processing...',
                    text: 'We are validating your request. Please wait.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Submit the form using AJAX
                $.ajax({
                    url: $('#claim-credit-form').attr('action'),
                    method: 'POST',
                    data: $('#claim-credit-form').serialize(),
                    success: function(response) {
                        // Close the loading alert
                        Swal.close();

                        // Show success alert
                        Swal.fire({
                            title: 'Success!',
                            text: response.success,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Update the daily credit amount without reloading the page
                        $('.daily-credit-amount').text(response.totalDailyCredits + ' Credits');

                        // Update the user's overall credit balance in the language-select area
                        $('.user-credit').text('Credit: ' + response.totalCredits);

                        // Optionally, add a visual effect to highlight the update
                        $('.daily-credit-amount, .user-credit').fadeOut(200).fadeIn(200);
                    },
                    error: function(xhr) {
                        // Close the loading alert
                        Swal.close();

                        // Get the error message from the server response
                        let errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'There was a problem claiming your daily credit. Please try again later.';

                        // Show error alert with the specific error message
                        Swal.fire({
                            title: 'Error!',
                            text: errorMessage,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    }
</script>

<script>
    function showShareOptions() {
        Swal.fire({
            title: 'Share and Earn Credits!',
            html: `
                <div class="share-buttons">
                    <button class="btn btn-primary" onclick="shareToFacebook()"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M8.65 16v-7.32h2.458l.37-2.91H8.65V4.98c0-.84.23-1.41 1.42-1.41h1.52V1.33A19.15 19.15 0 0 0 9.56 1c-2.02 0-3.39 1.23-3.39 3.48v1.94H4v2.91h2.17V16h2.48z"/>
                        </svg> Facebook
                    </button>
                    <button class="btn btn-info" onclick="shareToTwitter()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.009-.42A6.676 6.676 0 0 0 16 3.542a6.657 6.657 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.084.797 3.286 3.286 0 0 0-5.584 2.994A9.325 9.325 0 0 1 1.11 2.1a3.289 3.289 0 0 0 1.015 4.381A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.634 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.615-.059 3.283 3.283 0 0 0 3.066 2.277 6.588 6.588 0 0 1-4.862 1.37A9.344 9.344 0 0 0 5.026 15z"/>
                        </svg> Twitter
                    </button>
                    <button class="btn btn-success" onclick="shareToWhatsApp()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.378A7.936 7.936 0 0 0 8 0C3.582 0 0 3.582 0 8c0 1.409.372 2.724 1.011 3.876L.055 16l4.193-1.046A7.949 7.949 0 0 0 8 16c4.418 0 8-3.582 8-8 0-1.766-.571-3.416-1.536-4.754zM8 14.5c-1.324 0-2.566-.361-3.644-1.044l-.26-.158-2.782.695.74-2.225-.171-.285A6.54 6.54 0 0 1 1.5 8c0-3.589 2.91-6.5 6.5-6.5 1.647 0 3.2.64 4.378 1.8A6.505 6.505 0 0 1 14.5 8c0 3.59-2.91 6.5-6.5 6.5z"/>
                        </svg> WhatsApp
                    </button>
                </div>
            `,
            showCancelButton: true,
            showConfirmButton: false,
            cancelButtonText: 'Close',
        });
    }

    function shareToFacebook() {
        showProcessingAlert();
        const url = encodeURIComponent('https://bilikmedia.com/envato-downloader');
        const text = encodeURIComponent('Discover an amazing tool for your creative needs! Use the Envato Downloader from Bilik Media for unlimited and premium downloads—all for free.\n\nCheck it out here: ');
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}${url}%0A%0A#bilikmedia #envato #downloader`, '_blank');
        claimSharingCredit();
    }

    function shareToTwitter() {
        showProcessingAlert();
        const url = encodeURIComponent('https://bilikmedia.com/envato-downloader');
        const text = encodeURIComponent('Discover an amazing tool for your creative needs! Use the Envato Downloader from Bilik Media for unlimited and premium downloads—all for free.\n\n#bilikmedia #envato #downloader @bilikmedia_\n\nCheck it out here: ');
        window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}%0A%0A`, '_blank');
        claimSharingCredit();
    }

    function shareToWhatsApp() {
        showProcessingAlert();
        const url = encodeURIComponent('https://bilikmedia.com/envato-downloader');
        const text = encodeURIComponent('Discover an amazing tool for your creative needs! Use the Envato Downloader from Bilik Media for unlimited and premium downloads—all for free.\n\nCheck it out here: ');
        window.open(`https://wa.me/?text=${text}${url}%0A%0A#bilikmedia #envato #downloader`, '_blank');
        claimSharingCredit();
    }

    function showProcessingAlert() {
        Swal.fire({
            title: 'We are validating your sharing...',
            text: 'Please wait while we check if you have successfully shared the content.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    }

    function claimSharingCredit() {
        $.ajax({
            url: '{{ route("claimSharingCredit") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                credit_type: 'share'
            },
            success: function(response) {
                Swal.close();
                Swal.fire({
                    title: 'Success!',
                    text: 'You have successfully claimed your sharing credit!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                // Update the sharing credit amount on the page without reloading
                $('.sharing-credit-amount').text(response.totalShareCredits + ' Credits');

                // Update the user's overall credit balance in the language-select area
                $('.user-credit').text('Credit: ' + response.totalCredits);
            },
            error: function(xhr) {
                Swal.close();
                let errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'There was a problem claiming your sharing credit. Please try again later.';
                Swal.fire({
                    title: 'Error!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    }
</script>

<script>
    function startAdWatching() {
        // Tampilkan SweetAlert untuk memulai menonton iklan
        Swal.fire({
            title: 'Watch Ads to Earn Credits!',
            text: 'You will need to watch the ad completely to receive your code for redemption.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Start',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Generate the tokens and redemption code
                const redeemCode = generateRandomCode(5); // Generate a 5-character redemption code
                const tokens = generateTokens(5); // Generate 5 tokens

                // Kirim token dan kode redeem ke server
                $.ajax({
                    url: '{{ route("storeAdTokens") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        redeem_code: redeemCode,
                        tokens: tokens
                    },
                    success: function(response) {
                        // Jika token_1 berhasil diterima, buka halaman iklan
                        const token = response.token_1;
                        const adUrl = `{{ route('blog.adsOne', ['token' => ':token']) }}`.replace(':token', token);
                        window.open(adUrl, '_blank');

                        // Tampilkan form redeem setelah 5 detik
                        setTimeout(showRedemptionForm, 5000);
                    },
                    error: function(xhr) {
                        // Periksa apakah status error adalah 429 (Too Many Requests)
                        if (xhr.status === 429) {
                            const response = JSON.parse(xhr.responseText);
                            Swal.fire({
                                title: 'Attention!',
                                text: response.message, // Tampilkan pesan "Please wait X minutes"
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'There was an error generating tokens or redemption code. Please try again later.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            }
        });
    }

    function showRedemptionForm() {
        Swal.fire({
            title: 'Redeem Your Code',
            html: `
                <p>Enter the code you received after watching the ad to claim your credits.</p>
                <input type="text" id="redeemCode" class="swal2-input" placeholder="Enter your code">
            `,
            showCancelButton: true,
            confirmButtonText: 'Redeem',
            preConfirm: () => {
                const code = Swal.getPopup().querySelector('#redeemCode').value;
                if (!code) {
                    Swal.showValidationMessage('Please enter your code');
                }
                return code;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                redeemCode(result.value); // Panggil fungsi untuk redeem kode
            }
        });
    }

    function redeemCode(code) {
        $.ajax({
            url: '{{ route("redeemAdCode") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                code: code
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Your credits have been added successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });

                // Update jumlah kredit iklan tanpa me-reload halaman
                $('.ads-credit-amount').text(response.totalAdsCredits + ' Credits');
                $('.user-credit').text('Credit: ' + response.totalCredits);
            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Invalid code or there was an issue processing your request.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    }

    // Fungsi untuk generate kode acak
    function generateRandomCode(length) {
        return Math.random().toString(36).substring(2, 2 + length).toUpperCase(); // Generates a code like 'ABCD1'
    }

    // Fungsi untuk generate 5 token acak
    function generateTokens(numTokens) {
        const tokens = [];
        for (let i = 0; i < numTokens; i++) {
            tokens.push(generateRandomCode(10)); // Generate a 10-character token
        }
        return tokens;
    }
</script>

<script>
    function generateReffCode() {
        // Tampilkan SweetAlert untuk instruksi
        Swal.fire({
            title: 'Generate Refferal Link?',
            text: "You will earn 5 credits after your referral uses 10 credits.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, generate it!',
            cancelButtonText: 'No, cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan SweetAlert untuk proses sedang berjalan
                Swal.fire({
                    title: 'Processing...',
                    text: 'Please wait while we generate your referral link.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading() // Menampilkan loading saat proses berjalan
                    }
                });

                // Kirim POST request jika user setuju
                fetch('{{ route('generate-reff') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Ambil CSRF token
                    },
                    body: JSON.stringify({
                        user_id: '{{ Auth::user()->id }}' // Kirim user_id
                    })
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then(data => {
                    if (data.success) {
                        Swal.fire(
                            'Generated!',
                            'Your referral link has been generated: ' + data.refferal_code,
                            'success'
                        );

                        // Hapus tombol Generate dan tampilkan tombol Share tanpa reload
                        document.getElementById('generate-btn').style.display = 'none';
                        document.getElementById('share-btn').style.display = 'block';
                    } else {
                        Swal.fire(
                            'Error!',
                            data.message || 'There was a problem generating your referral link.',
                            'error'
                        );
                    }
                }).catch((error) => {
                    console.error('There was a problem with the fetch operation:', error);
                    Swal.fire(
                        'Error!',
                        'There was a problem processing your request.',
                        'error'
                    );
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Referral generation was cancelled.',
                    'error'
                );
            }
        });
    }
</script>

<script>
    function shareReffCode() {
        // Tampilkan SweetAlert untuk berbagi
        Swal.fire({
            title: 'Share Your Referral Link',
            html: `
                <div style="display: flex; justify-content: space-around; margin-bottom: 15px;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/auth/register?reff=' . $reffCode) }}" target="_blank">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=Get+FREE+access+to+Canva+Pro,+Envato+Elements,+Freepik,+Motion+Array,+and+more!+Unlock+your+creativity+with+this+exclusive+referral+link:+{{ url('/auth/register?reff=' . $reffCode) }}" target="_blank">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url('/auth/register?reff=' . $reffCode) }}" target="_blank">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                </div>
                <button id="copy-link" class="btn btn-primary">
                    <i class="fas fa-copy"></i> Copy Link
                </button>
            `,
            showCloseButton: true,
            showConfirmButton: false,
        });

        // Fungsi untuk menyalin link ke clipboard
        document.addEventListener('click', function(event) {
            if (event.target && event.target.id === 'copy-link') {
                var referralLink = '{{ url('/auth/register?reff=' . $reffCode) }}';
                navigator.clipboard.writeText(referralLink).then(function() {
                    Swal.fire('Copied!', 'Your referral link has been copied to clipboard.', 'success');
                }, function(err) {
                    Swal.fire('Error', 'Failed to copy the link.', 'error');
                });
            }
        });
    }
</script>

@endpush