@extends('index')


@section('konten')
<!-- Slides with indicators -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/hotel-1.jpg" class="w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/img/hotel-2.jpg" class="w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/img/hotel-3.jpg" class="w-100" alt="...">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div><!-- End Slides with indicators -->




<section>
    <div class="row justify-content-center align-items-end px-3" style="width: 100%; margin-top: 30px;">

        <div class="col-md-2">
            <label for="inputDate" class="col-sm-10 col-form-label">Tanggal Check in</label>
            <input type="date" class="form-control" id="tgl_in">
        </div>
        <div class="col-md-2">
            <label for="inputDate" class="col-sm-10 col-form-label">Tanggal Check out</label>
            <input type="date" class="form-control" id="tgl_out">
        </div>
        <div class="col-md-2">
            <label for="jumlah_kamar" class="col-sm-10 col-form-label">Jumlah kamar</label>
            <input type="text" class="form-control" id="jumlah_kamar">
        </div>
        <div class="col-md-1 align-items-center">
            <button type="button" id="pesan" class="btn btn-primary">
                Pesan
            </button>
        </div>

        <div class="card">
            <!-- Basic Modal -->
            <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Form Pemesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-add" method="post" role="form" enctype="multipart/form-data">
                                <input type="hidden" name="check_in" id="check_in">
                                <input type="hidden" name="check_out" id="check_out">
                                <input type="hidden" name="kamar" id="kamar">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Nama Pemesan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="pemesan" id="pemesan">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">No. HP</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nohp" id="nohp">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">Nama Tamu</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tamu" id="tamu">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label">Tipe Kamar</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label="Default select example" name="room_id" id="room_id">
                                            <option selected>Pilih tipe kamar</option>
                                            @foreach ($data as $data)
                                            <option value="{{$data->id}}">{{$data->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="in" class="btn btn-primary ">Konfirmasi pemesanan</button>
                        </div>
                    </div>
                </div>
            </div><!-- End Basic Modal-->

        </div>
    </div>

</section>


<div class="mx-3">

    <p class="text-center h3">Tentang Kami</p>
    <p class="text-justify" style="text-align: justify;">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.</p>
</div>

<script src="assets/js/jquery-3.5.1.js"></script>
<script>
    //open modal
    $(document).on('click', '#pesan', function() {
        reset_form();
        $("#in").removeClass("btn btn-primary update");
        $("#in").addClass("btn btn-primary add");
        $('#check_in').val($('#tgl_in').val());
        $('#check_out').val($('#tgl_out').val());
        $('#kamar').val($('#jumlah_kamar').val());
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
            url: "{{ route('store_transaction') }}",
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response) {
                var blob = new Blob([response]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = "Sample.pdf";
                link.click();
                $('#basicModal').modal('hide');
                reset_form();
                location.reload();
                $('#tgl_in').val("");
                $('#tgl_out').val("");
                $('#jumlah_kamar').val("");


            },
        });
    });
    //end add data
</script>
<script>
    function reset_form() {
        document.getElementById("form-add").reset();
    }
</script>


@endsection