<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CEBAN: Cari Event Bandung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{asset('image/ceban.png')}}" alt="" class="logo">
            </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/events">Events</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/events?cat=seminar">Seminar</a>
                            <a class="dropdown-item" href="/events?cat=concert">Concert</a>
                            <a class="dropdown-item" href="/events?cat=workshop">Workshop</a>
                            <a class="dropdown-item" href="/events?cat=social">Social</a>
                            <a class="dropdown-item" href="/events?cat=competition">Competition</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                    <!-- <button type="button" class="btn btn-outline-success">Create Event!</button> -->
                    @auth
                        @if(\Illuminate\Support\Facades\DB::table('owners')->where('email', Auth::user()->email)->count() > 0)
                            <a class="btn btn-outline-success" href="/event/add">Create Event!</a>
                        @else
                            <a class="btn btn-outline-success" href="/owner/register">Be an Owner!</a>
                        @endif
                    @endauth
                </ul>
                <!-- <button type="button" class="btn btn-success my-2 my-sm-0">Login/Register</button> -->
                @guest
                    <a class="btn btn-success" href="{{route('login')}}" role="button">Login</a>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">My Profile</a>
                            @if(\Illuminate\Support\Facades\DB::table('owners')->where('email', Auth::user()->email)->count() > 0)
                                <a class="dropdown-item" href="/myevents">My Events</a>
                            @endif
                            <a class="dropdown-item" href="/mytickets">My Tickets</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </div>
    </nav>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @yield('content')

    <section id="about_us" class="pb-5">
        <div class="card-body text-center">
            <h4 class="text-white">Tugas Besar Rekayasa Perangkat Lunak <br> <br> CEBAN: Cari Event Bandung </h4>
            <p class="h5 text-white"> David Petra Natanael - 18217011 </p>
            <p class="h5 text-white"> Alfiansyah Mahareksa - 18217022 </p>
            <p class="h5 text-white"> Andre Juliantama - 18217040 </p>
            <p class="h5 text-white"> Vincent - 18217042 </p>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>