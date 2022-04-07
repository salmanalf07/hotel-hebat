@extends('index')


@section('konten')
<style>
  .img-rinci {
    width: 100%;
    height: 87%;
    object-fit: cover;
    margin-bottom: 10px
  }

  .p-rinci {
    width: 100%;
    background-color: #adbad1;
    text-align: center;
    border-radius: 5px;
    padding: 3px;
  }
</style>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php for ($i = 0; $i < count($data); $i++) {
      if ($i == 0) { ?>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide {{$i + 1}}"></button>
      <?php } else { ?>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" aria-current="true" aria-label="Slide {{$i + 1}}"></button>
    <?php }
    } ?>
  </div>
  <div class="carousel-inner">
    @foreach($data as $datas)
    @if($loop->first)
    <div class="carousel-item active">
      <img src="{{ asset('assets/images/'.$datas->link) }}" class="w-100" alt="...">
    </div>
    @else
    <div class="carousel-item">
      <img src="{{ asset('assets/images/'.$datas->link) }}" class="w-100" alt="...">
    </div>
    @endif
    @endforeach
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



<div class="row justify-content-between" style="margin: 30px; ">
  <p class="text-start h1">Fasilitas</p>
  @foreach($data as $data)
  <div style="width:32%">
    <img src="{{ asset('assets/images/'.$data->link) }}" class="img-rinci" alt="Responsive image">
    <p class="p-rinci">{{$data->facilitie}}</p>
  </div>
  @endforeach
  <!-- <div style="width:32%">
    <img src=".../../assets/img/hotel-2.jpg" class="img-rinci" alt="Responsive image">
    <p class="p-rinci">Kolam Renang</p>
  </div>
  <div style="width:32%">
    <img src=".../../assets/img/hotel-3.jpg" class="img-rinci" alt="Responsive image">
    <p class="p-rinci">Taman</p>
  </div>
  <div style="width:32%">
    <img src=".../../assets/img/hotel-1.jpg" class="img-rinci" alt="Responsive image">
    <p class="p-rinci">Ruangan Luas</p>
  </div>
  <div style="width:32%">
    <img src=".../../assets/img/hotel-2.jpg" class="img-rinci" alt="Responsive image">
    <p class="p-rinci">Kolam Renang</p>
  </div>
  <div style="width:32%">
    <img src=".../../assets/img/hotel-3.jpg" class="img-rinci" alt="Responsive image">
    <p class="p-rinci">Taman</p>
  </div> -->
</div>

@endsection