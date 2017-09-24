@extends('main.layouts.app')

@section('content')
    <div class="fh5co-parallax" style="background-image: url(images/banner/banner4.jpg);font-size: small; height:300px;" data-stellar-background-ratio="0.5" style="height:300px;">
        <div class="overlay" style="height:300px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table" style="height:300px;">
                    <div class="fh5co-intro fh5co-table-cell"  style="height:300px;">
                        <h1 class="text-center">Nous contacter</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-md-offset-2" style="padding-top:3em">
        <h3>Nos adresses</h3>

        <p>
            <div class="row">
                <div class="col-sm-12">
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.3640627728028!2d15.251169214760994!3d-4.342586696843714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a6a3197e1c63b0f%3A0xbd6fa66c5682a398!2sLedya+Pyramide+Hotel+Kinshasa!5e0!3m2!1sfr!2sfr!4v1502935598763" 
                         width="100%" height="300" frameborder="0">
                        </iframe>   
                    </div>
                </div>
            </div>
        </p>
        
        <ul class="contact-info">
            <li><i class="ti-map"></i> 35 Avenue Nguma , Macampagne, Kinshasa</li>
            <li><i class="ti-mobile"></i>+243 820005454 ; 82005464</li>
            <li><i class="ti-envelope"></i><a href="#">info@pyramide-hotel.com</a></li>
            <li><i class="ti-home"></i><a href="#">www.pyramide-hotel.com</a></li>
        </ul>
    </div>

    <form action="/contact" method="POST" class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea name="" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" value="Send Message" class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
@endsection