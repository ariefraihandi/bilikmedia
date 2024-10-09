@extends('Dashboard.Index.appDashboard')

@section('content')       
    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="statement-item card common-card border border-gray-five">
                <div class="card-body">
                    <div class="statement-item__header">
                        <h6 class="statement-item__title">Download Summary</h6>
                    </div>
                    <ul class="statement-list">
                        <li class="statement-list__item text-center">
                            <span class="statement-list__text font-13">Envato</span>
                            <h6 class="statement-list__amount mb-0 mt-1 fw-600">{{$envatoCount}} File</h6>
                        </li>
                        <li class="statement-list__item text-center">
                            <span class="statement-list__text font-13">Freepik</span>
                            <h6 class="statement-list__amount mb-0 mt-1 fw-600">{{$freepikCount}} File</h6>
                        </li>                  
                        <li class="statement-list__item text-center">
                            <span class="statement-list__text font-13">Motion Array</span>
                            <h6 class="statement-list__amount mb-0 mt-1 fw-600">{{$motionCount}} File</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
       
        <div class="col-12">
            <div class="card common-card border border-gray-five">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-body mt--24">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Type</th>
                                    <th>Source</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($downloadHistory as $index => $download)
                                <tr>
                                    <td data-label="No">{{ $downloadHistory->firstItem() + $index }}</td>
                                    <td data-label="URL">
                                        {{ optional($download->product)->title ?? 'Processing...' }}<br>
                                        @if (Str::startsWith($download->url, 'https://elements.envato.com/'))
                                            Envato
                                        @elseif (Str::startsWith($download->url, 'https://www.freepik.com/'))
                                            Freepik
                                        @elseif (Str::startsWith($download->url, 'https://motionarray.com/'))
                                            Motion Array
                                        @else
                                            Unknown Source
                                        @endif
                                    </td>
                                    <td data-label="Details">
                                        <a href="{{ $download->url }}" class="btn btn-main" target="_blank"><i class="far fa-eye"></i></a>
                                    </td>
                                    <td data-label="Details">
                                        @if ($download->status != 0 && $download->status <= 3 && $download->product)
                                            <!-- Jika status tidak 0 dan kurang dari 3, munculkan link ke detail produk berdasarkan slug -->
                                            <a href="{{ route('product.details', ['slug' => $download->product->slug]) }}" class="btn btn-main" target="_blank">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        @elseif ($download->status == 0)
                                            <!-- Jika status sama dengan 0, munculkan badge "On Process" -->
                                            <span class="badge bg-warning">On Process</span>
                                        @elseif ($download->status == 5)
                                            <span class="badge bg-warning">On Process</span>
                                        @elseif ($download->status == 4)
                                            <!-- Jika status sama dengan 4, munculkan tombol Fix Your URL -->
                                            @if (Str::startsWith($download->url, 'https://elements.envato.com/'))
                                                <button class="btn btn-danger fix-url-btn" data-platform="Envato" data-id="{{ $download->id }}" data-url="{{ $download->url }}">Fix Your Envato URL</button>
                                            @elseif (Str::startsWith($download->url, 'https://www.freepik.com/'))
                                                <button class="btn btn-danger fix-url-btn" data-platform="Freepik" data-id="{{ $download->id }}" data-url="{{ $download->url }}">Fix Your Freepik URL</button>
                                            @elseif (Str::startsWith($download->url, 'https://motionarray.com/'))
                                                <button class="btn btn-danger fix-url-btn" data-platform="Motion Array" data-id="{{ $download->id }}" data-url="{{ $download->url }}">Fix Your Motion Array URL</button>
                                            @endif
                                        @else
                                            <!-- Jika status di luar ketentuan, bisa tampilkan teks lain jika perlu -->
                                            <span class="text-muted">Status not available</span>
                                        @endif
                                    </td>
                                    
                                                                                                          
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <div class="flx-between gap-2">
                            <div class="paginate-content flx-align flex-nowrap gap-3">
                                <span class="paginate-content__text fs-14">
                                    Showing {{ $downloadHistory->firstItem() }} - {{ $downloadHistory->lastItem() }} of {{ $downloadHistory->total() }}
                                </span>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination common-pagination mt-0">
                                    <!-- Link ke halaman sebelumnya -->
                                    <li class="page-item {{ $downloadHistory->onFirstPage() ? 'disabled' : '' }}">                                                  
                                        <a class="page-link flx-align gap-2 flex-nowrap" href="{{ $downloadHistory->previousPageUrl() }}">
                                            <span class="icon line-height-1 font-20"><i class="las la-arrow-left"></i></span>
                                        </a>
                                    </li>
                        
                                    <!-- Link ke tiap halaman -->
                                    @for ($i = 1; $i <= $downloadHistory->lastPage(); $i++)
                                        <li class="page-item {{ $i == $downloadHistory->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $downloadHistory->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                        
                                    <!-- Link ke halaman selanjutnya -->
                                    <li class="page-item {{ $downloadHistory->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link flx-align gap-2 flex-nowrap" href="{{ $downloadHistory->nextPageUrl() }}">
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
@endsection
@push('footer-script')    
<script>
    // Event listener untuk tombol Fix Your URL
    document.querySelectorAll('.fix-url-btn').forEach(button => {
        button.addEventListener('click', function() {
            const platform = this.getAttribute('data-platform');
            const url = this.getAttribute('data-url');
            const id = this.getAttribute('data-id');  // Menambahkan ID dari elemen

            // SweetAlert2 popup untuk memperbaiki URL
            Swal.fire({
                title: 'Fix Your ' + platform + ' URL',
                input: 'text',
                inputLabel: 'Current URL',
                inputValue: url,
                showCancelButton: true,
                confirmButtonText: 'Fix it!',
                showLoaderOnConfirm: true,
                preConfirm: (newUrl) => {
                    return new Promise((resolve, reject) => {
                        if (!newUrl) {
                            reject('URL cannot be empty!');
                        } else {
                            // Kirim permintaan AJAX untuk memperbarui URL
                            fetch('{{ route('fix.url') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                },
                                body: JSON.stringify({
                                    id: id,
                                    new_url: newUrl
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.message) {
                                    resolve(data); // Sukses, kirim data ke SweetAlert
                                } else {
                                    reject('Failed to update URL!');
                                }
                            })
                            .catch(error => reject(error));
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'URL has been updated!',
                        text: 'Your new ' + platform + ' URL: ' + result.value.new_url
                    });

                    // Perbarui URL di tampilan jika perlu
                    document.querySelector(`.fix-url-btn[data-id="${id}"]`).setAttribute('data-url', result.value.new_url);
                }
            }).catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: error
                });
            });
        });
    });
</script>

@endpush