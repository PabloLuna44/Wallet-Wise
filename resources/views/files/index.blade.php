<x-layout :title="$title">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ $title }}</h1>

        <div class="d-flex justify-content-center mb-4">
            <a class="btn btn-primary" href="{{ route('dashboard') }}">Back to Dashboard</a>
        </div>

        @php
        $fileData = [
        ['Name', 'Actions']
        ];

        foreach($files as $file){
            $actions = '<a class="btn btn-outline-primary me-2" href="'.route('file.download', $file->id).'">Download</a> '.
                       '<form action="'.route('file.destroy', $file->id).'" method="POST" class="d-inline">'.
                           '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                           '<input type="hidden" name="_method" value="DELETE">'.
                           '<button type="submit" class="btn btn-outline-danger">Eliminar</button>'.
                       '</form>';
            $fileData[] = [
                $file->name,
                $actions
            ];
        }
        @endphp

        <x-table-responsive :title="$title" :object="$fileData" />
    </div>

</x-layout>