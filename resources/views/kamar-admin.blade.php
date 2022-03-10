@extends('index-admin')


@section('konten')
<style>
  #example_previous a {
    background-color: black;
  }

  #example_next a {
    background-color: red;
  }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="section" style="margin-top: 100px;">
  <div class="row" style="margin-left: 0;margin-right:0;">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body" style="padding: 1rem 1rem;">
          <h4>Tipe Kamar</h4>
        </div>
      </div>

      <div class="card" style="padding-top: 10px;">
        <div class="card-body">
          <div style="padding-bottom: 6px;">
            <p></p>
            <button id="add-data" type="button" class="btn btn-success">Tambah</button>
          </div>
          <!-- Table with stripped rows -->
          <table id="example" class="table table-striped table-bordered" style="width:100%;text-align:center">
            <thead>
              <tr>
                <th>#</th>
                <th>Tipe Kamar</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1 ?>
              @forelse ($data as $data)
              <tr>
                <th style="text-align: center;">{{$no++}}</th>
                <td>{{$data->type}}</td>
                <td>{{$data->jumlah_kamar}}</td>
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
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
          </table>
          <!-- End Table with stripped rows -->


          <!-- Basic Modal -->

          <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display: none ;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Kamar</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="reset_form()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="form-add" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-4 col-form-label">Tipe Kamar</label>
                      <div class="col-sm-8">
                        <input name="type" id="type" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-4 col-form-label">Jumlah Kamar</label>
                      <div class="col-sm-8">
                        <input name="jumlah_kamar" id="jumlah_kamar" type="text" class="form-control">
                      </div>
                    </div>


                  </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" onclick="reset_form()" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="in">Simpan</button>
                </div>
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
      url: '{{ url("store_room") }}',
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
      url: 'edit_room',
      data: {
        '_token': "{{ csrf_token() }}",
        'id': uid,
      },
      success: function(data) {
        //console.log(data);

        //isi form
        $('#id').val(data[0].id);
        $('#type').val(data[0].type);
        $('#jumlah_kamar').val(data[0].jumlah_kamar);

        id = $('#id').val();

        $('.modal-title').text('Edit Data');
        $("#in").removeClass("btn btn-primary add");
        $("#in").addClass("btn btn-primary update");
        $('#in').text('Update');
        $('#basicModal').modal('show');

      },
    });

  });
  //end edit
  //update data
  $('.modal-footer').on('click', '.update', function() {
    var form = document.getElementById("form-add");
    var fd = new FormData(form);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: 'update_room/' + id,
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
  //end update data
  //delete
  $(document).on('click', '#delete', function(e) {
    e.preventDefault();
    if (confirm('Yakin akan menghapus data ini?')) {
      // alert("Thank you for subscribing!" + $(this).data('id') );

      $.ajax({
        type: 'DELETE',
        url: 'delete_room/' + $(this).data('id'),
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