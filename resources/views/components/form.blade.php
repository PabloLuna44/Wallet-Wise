<div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="bg-secondary rounded h-100 p-4" >
                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
                    <h6 class="mb-4">{{$title}}</h6>
                    {{$slot}}
                    
                </div>
            </div>
        </div>
    </div>