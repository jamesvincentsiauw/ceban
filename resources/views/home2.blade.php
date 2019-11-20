@extends('layouts.layout')
@section('content')
    <section id="search_bar" class="pb-5">
        <div class="container">
            <h5 class="section-title-up h1">Explore great events in Bandung!</h5>
        </div>
        <div class="mb-5">
            <div class="col-lg-8 mx-auto">
                <div class="bg-white p-5 rounded shadow">
                    <form action="">
                        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                            <div class="input-group">
                                <form action="/search">
                                    <input type="search" name="keyword" id="keyword" placeholder="What event are you searching for?"
                                           aria-describedby="button-addon1" class="form-control border-0 bg-light">
                                    <div class="input-group-append">
                                        <button id="button-addon1"class="btn btn-link text-primary"><i
                                                    class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="featured_event" class="pb-5">
        <div class="container">
            <h5 class="section-title-down h2">FEATURED EVENTS</h5>
            <div class="row">
                @foreach($events as $item)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="{{asset('image/bislig.png')}}" alt="card image"></p>
                                        <h4 class="card-title">{{$item->eventName}}</h4>
                                        <p class="card-text">{{str_limit($item->description, 70)}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">{{$item->eventName}}</h4>
                                        <p class="card-text">{{$item->description}}</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <button type="button" class="btn btn-outline-success">Buy Ticket!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="category" class="pb-5">
        <div class="container">
            <h5 class="section-title-down h2">PICK A CATEGORY</h5>
            <div class="cards-list">
                <a href="/events?cat=seminar" class="card-link">
                    <div class="card_category 1" href="/events?cat=seminar">
                        <div class="card_image"><img src="{{asset('image/seminar.jpg')}}"/></div>
                        <div class="card_title title-white">
                            <p>Seminar</p>
                        </div>
                    </div>
                </a>
                <a href="/events?cat=concert" class="card-link">
                    <div class="card_category 2" href="/events?cat=concert">
                        <div class="card_image"><img src="{{asset('image/concert.jpg')}}"/></div>
                        <div class="card_title title-white">
                            <p>Concert</p>
                        </div>
                    </div>
                </a>
                <a href="/events?cat=workshop" class="card-link">
                    <div class="card_category 3" href="/events?cat=workshop">
                        <div class="card_image"><img src="{{asset('image/workshop.jpg')}}"/></div>
                        <div class="card_title title-white">
                            <p>Workshop</p>
                        </div>
                    </div>
                </a>
                <a href="/events?cat=social" class="card-link">
                    <div class="card_category 4" href="/events?cat=social">
                        <div class="card_image"><img src="{{asset('image/social.jpg')}}"/></div>
                        <div class="card_title title-white">
                            <p>Social</p>
                        </div>
                    </div>
                </a>
                <a href="/events?cat=competition" class="card-link">
                    <div class="card_category 1">
                        <div class="card_image"><img src="{{asset('image/competition.jpg')}}"/></div>
                        <div class="card_title title-white">
                            <p>Competition</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
<script>
    function search() {
        var q = document.getElementById('keyword').value;
        window.location.href('/search/'+q)
    }
</script>