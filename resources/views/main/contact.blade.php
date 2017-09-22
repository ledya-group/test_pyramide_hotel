@extends('main.layouts.app')

@section('content')
    <div class="fh5co-parallax" style="background-image: url(images/chambres/luxe.jpg); height:300px;" data-stellar-background-ratio="0.5" style="height:300px;">
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
            Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
        </p>
        
        <ul class="contact-info">
            <li><i class="ti-map"></i>198 West 21th Street, Suite 721 New York NY 10016</li>
            <li><i class="ti-mobile"></i>+ 1235 2355 98</li>
            <li><i class="ti-envelope"></i><a href="#">info@yoursite.com</a></li>
            <li><i class="ti-home"></i><a href="#">www.yoursite.com</a></li>
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