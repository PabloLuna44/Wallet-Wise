<div class="container-fluid pt-4 px-4">
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">{{ $title }}</h6>
                <table class="table table-hover">
                    <tbody>
                        @foreach($object as $key => $value)
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td>{{ $value }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>