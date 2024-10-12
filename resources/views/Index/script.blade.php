<script src="{{ asset('assets') }}/js/jquery-3.7.1.min.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> <!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> <!-- DataTables Bootstrap -->
<script src="{{ asset('assets') }}/js/boostrap.bundle.min.js"></script>
<!-- counter up -->
<script src="{{ asset('assets') }}/js/counterup.min.js"></script>
<!-- Slick js -->
<script src="{{ asset('assets') }}/js/slick.min.js"></script>
<!-- magnific popup -->
<script src="{{ asset('assets') }}/js/jquery.magnific-popup.js"></script>
<!-- apex chart -->
<script src="{{ asset('assets') }}/js/apexchart.js"></script>
<!-- marquee -->
<script src="{{ asset('assets') }}/js/marquee.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- main js -->
<script src="{{ asset('assets') }}/js/main.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if($errors->any())
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ $errors->first() }}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@stack('footer-script')

<script>
    const recentRedemptions = [
        { item_name: "Envato Downloader", user_name: "A*** L***" },
        { item_name: "Canva Pro", user_name: "B*** K***" },
        { item_name: "Picsart Pro", user_name: "C*** D***" },
        { item_name: "TikTok Follower", user_name: "D*** F***" },
        { item_name: "TikTok Like", user_name: "E*** H***" },
        { item_name: "Instagram Like", user_name: "F*** J***" },
        { item_name: "Instagram Follower", user_name: "G*** M***" },
        { item_name: "VIU PRO", user_name: "H*** N***" },
        { item_name: "IQ PRO", user_name: "I*** O***" },
        { item_name: "WeTV", user_name: "J*** P***" },
        { item_name: "Bstation PRO", user_name: "K*** Q***" },
        { item_name: "Envato Downloader", user_name: "L*** R***" },
        { item_name: "Canva Pro", user_name: "M*** S***" },
        { item_name: "Picsart Pro", user_name: "N*** T***" },
        { item_name: "TikTok Follower", user_name: "O*** U***" },
        { item_name: "TikTok Like", user_name: "P*** V***" },
        { item_name: "Instagram Like", user_name: "Q*** W***" },
        { item_name: "Instagram Follower", user_name: "R*** X***" },
        { item_name: "VIU PRO", user_name: "S*** Y***" },
        { item_name: "IQ PRO", user_name: "T*** Z***" },
        { item_name: "WeTV", user_name: "U*** A***" },
        { item_name: "Bstation PRO", user_name: "V*** B***" },
        { item_name: "Envato Downloader", user_name: "W*** C***" },
        { item_name: "Canva Pro", user_name: "X*** D***" },
        { item_name: "Picsart Pro", user_name: "Y*** E***" },
        { item_name: "TikTok Follower", user_name: "Z*** F***" },
        { item_name: "TikTok Like", user_name: "A*** G***" },
        { item_name: "Instagram Like", user_name: "B*** H***" },
        { item_name: "Instagram Follower", user_name: "C*** I***" },
        { item_name: "VIU PRO", user_name: "D*** J***" },
        { item_name: "IQ PRO", user_name: "E*** K***" },
        { item_name: "WeTV", user_name: "F*** L***" },
        { item_name: "Bstation PRO", user_name: "G*** M***" },
        { item_name: "Envato Downloader", user_name: "H*** N***" },
        { item_name: "Canva Pro", user_name: "I*** O***" },
        { item_name: "Picsart Pro", user_name: "J*** P***" },
        { item_name: "TikTok Follower", user_name: "K*** Q***" },
        { item_name: "TikTok Like", user_name: "L*** R***" },
        { item_name: "Instagram Like", user_name: "M*** S***" },
        { item_name: "Instagram Follower", user_name: "N*** T***" },
        { item_name: "VIU PRO", user_name: "O*** U***" },
        { item_name: "IQ PRO", user_name: "P*** V***" },
        { item_name: "WeTV", user_name: "Q*** W***" },
        { item_name: "Bstation PRO", user_name: "R*** X***" },
        { item_name: "Envato Downloader", user_name: "S*** Y***" },
        { item_name: "Canva Pro", user_name: "T*** Z***" },
        { item_name: "Picsart Pro", user_name: "U*** A***" },
        { item_name: "TikTok Follower", user_name: "V*** B***" },
        { item_name: "TikTok Like", user_name: "W*** C***" }
    ];
  
    function getRandomInterval() {
        return Math.floor(Math.random() * (10000 - 5000 + 1)) + 5000;
    }

    // Fungsi untuk memilih item random dari daftar
    function getRandomRedemption() {
        const randomIndex = Math.floor(Math.random() * recentRedemptions.length);
        return recentRedemptions[randomIndex];
    }

    // Fungsi untuk menampilkan toaster satu per satu dengan jeda acak
    function showRandomRedemptions() {
        for (let i = 0; i < recentRedemptions.length; i++) {
            // Set delay acak untuk setiap notifikasi
            setTimeout(() => {
                const item = getRandomRedemption();
                const message = `
                    ${item.user_name} has just redeemed ${item.item_name}.
                    <br><button id="redeem-now-${item.item_name}" class="btn btn-sm btn-success mt-2">Redeem Now</button>
                `;

                toastr.info(message, "Recent Redemption", {
                    timeOut: 5000,
                    positionClass: "toast-bottom-right",
                    closeButton: true,
                    onclick: function() {
                        window.location.href = "{{ route('credit.redemption') }}";
                    },
                    onShown: function() {
                        document.getElementById(`redeem-now-${item.item_name}`).onclick = function(event) {
                            event.stopPropagation();
                            window.location.href = "{{ route('credit.redemption') }}";
                        };
                    }
                });
            }, i * getRandomInterval()); // gunakan interval acak antar notifikasi
        }
    }

    // Panggil fungsi untuk menampilkan toaster
    showRandomRedemptions();
</script>
