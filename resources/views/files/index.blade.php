<x-layout :title=$title>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


    <h1>{{$title}}</h1>

    @php
    $fileData = [
    ['Name','Actions']
    ];


    foreach($files as $file){
    
        $actions='<a class="btn btn-outline-primary m-2" href="'.route('file.download',$file->id).'">Download</a> '.
                        '<form action="'.route('file.destroy', $file->id).'" method="POST">'.
                                    '<input type="hidden"  name="_token" value="'.csrf_token().'">'.
                                    '<input type="hidden"  name="_method" value="DELETE">'.
                                    '<button type="submit" class="btn btn-outline-danger m-2">Eliminar</button>'.
                               '</form>';
    $fileData[] = [
    $file->name,
    $actions
    ];

    }
    @endphp


    <x-table-responsive :title=$title :object="$fileData" />



</x-layout>