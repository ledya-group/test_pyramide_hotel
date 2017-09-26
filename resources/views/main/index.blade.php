@extends('main.layouts.app')

@section('content')
    @include("main.partials.carousel")

    <div class="wrap">
        <div class="container">
            <div class="row">
                <div id="availability">
                    <form action="/reservation" method="GET" class="input-daterange">
                        <div class="a-col">
                            <section>
                                <select class="cs-select cs-skin-border" name="room">
                                    <option value="" disabled selected>Choix type chambre</option>
                                    <option value="1">Présidentielle</option>
                                    <option value="2">Junior</option>
                                    <option value="3">Prestige</option>
                                    <option value="4">Luxe</option>
                                    <option value="5">Standard</option>
                                </select>
                            </section>
                        </div>
                        
                        <div class="a-col alternate">
                            <div class="input-field">
                                <label for="date-start">Arrivé</label>
                                <input type="text" class="form-control" id="date-start" name="checkin">
                            </div>
                        </div>

                        <div class="a-col alternate">
                            <div class="input-field">
                                <label for="date-end">Départ</label>
                                <input type="text" class="form-control" id="date-end" name="checkout">
                            </div>
                        </div>

                        <button style="border:none"  type="submit" class="a-col action">
                            <a href="#">
                                <span>Vérifier la</span>
                                Disponibilité
                            </a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--  @include("main.partials.meta_data")  --}}

    {{--  <div id="featured-hotel" class="fh5co-bg-color">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Nos chambres</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @include('main.partials.home_rooms')
            </div>

        </div>
    </div>  --}}

    @include("main.partials.global_view_services")

    {{--  @include("main.partials.testimonials")  --}}

    {{--  @include("main.global_view_blog")  --}}
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