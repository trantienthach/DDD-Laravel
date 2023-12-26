@extends('layout')
@section('content')
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a>  /  Booking</span>
          <h3>Booking</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
          <div class="section-heading" style="width: 100%">
            <h3>{{ $property->name }}</h3>
            <h5 style="color: #f35525">{{ $property->price }}</h5>
        </div>
          <p>{{ $property->description }}</p>
          <div class="mb-3">
            <img src="{{ url($property->image) }}" height="354.13px" width="636px" alt="" >
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone" style="min-width: 300px">
                <img src="{{ asset('assets/images/phone-icon.png') }}" alt="" style="max-width: 52px;">
                <h6>010-020-0340<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email" style="min-width: 300px">
                <img src="{{ asset('assets/images/email-icon.png') }}" alt="" style="max-width: 52px;">
                <h6>info@villa.co<br><span>Business Email</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
            <form id="contact-form" action="{{ route('booking.booking', $property->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <label for="first_name">First name</label>
                  <input type="text" name="first_name" id="first_name" placeholder="First Name..." autocomplete="on" required>
                </fieldset>
            </div>
            <div class="col-lg-6">
                <fieldset>
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name..." autocomplete="on" required>
                </fieldset>
            </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email Address</label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" id="phone" placeholder="Phone..." autocomplete="on"required >
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="check_in_date">Check in date</label>
                  <input type="date" name="check_in_date" id="check_in_date" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="check_out_date">Check out date</label>
                  <input type="date" name="check_out_date" id="check_out_date" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="address">Address</label>
                  <input type="text" name="address" id="address" placeholder="Address..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Booking</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
