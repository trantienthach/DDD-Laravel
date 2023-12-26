@extends('layout')
@section('content')
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a> / Properties</span>
          <h3>Properties</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="section properties">
    <div class="container">
      <ul class="properties-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
        <li>
          <a href="#!" data-filter=".adv">Apartment</a>
        </li>
        <li>
          <a href="#!" data-filter=".str">Villa House</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Penthouse</a>
        </li>
      </ul>
      <div class="row properties-box">
        @foreach ($properties as $property)
        <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 {{ $property->type_class }}">
            <div class="item">
              <div style="height: 264.45px">
                <img src="{{ url($property->image) }}" height="100%" alt="">
            </div>
              <span class="category">{{ $property->type }}</span>

              <h6>{{ $property->price }}</h6>
              <h4>{{ $property->name }}</h4>
              <ul>
                <li>Bedrooms: <span>{{ $property->propertyDetail->bedrooms }}</span></li>
                <li>Bathrooms: <span>{{ $property->propertyDetail->bathrooms }}</span></li>
                <li>Area: <span>{{ $property->propertyDetail->area }}</span></li>
                <li>Floor: <span>{{ $property->propertyDetail->floor }}</span></li>
                <li>Parking: <span>{{ $property->propertyDetail->parking }} </span></li>
              </ul>
              <div class="main-button">
                <a href="{{ route('booking.show', $property->id) }}">Booking Now</a>
              </div>
            </div>
          </div>
        @endforeach


      </div>
    </div>
  </div>
@endsection

