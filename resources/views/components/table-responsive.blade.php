<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <h6 class="mb-4"> {{ $title }}</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        @foreach ($object[0] as $header)
                            <th scope="col">{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($object as $key => $row)
                        @if ($key > 0)
                            <tr>
                                @foreach ($row as $cell)
                                    <td>{!! $cell !!}</td> {{-- Utilizar {!! !!} para interpretar como HTML --}}
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

