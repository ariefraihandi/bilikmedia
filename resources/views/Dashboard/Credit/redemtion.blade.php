@extends('Dashboard.Index.appDashboard')

@section('content')           
<div class="dashboard-body__content">
    <div class="card common-card">
        <div class="card-body">                       
            <div class="row gy-4">
                <div class="col-lg-6 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Canva Pro</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(250, 'Canva Pro')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">250 Credit</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Picsart Pro</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(250, 'Picsart Pro')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">250 Credit</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 text-white fw-600">Envato Downloader</h6>
                            <form id="claim-credit-form" action="{{ route('envanto.downloader') }}" method="GET" target="_blank">                               
                                <button type="submit" class="btn btn-primary pill btn-sm mt-2">Open Bot</button>
                            </form>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">
                                Cost
                            </p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">
                                2 Credits
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 text-white fw-600">Freepik Downloader</h6>                          
                            <form id="claim-credit-form" action="{{ route('freepik.downloader') }}" method="GET" target="_blank">                               
                                <button type="submit" class="btn btn-primary pill btn-sm mt-2">Open Bot</button>
                            </form>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">
                                Cost
                            </p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">
                                2 Credits
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 text-white fw-600">Motion Array Downloader</h6>                          
                            <p class="earning-card__text font-14 text-white fw-200">Coming Soon</p>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">
                                Cost
                            </p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">
                                Coming Soon
                            </h5>
                        </div>
                    </div>
                </div>
                
            
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">100 Follower Tiktok</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(100, 'Tiktok Follower')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">100 Credit</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">100 Like Tiktok</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(100, 'Tiktok Like')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">100 Credit</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">100 Follower IG</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(100, 'Instagram Follower')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">100 Credit</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">100 Like IG</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(100, 'Instagram Like')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">100 Credit</h5>
                        </div>
                    </div>
                </div>                   
                
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">VIU PRO</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(150, 'VIU PRO')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">150 Credit</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">IQ PRO</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(150, 'IQ PRO')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">150 Credit</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">WeTV</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(150, 'WeTV PRO')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">150 Credit</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="earning-card position-relative z-index-1">
                        <img src="{{ asset('assets/images/gradients/testimonial-bg.png') }}" alt="" class="hover-bg visible opacity-100">
                        <div>
                            <h6 class="earning-card__title font-body font-16 mb-2 text-white fw-600">Bstation Pro</h6>
                            <a href="javascript:void(0);" class="btn btn-primary pill btn-sm mt-2" onclick="claimReward(150, 'Bstation PRO')">Claim</a>
                        </div>
                        <div>
                            <p class="earning-card__text font-14 mt-3 text-white fw-200">Cost</p>
                            <h5 class="earning-card__amount daily-credit-amount mb-1 text-white">150 Credit</h5>
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
    // Function to handle claim action
    function claimReward(creditRequired, rewardType) {
        const userCredit = {{ $userDetail ? $userDetail->kredit : 0 }}; // Replace with the actual user credit value from the backend
        
        if (userCredit >= creditRequired) {
            // If the user has enough credits, proceed with redemption
            Swal.fire({
                title: 'Processing',
                text: 'Please wait while we process your request...',
                icon: 'info',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Proceed with the actual request here
            // You can send an AJAX request to redeem the reward here
            // Example: window.location.href = `/redeem?reward=${rewardType}`;

        } else {
            // If the user doesn't have enough credits, show SweetAlert
            Swal.fire({
                title: 'Your Credit Did Not Enough',
                text: `You don't have enough credits to redeem for ${rewardType}. Get more credits.`,
                icon: 'warning',
                confirmButtonText: 'Get More Credit'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the credit page
                    window.location.href = '/credit';
                }
            });
        }
    }
</script>
@endpush