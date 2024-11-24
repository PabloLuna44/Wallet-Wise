<x-layout title="Dashboard">

<div class="container my-5">
    <!-- Welcome Section -->
    <div class="text-center mb-5">
        <h1 class="display-4 text-primary fw-bold">Welcome To Wallet Wise</h1>
        <p class="lead text-muted">Manage your accounts effortlessly with our tools.</p>
    </div>

    <!-- Download Accounts Information Section -->
    <div class="card shadow mb-4 bg-secondary">
        <div class="card-body">
            <h2 class="card-title text-secondary">Download Accounts Information</h2>
            <p class="card-text">Click below to download your account details.</p>
            <a class="btn btn-primary" href="{{ route('email.accounts') }}">Accounts Details</a>
        </div>
    </div>

    <!-- Upload Files Section -->
    <div class="card shadow mb-4 bg-secondary">
        <div class="card-body">
            <h2 class="card-title text-secondary">Upload Files</h2>
            <p class="card-text">You can upload files to maintain a history of your accounts.</p>
            <h4 class="text-muted">Upload PDFs for record-keeping:</h4>
            <p class="card-text">View your previously uploaded files here.</p>
            <a class="btn btn-primary" href="{{ route('file.index') }}">Click Here</a>

            <x-form title="Upload Files">
                <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="history" class="form-label">Upload History Files (PDF)</label>
                        <input type="file" class="form-control" name="history[]" id="history" multiple>
                        <div id="pdf-preview" class="mt-2"></div>
                    </div>

                    <button type="submit" class="btn btn-success">Upload</button>
                </form>
            </x-form>
        </div>
    </div>


</div>

</x-layout>