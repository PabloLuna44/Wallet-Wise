<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">{{ $title }}</h6>
                <table class="table table-hover">
                    <tbody>
                        @foreach($object as $key => $value)
                        @if($key == 'id' || $key=='type')
                        @continue
                        @endif
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $value }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex align-items-center">
                    <a class="btn btn-outline-primary m-1" href="{{ route($object['type'].'.edit', $object['id']) }}">Editar</a>
                    <form action="{{ route($object['type'].'.destroy', $object['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger m-2">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>