<div class="container-fluid pt-4 px-4">
      <div class="bg-secondary rounded-top p-4">
            <h6 class="mb-4"> {{ $title }}</h6>
            <div class="table-responsive">
                  <table class="table" id="{{ $tableId }}">
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
                              <tr class="bg-secondary">
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

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
      $(document).ready(function () {
        $('#{{ $tableId }}').DataTable({
                  "columnDefs": [{
                        "orderable": false,
                        "targets": -1 // Exclude the last column (Actions) from ordering
                  }]
            });
            

            // SweetAlert for delete confirmation
            $('body').on('click', '.btn-outline-danger', function (e) {
                  e.preventDefault();
                  var form = $(this).closest('form');
                  Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                        if (result.isConfirmed) {
                              form.submit();
                        }
                  });
            });
      });
</script>