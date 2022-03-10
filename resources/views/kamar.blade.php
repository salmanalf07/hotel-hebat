@extends('index')


@section('konten')
<style>
  .carousel {
    width: 50%;
    height: 70vh;
  }
</style>
<div>
  @foreach ($data as $data)
  <div class="d-flex mx-3 align-items-start " style="margin-top: 80px;">
    <div id="carouselExampleIndicators1" class="carousel slide col-6" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="2" aria-label="Slide 3"></button>
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

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

    </div>
    <div class="justify-content-between entry-content col-5 " style="margin: 30px; ">
      <p class="text-start h1">Tipe {{$data->type}}</p>
      <p class="text-start h4">Fasilitas :</p>
      <ul>
        <?php for ($i = 0; $i < count($data->facilitie); $i++) { ?>
          <li>
            <p class="text-start ">{{$data->facilitie[$i]->facilitie}}</p>
          </li>
        <?php } ?>
      </ul>

    </div>
  </div>
  @endforeach
  <!-- <div class=" d-flex mx-3 align-items-start" style="margin-top: 80px;">
    <div id="carouselExampleIndicators" class="carousel slide col-6" data-bs-ride="carousel">
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

    </div>
    <div class="justify-content-between entry-content col-5 " style="margin: 30px; ">
      <p class="text-start h1">Tipe Superior</p>
      <p class="text-start h4">Fasilitas :</p>
      <ul>
        <li>
          <p class="text-start ">Kamar luas</p>

        </li>
        <li>

          <p class="text-start ">Kamar mandi shower</p>
        </li>
        <li>

          <p class="text-start ">Coffee maker</p>
        </li>
        <li>

          <p class="text-start ">AC</p>
        </li>
        <li>

          <p class="text-start ">LED TV 32inch</p>
        </li>
      </ul>

    </div>
  </div> -->
</div>


@endsection