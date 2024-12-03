@extends('Index.app')
@push('header-script')  
    <style>
        .floating-countdown {
            position: fixed;
            top: 50%;
            right: 10px; /* Pindahkan ke kanan */
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            font-size: 18px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            z-index: 9999;
            text-align: center;
        }

        .countdown-text {
            color: white;
            font-size: 16px;
            font-weight: bold;
        }

        .timer {
            font-size: 24px;
            font-weight: bold;
        }


    </style>
@endpush

@section('content')
    <section class="blog-details padding-y-120 position-relative overflow-hidden">
        <div class="container container-two">
            <div class="d-flex justify-content-center">
                <!-- Promo Christmas -->
                <h2 class="text-center mb-4 text-capitalize">
                    🎄 Christmas Promo: 100++ Premium WordPress Themes for Just $19! Only for the First 100 Buyers! 🎄
                </h2>
            </div>

            <!-- Promo Description -->
            <p class="blog-details-top__desc mb-5">
                {{-- The new year is approaching, and we want to celebrate with an exclusive Christmas offer! Get access to 
                <strong>100++ premium WordPress themes</strong> for just <strong>$19</strong>! Normally, these themes are priced between <strong>$15-$20 each</strong>. But for the <strong>first 100 buyers</strong>, you can get the entire bundle at an unbelievably low price! --}}
                <br>
                🎅 <strong>Don’t miss this rare opportunity—find the perfect theme for your WordPress site now!</strong>
            </p>

            <h5 class="blog-details-content__title mb-3">What’s Included in This Special Christmas Bundle?</h5>
            <ul class="product-list mb-40">
                <li class="product-list__item font-18 fw-500 text-heading">
                    <strong>Over 100 Premium Themes</strong><br>
                    This bundle includes more than <strong>100 premium WordPress themes</strong> tailored for various types of websites, from personal blogs to business sites and online stores. With just one click, you’ll have all the themes you need.
                </li>
                <li class="product-list__item font-18 fw-500 text-heading">
                    <strong>Super Affordable Price—Only $19!</strong><br>
                    Typically, our premium themes are priced between <strong>$15-$20 per theme</strong>. However, for the <strong>first 100 buyers</strong>, the entire bundle is just <strong>$19</strong>! This is an incredible discount for anyone looking to start or refresh their WordPress site with top-quality themes.
                </li>
                <li class="product-list__item font-18 fw-500 text-heading">
                    <strong>Responsive and Modern Design</strong><br>
                    All our themes are designed to ensure your website looks stunning on any device—desktop, tablet, or mobile. With a responsive design, you’ll never have to worry about poor user experiences on smaller screens.
                </li>
                <li class="product-list__item font-18 fw-500 text-heading">
                    <strong>SEO Optimization and Lightning-Fast Performance</strong><br>
                    Each theme is built with SEO best practices in mind, helping your website rank higher in search engine results. Additionally, the themes are optimized for speed, ensuring fast loading times and an excellent user experience.
                </li>
                <li class="product-list__item font-18 fw-500 text-heading">
                    <strong>Easy Installation and Customization</strong><br>
                    The themes come with easy-to-follow documentation, so you can install them on WordPress and start customizing immediately. No coding skills are required—everything is designed to be beginner-friendly.
                </li>
                <li class="product-list__item font-18 fw-500 text-heading">
                    <strong>Lifetime Access and Free Updates</strong><br>
                    Once you purchase, you’ll have lifetime access to the <strong>100++ themes</strong>, including free updates. No need to worry about additional costs—we’ll keep your themes updated and relevant for years to come.
                </li>
            </ul>

            <!-- How to Purchase Section -->
            <h5 class="blog-details-content__title mb-3">How to Purchase and Download the Themes</h5>
            <ol class="product-list mb-40">
                <li class="product-list__item font-18 fw-500 text-heading">Click the <strong>purchase link</strong> below to be redirected to our secure payment page.</li>
                <li class="product-list__item font-18 fw-500 text-heading">Complete your payment securely with various payment options. Once your payment is confirmed, you will receive a <strong>download link</strong> for the entire theme bundle.</li>
                <li class="product-list__item font-18 fw-500 text-heading">Download the zip file containing all the themes, install them on your WordPress site, and start customizing to your heart’s content.</li>
            </ol>
            <div class="d-flex justify-content-center mb-4">
                <a href="https://bilikshopping.gumroad.com/l/premium-wordpress-themes" class="btn btn-primary align-center">
                    [Click here to purchase and download the themes now!]
                </a>
            </div>

            <!-- Promo Urgency Section -->
            <h5 class="blog-details-content__title mb-3">🎁 Christmas Promo: Only for the First 100 Buyers!</h5>
            <p class="blog-details-content__desc mb-32">
                This <strong>special Christmas offer</strong> is limited to the <strong>first 100 buyers only</strong>. After that, the price will return to normal, so make sure you don’t miss out on this rare deal! 
                <br>
                Get <strong>100++ premium WordPress themes</strong> for just <strong>$19</strong> before <strong>the offer expires</strong>. It’s the perfect way to start the new year with a better, faster, and more attractive website!
            </p>
            <p class="blog-details-content__desc mb-32">
                🎅 <strong>Don’t wait!</strong> Take advantage of this opportunity now and secure your spot as one of the <strong>first 100 buyers</strong>!
            </p>
            <div class="d-flex justify-content-center mb-4">
                <a href="https://bilikshopping.gumroad.com/l/premium-wordpress-themes" class="btn btn-primary align-center">
                    [Click here to purchase and download the themes now!]
                </a>
            </div>
        </div>
        <div id="countdown" class="floating-countdown">
            <h4 class="countdown-text">Hurry! Offer Ends In:</h4>
            <div id="timer" class="timer">
                <span id="hours">03</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
            </div>
        </div>
    </section>
@endsection

@push('footer-script')
<script>
    // Countdown timer for 3 hours
const countdown = document.getElementById('countdown');
const hoursElem = document.getElementById('hours');
const minutesElem = document.getElementById('minutes');
const secondsElem = document.getElementById('seconds');

// Set the target time (3 hours from now)
const targetTime = new Date().getTime() + 3 * 60 * 60 * 1000;

// Update the countdown every second
const timerInterval = setInterval(function () {
    const now = new Date().getTime();
    const timeRemaining = targetTime - now;

    // Calculate hours, minutes, and seconds
    const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

    // Display the countdown
    hoursElem.textContent = hours.toString().padStart(2, '0');
    minutesElem.textContent = minutes.toString().padStart(2, '0');
    secondsElem.textContent = seconds.toString().padStart(2, '0');

    // If time is up, stop the countdown
    if (timeRemaining <= 0) {
        clearInterval(timerInterval);
        countdown.innerHTML = "<h4>Promo has ended</h4>";
    }
}, 1000);

</script>

<script>
    const recentPurchases = [
        { item_name: "100++ Premium WordPress Themes", user_name: "A*** L***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "B*** K***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "C*** D***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "D*** F***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "E*** H***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "F*** J***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "G*** M***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "H*** N***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "I*** O***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "J*** P***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "K*** Q***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "L*** R***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "M*** S***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "N*** T***" },
        { item_name: "100++ Premium WordPress Themes", user_name: "O*** U***" }
    ];

    let lastToastCloseTime = Date.now();  // To track the time when last toast was closed

    function getRandomInterval() {
        // Jeda antara 3-6 detik untuk memunculkan notifikasi
        return Math.floor(Math.random() * (6000 - 3000 + 1)) + 3000;
    }

    // Fungsi untuk memilih pembelian acak dari daftar
    function getRandomPurchase() {
        const randomIndex = Math.floor(Math.random() * recentPurchases.length);
        return recentPurchases[randomIndex];
    }

    // Fungsi untuk menampilkan notifikasi pembelian secara berurutan dengan interval acak
    function showRandomPurchases() {
        let purchaseIndex = 0;  // Untuk melacak urutan pembelian

        // Fungsi untuk menampilkan notifikasi satu per satu
        function showNextPurchase() {
            if (purchaseIndex < recentPurchases.length) {
                const purchase = getRandomPurchase();
                const message = `
                    🎉 ${purchase.user_name} has just purchased the "100++ Premium WordPress Themes" bundle!
                    <br><button id="purchase-now-${purchase.item_name}" class="btn btn-sm btn-success mt-2">Check It Out</button>
                `;

                toastr.info(message, "Recent Purchase", {
                    timeOut: 5000,
                    positionClass: "toast-bottom-right",
                    closeButton: true,
                    onclick: function() {
                        window.location.href = "https://bilikshopping.gumroad.com/l/premium-wordpress-themes";
                    },
                    onShown: function() {
                        document.getElementById(`purchase-now-${purchase.item_name}`).onclick = function(event) {
                            event.stopPropagation();
                            window.location.href = "https://bilikshopping.gumroad.com/l/premium-wordpress-themes";
                        };
                    },
                    onHidden: function() {
                        lastToastCloseTime = Date.now();  // Catat waktu ketika notifikasi ditutup
                        purchaseIndex++;  // Lanjutkan ke pembelian berikutnya
                        setTimeout(showNextPurchase, getRandomInterval());  // Tampilkan notifikasi berikutnya setelah interval acak
                    }
                });
            }
        }

        showNextPurchase();  // Panggil fungsi pertama kali untuk memulai
    }

    // Menunggu hingga halaman dimuat sebelum memulai
    window.onload = function() {
        // Delay sebelum memulai notifikasi, misalnya 3 detik setelah halaman dimuat
        setTimeout(function() {
            showRandomPurchases();  // Menampilkan notifikasi setelah delay
        }, 3000);  // Delay 3 detik setelah halaman selesai dimuat
    };
</script>

<!-- Google tag (gtag.js) event - delayed navigation helper -->
<script>
    // Helper function to delay opening a URL until a gtag event is sent.
    // Call it in response to an action that should navigate to a URL.
    function gtagSendEvent(url) {
      var callback = function () {
        if (typeof url === 'string') {
          window.location = url;
        }
      };
      gtag('event', 'ads_conversion_Shopping_Cart_1', {
        'event_callback': callback,
        'event_timeout': 2000,
        // <event_parameters>
      });
      return false;
    }
  </script>
  

@endpush