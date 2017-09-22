@extends('main.layouts.app')

@section('content')
    @include("main.partials.carousel")

    <div id="featured-hotel" class="fh5co-bg-color">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Nos chambres</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @include('main.partials.room_data')
            </div>

        </div>
    </div>
@endsection