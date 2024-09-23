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
