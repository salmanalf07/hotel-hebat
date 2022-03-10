@extends('index-admin')


@section('konten')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
</link>
<section class="section" style="margin-top: 100px;">
    <div class="row" style="margin-left: 0; margin-right:0">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body" style="padding: 1rem 1rem;">
                    <h4>Dashboard</h4>
                </div>
            </div>

            <div class="card" style="padding-top: 10px;">
                <div class="card-body">
                    <div style="padding-bottom: 6px;" class="datata">
                        <input style="width:fit-content" id="searchh" type="date" class="form-control search">
                    </div>
                    <!-- Table with stripped rows -->
                    <table id="example" class="table table-striped table-bordered" style="width:100%;text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Tamu</th>
                                <th scope="col">Tanggal Check in</th>
                                <th scope="col">Tanggal Check out</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach ($data as $data)
                            <tr>
                                <th scope="row">{{$no++}}</th>
                                <td>{{$data->tamu}}</td>
                                <td>{{$data->check_in}}</td>
                                <td>{{$data->check_out}}</td>
                                @if ($data->status)
                                <td>Check In</td>
                                @else
                                <td></td>
                                @endif
                                <td>
                                    <button id="edit" data-id="{{$data->id}}" class="btn btn-primary">Check In</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Tamu</th>
                                <th scope="col">Tanggal Check in</th>
                                <th scope="col">Tanggal Check out</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- End Table with stripped rows -->

                    <!-- Basic Modal -->

                </div>
                <div class="card">
                    <!-- Basic Modal -->
                    <div class="modal fade" id="basicModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form Pemesanan</h5>
                                    <button type="button" class="btn-close" onclick="reset_form()" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="form-add" method="post" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id" readonly>
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Nama Pemesan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="pemesan" id="pemesan" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="email" id="email" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">No. HP</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nohp" id="nohp" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Nama Tamu</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="tamu" id="tamu" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="room" class="col-sm-4 col-form-label">Type Kamar</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="room" id="room" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="kamar" class="col-sm-4 col-form-label">Jumlah Qty Kamar</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="kamar" id="kamar" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="check_in" class="col-sm-4 col-form-label">Tanggal Check In</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="check_in" id="check_in" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="check_out" class="col-sm-4 col-form-label">Tanggal Check Out</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="check_out" id="check_out" readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="check_out" class="col-sm-4 col-form-label">Tanggal & Jam Check IN</label>
                                            <div class="col-sm-8">
                                                <input type="datetime-local" class="form-control" name="status" id="status">
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="reset_form()" data-bs-dismiss="modal">Close</button>
                                    <button type="button" id="in" class="btn btn-primary ">Konfirmasi pemesanan</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Basic Modal-->

                </div>
            </div>

        </div>
    </div>
</section>
<script src="assets/js/jquery-3.5.1.js"></script>

<script type="text/javascript">
    var datdat;

    $(document).ready(function() {
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var mydate = $('#searchh').val();
                var datete = moment(mydate).format('DD-MM-YYYY');
                var date = data[2];

                if (
                    (mydate === "") ||
                    (date == datete)
                ) {
                    return true;
                }
                return false;
            }
        );
        var oTable = $('#example').DataTable({
            "columnDefs": [{
                targets: [2, 3],
                render: function(oTable) {
                    return moment(oTable).format('DD-MM-YYYY');
                }
            }, ],
        });

        $('#searchh').on('change', function() {
            //console.log($(this).val());
            oTable.draw();
        });
    });

    //edit data
    $(document).on('click', '#edit', function(e) {
        e.preventDefault();
        var uid = $(this).data('id');
        var newDateOptions = {
            year: "numeric",
            month: "2-digit",
            day: "2-digit"
        }

        $.ajax({
            type: 'POST',
            url: 'edit_transaction',
            data: {
                '_token': "{{ csrf_token() }}",
                'id': uid,
            },
            success: function(data) {
                //console.log(data);

                //isi form
                reset_form();
                $('#id').val(data[0].id);
                $('#pemesan').val(data[0].pemesan);
                $('#email').val(data[0].email);
                $('#nohp').val(data[0].nohp);
                $('#tamu').val(data[0].tamu);
                $('#room').val(data[0].room['type']);
                $('#kamar').val(data[0].kamar);
                $('#check_in').val(new Date(data[0].check_in).toLocaleString("id-ID", newDateOptions).split(' ')[0]);
                $('#check_out').val(new Date(data[0].check_out).toLocaleString("id-ID", newDateOptions).split(' ')[0]);
                $('#status').prop('readonly', false);
                $('#in').show();
                if (data[0].status != null) {
                    $('#status').val(data[0].status).prop('readonly', true);
                    $('#in').hide();
                }
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
            url: 'update_transaction/' + id,
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
</script>
<script>
    function reset_form() {
        document.getElementById("form-add").reset();
    }
</script>
@endsection