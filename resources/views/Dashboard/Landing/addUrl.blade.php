
@extends('Dashboard.Index.appDashboard')

@section('content')    
    <div class="card common-card">
        <div class="card-body">                        
            <div class="row gy-4">
                <div class="col-lg-12">
                    <form id="productForm" action="{{ route('url.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="setting-content" data-bs-spy="scroll" data-bs-target="#sidebar-scroll-spy">
                            <div class="card common-card border border-gray-five overflow-hidden mb-24" id="personalInfo">
                                <div class="card-header">
                                    <h6 class="title">Create Landing Page</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row gy-3">
                                        <!-- Title Field -->
                                        <div class="col-sm-12">
                                            <label for="title" class="form-label">Landing Page Title</label>
                                            <input type="text" class="common-input common-input--md border--color-dark bg--white" id="title" name="title" required>
                                        </div>
                    
                                        <!-- Description Field -->
                                        <div class="col-sm-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="common-input common-input--md border--color-dark bg--white" id="description" name="description" rows="4" required></textarea>
                                        </div>
                    
                                        <!-- Thumbnail Upload -->
                                        <div class="col-sm-12">
                                            <label for="thumbnail" class="form-label">Thumbnail (Image)</label>
                                            <input type="file" class="common-input common-input--md border--color-dark bg--white" id="thumbnail" name="thumbnail" accept="image/*" required>
                                        </div>
                    
                                        <!-- Video URL (Optional) -->
                                        <div class="col-sm-12">
                                            <label for="target_url" class="form-label">Target URL</label>
                                            <input type="text" class="common-input common-input--md border--color-dark bg--white" id="target_url" name="target_url" placeholder="https://youtube.com/...">
                                        </div>                
                                 
                                    </div>
                                </div>
                    
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create Landing Page</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table text-body mt--24">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($LandingPage as $page)
                                <tr>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->description }}</td>
                                    <td>
                                        <button class="btn btn-info" onclick="copyToClipboard('{{ route('showLandOne', ['code' => $page->code]) }}')">Copy URL</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  
@endsection

@push('footer-script')    
<script>
    function copyToClipboard(url) {
        // Create a temporary input element to copy URL
        const tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = url;
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        // Show SweetAlert for successful copy
        Swal.fire({
            title: 'URL Copied!',
            text: 'The URL has been copied to your clipboard.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }
</script>
@endpush