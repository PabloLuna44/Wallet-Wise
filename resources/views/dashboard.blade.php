<x-layout title="Dashboard">

    <h1>Welcome To Wallet Wise</h1>

    <div>
        <h2>Download accounts Information</h2>
        <a class="btn btn-primary m-2" href="{{ route('email.accounts') }}">Click Here</a>
    </div>

    <br>

    <div>
        <h2>Upload Files</h2>
        <h4>You can upload to have a history about yours accounts </h4>
        <a href="">History of PDF</a>

        <x-form title="Upload Files">
            <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <label for="history">History of files PDF</label>
                <input type="file" class="form-control mb-3" name="history[]" id="history" multiple>
                <div id="pdf-preview"></div>

                <input type="submit" class="btn btn-primary">

            </form>

        </x-form>

    </div>


    <br>
    <div>
        <h2>History Files</h2>
        <a class="btn btn-primary m-2" href="{{ route('file.index') }}">Click Here</a>
    </div>
    
</x-layout>