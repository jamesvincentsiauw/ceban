@extends('layouts.app')

@section('content')
    <div class="navigation">
        <ul>
            <li>
                Show Registered Users
                <a href="/users"><b>HERE</b></a>
            </li>
            <li>
                Show Registered Owners
                <a href="/owners"><b>HERE</b></a>
            </li>
            <li>
                Show Registered Events
                <a href="/events"><b>HERE</b></a>
            </li>
            <li>
                My Tickets
                <a href="/mytickets"><b>HERE</b></a>
            </li>
        </ul>
    </div>
@endsection