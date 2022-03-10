@extends('index-admin')


@section('konten')
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="section" style="margin-top: 100px;">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body" style="padding: 1rem 1rem;">
        <h4>Fasilitas Kamar</h4>
      </div>
    </div>

    <div class="card" style="padding-top: 10px;">
      <div class="card-body">
        <div style="padding-bottom: 6px;">
          <p></p>
          <button id="add-data" type="button" class="btn btn-success">Tambah</button>
        </div>
        <!-- Table with stripped rows -->
        <table id="example" class="table table-striped table-bordered" style="width:100%; text-align:center">
          <thead>
            <tr>
              <th>#</th>
              <th>Tipe Kamar</th>
              <th>Nama Fasilitas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            @forelse ($data as $data)
            <tr>
              <th>{{$no++}}</th>
              <td>{{$data->room['type']}}</td>
              <td>{{$data->facilitie}}</td>
              <td>
                <p><button id="edit" data-id="{{$data->id}}" class="btn btn-primary">Ubah</button> | <button id="delete" data-id="{{$data->id}}" class="btn btn-danger">Delete</button></p>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" style="text-align: center;">
                Data Kosong
              </td>
            </tr>
            @endforelse
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Tipe Kamar</th>
              <th>Nama Fasilitas</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
        <!-- End Table with stripped rows -->
      </div>

      <!-- Basic Modal -->

      <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Form Fasilitas Kamar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="form-add" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Type Kamar</label>
                  <div class="col-sm-8">
                    <select name="room_id" id="room_id" class="form-control">
                      <option selected>Choose...</option>
                      @foreach ($room as $room)
                      <option value="{{$room->id}}">{{$room->type}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Nama Fasilitas</label>
                  <div class="col-sm-8">
                    <input type="text" id="facilitie" name="facilitie" class="form-control">
                  </div>
                </div>


              </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" id="in" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
</section>

<script src="assets/js/jquery-3.5.1.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
  //open modal
  $(document).on('click', '#add-data', function() {
    reset_form();
    $("#in").show();
    $("#in").removeClass("btn btn-primary update");
    $("#in").addClass("btn btn-primary add");
    $('#basicModal').modal('show');
  });
  //add data
  $('.modal-footer').on('click', '.add', function() {
    var form = document.getElementById("form-add");
    var fd = new FormData(form);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: '{{ url("store_facili_room") }}',
      data: fd,
      processData: false,
      contentType: false,
      success: function(data) {
        $('#basicModal').modal('hide');
        reset_form();
        location.reload();


      },
    });
  });
  //end add data
  //edit data
  $(document).on('click', '#edit', function(e) {
    e.preventDefault();
    var uid = $(this).data('id');

    $.ajax({
      type: 'POST',
      url: 'edit_facili_room',
      data: {
        '_token': "{{ csrf_token() }}",
        'id': uid,
      },
      success: function(data) {
        //console.log(data);

        //isi form
        $('#id').val(data[0].id);
        $('#room_id').val(data[0].room_id);
        $('#facilitie').val(data[0].facilitie);

        id = $('#id').val();

        $('.modal-title').text('Detail Data');
        $("#in").hide();
        $('#basicModal').modal('show');

      },
    });

  });
  //end edit
  //delete
  $(document).on('click', '#delete', function(e) {
    e.preventDefault();
    if (confirm('Yakin akan menghapus data ini?')) {
      // alert("Thank you for subscribing!" + $(this).data('id') );

      $.ajax({
        type: 'DELETE',
        url: 'delete_facili_room/' + $(this).data('id'),
        data: {
          '_token': "{{ csrf_token() }}",
        },
        success: function(data) {
          alert("Data Berhasil Dihapus");
          location.reload();
        }
      });

    } else {
      return false;
    }
  });
  //end delete
</script>
<script>
  function reset_form() {
    document.getElementById("form-add").reset();
  }
</script>
@endsection