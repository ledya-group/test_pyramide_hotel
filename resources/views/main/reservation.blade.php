@extends('main.layouts.app')

@section('content')
    <div class="fh5co-parallax" style="background-image: url(images/image-6.jpg); height:300px;" data-stellar-background-ratio="0.5" style="height:300px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table" style="height:300px;">
                    <div class="fh5co-intro fh5co-table-cell"  style="height:300px;">
                        <h1 class="text-center">Reserver une chambre</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-md-offset-2" style="padding-top:3em">
        <h3>Formulaire de reservation</h3>

        <p>
            Entrer les informations demandées
        </p>
    </div>

    <?php
        $rooms = [
            '1' => 'Présidentielle',
            '2' => 'Junior',
            '3' => 'Prestige',
            '4' => 'Luxe',
            '5' => 'Standard',
        ];
    ?>

    <form action="/reservation" method="POST" class="col-md-8 col-md-offset-2">
        {{ csrf_field() }}

        <div class="col-md-12">
            <div class="form-group">
                <select class="form-control" name="room">
                    <option disabled selected>Chambre</option>

                    @foreach($rooms as $id => $room)
                        <option {{ (request('room') == $id)? "selected":"" }} value="{{ $id }}">{{ $room }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <select class="form-control" name="title">
                    <option disabled selected>Civilité</option>
                    <option>M.</option>
                    <option>Mme.</option>
                    <option>Mlle.</option>
                    <option>Dr.</option>
                    <option>Prof.</option>
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Prenom" name="firstname">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nom" name="lastname">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group input-daterange">
                    <input type="text" class="form-control" value="{{ request('checkin')? request('checkin'):'' }}" placeholder="Arrivé" id="checkin" name="checkin">

                    <div class="input-group-addon">&nbsp; &mdash;  &nbsp;</div>

                    <input type="text" class="form-control" value="{{ request('checkout')? request('checkout'):'' }}" id="checkout" placeholder="Départ" name="checkout">
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Occupant" name="occupant">
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <select class="form-control" name="country">
                            <option disabled selected>Pays</option>
                            <option>Congo - Kinshasa</option>
                            <option>Congo - Brazzaville</option>
                            <option>Angola</option>
                            <option>Afrique du Sud</option>
                            <option>Angola</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ville" name="town">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <input type="tel" class="form-control" placeholder="Telephone" name="phone_number">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <textarea name="message" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group">
                <input type="submit" value="Envoyer les informations" class="btn btn-primary">
                <input type="submit" value="Annuler la reservation" class="btn btn-danger">
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(function () {
            $('.input-daterange').datepicker({
                format: "dd/mm/yyyy",
                startDate: "+0d",
                language: "fr",
                todayHighlight: true
            });
        });
    </script>
@endsection