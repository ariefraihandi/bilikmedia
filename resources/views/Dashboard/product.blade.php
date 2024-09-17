@extends('Dashboard.Index.appDashboard')

@section('content')    
    <div class="card common-card">
        <div class="card-body">                        
            <div class="row gy-4">
                <div class="col-lg-4 pe-xl-5">
                    <div class="setting-sidebar top-24">
                        <h6 class="setting-sidebar__title">Product Details</h6>
                        <ul class="setting-sidebar-list">
                            <li class="setting-sidebar-list__item"><a href="#personalInfo" class="setting-sidebar-list__link active">Product Information</a></li>
                            <li class="setting-sidebar-list__item"><a href="#attributes" class="setting-sidebar-list__link">Product Attributes</a></li>
                            <li class="setting-sidebar-list__item"><a href="#source" class="setting-sidebar-list__link">Product Source</a></li>                            
                        </ul>
                    </div>
                </div>


                <div class="col-lg-8">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="setting-content" data-bs-spy="scroll" data-bs-target="#sidebar-scroll-spy">
                            <div class="card common-card border border-gray-five overflow-hidden mb-24"  id="personalInfo">
                                <div class="card-header">
                                    <h6 class="title">Product Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row gy-3">
                                        <div class="col-sm-12">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="common-input common-input--md border--color-dark bg--white" id="title" name="title">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="description" class="form-label">Product Description</label>
                                            <textarea class="common-input common-input--md border--color-dark bg--white" id="description" name="description"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="features" class="form-label">Product Features</label>
                                            <textarea class="common-input common-input--md border--color-dark bg--white" id="features" name="features"></textarea>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <label for="tags" class="form-label">Product Tags</label>
                                            <textarea class="common-input common-input--md border--color-dark bg--white" id="tags" name="tags"></textarea>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card common-card border border-gray-five overflow-hidden mb-24" id="attributes">
                                <div class="card-header">
                                    <h6 class="title">Product Attributes</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row gy-3">
                                        <div class="col-sm-6 col-xs-6">
                                                <label for="types" class="form-label">File Types</label>
                                                <input type="text" class="common-input common-input--md border--color-dark bg--white" id="types" name="types">
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                                <label for="additions" class="form-label">Additions</label>
                                                <input type="text" class="common-input common-input--md border--color-dark bg--white" id="additions" name="additions">
                                        </div>                                        
                                        <div class="col-sm-6 col-xs-6">
                                                <label for="author" class="form-label">Author</label>
                                                <input type="text" class="common-input common-input--md border--color-dark bg--white" id="author" name="author">
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                                <label for="author_url" class="form-label">Author Url</label>
                                                <input type="text" class="common-input common-input--md border--color-dark bg--white" id="author_url" name="author_url">
                                        </div>                                        
                                        <div class="col-sm-12">
                                            <label for="fileUpload" class="form-label">Image</label>
                                            <input type="file" class="common-input common-input--md border--color-dark bg--white" id="fileUpload" name="fileUpload">
                                        </div>                                        
                                        <div class="col-sm-12">
                                            <label for="category" class="form-label">Category</label>
                                            <div class="d-flex flex-column mb-3">
                                                @foreach($categories as $category)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="category_{{ $category->id }}" name="category[]" value="{{ $category->id }}">
                                                        <label class="form-check-label" for="category_{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</button>
                                        </div>                                                                                                                                                         
                                    </div>
                                </div>
                            </div>
                            <div class="card common-card border border-gray-five overflow-hidden mb-24" id="source">
                                <div class="card-header">
                                    <h6 class="title">Product Source</h6>
                                </div>
                                <div class="card-body">
                                    <div class="payment-method mb-0">
                                        <div class="payment-method__wrapper arrow-sm">
                                            <div class="payment-method__item">
                                                <input class="form-check-input" type="radio" name="envanto" id="envanto" hidden>
                                                <label class="form-check-label" for="envanto">
                                                    <img src="{{ asset('assets') }}/images/thumbs/payment-method1.png" alt="">
                                                </label>
                                            </div>
                                            <div class="payment-method__item">
                                                <input class="form-check-input" type="radio" name="freepik" id="freepik" hidden>
                                                <label class="form-check-label" for="freepik">
                                                    <img src="{{ asset('assets') }}/images/thumbs/payment-method2.png" alt="">
                                                </label>
                                            </div>                                           
                                        </div>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col-sm-12">
                                            <label for="url_source" class="form-label">Url Source</label>
                                            <input type="text" class="common-input common-input--md border--color-dark bg--white" id="url_source" name="url_source">
                                        </div>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col-sm-12">
                                            <label for="url_download" class="form-label">Url Download</label>
                                            <input type="text" class="common-input common-input--md border--color-dark bg--white" id="url_download" name="url_download">
                                        </div>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col-sm-12">
                                            <label for="live_preview_url" class="form-label">Url Preview</label>
                                            <input type="text" class="common-input common-input--md border--color-dark bg--white" id="live_preview_url" name="live_preview_url">
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <button type="submit" class="btn w-100 btn-main btn-md">Save Information</button>                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newCategory" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="newCategory" name="newCategory">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveCategoryBtn">Save Category</button>
                </div>
            </div>
        </div>
    </div>
@endsection
  
@push('footer-script')    
    <script>
        document.getElementById('saveCategoryBtn').addEventListener('click', function() {
            var newCategoryName = document.getElementById('newCategory').value;

            // Pastikan CSRF token ada
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (newCategoryName) {
                // Kirim data ke server menggunakan AJAX
                fetch('{{ route("store-category") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken // Masukkan CSRF token di header
                    },
                    body: JSON.stringify({
                        name: newCategoryName
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Menampilkan SweetAlert jika berhasil
                        Swal.fire({
                            title: 'Success!',
                            text: 'Category has been added successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            // Setelah SweetAlert selesai, tutup modal
                            var modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
                            modal.hide();

                            // Reset input modal
                            document.getElementById('newCategory').value = '';

                            // Tambahkan kategori baru ke dalam select
                            var select = document.getElementById('category');
                            var option = document.createElement('option');
                            option.value = data.category.id;
                            option.text = data.category.name;
                            select.add(option);
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to add category!',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    console.error('Error:', error);
                });
            } else {
                Swal.fire({
                    title: 'Warning!',
                    text: 'Please enter a category name!',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            }
        });

    </script>
@endpush