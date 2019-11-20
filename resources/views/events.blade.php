@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg" style="margin-bottom: 20px">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @elseif ($message = Session::get('alert'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bold">My Events</div>
                    <div class="table-responsive">
                        <table class="table"  style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Event</th>
                                <th>Poster</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Harga Tiket</th>
                                <th>Penyelenggara</th>
                                <th>Tanggal Event</th>
                                <th>Jumlah Tiket</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php $i=1 ?>
                            @foreach($events as $item)
                                <tbody>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->eventName}}</td>
                                    <td>
                                        <img width="150px" src="{{ url($item->poster) }}">
                                    </td>
                                    <td>{{$item->category}}</td>
                                    <td>{{$item->location}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->organizationName}}</td>
                                    <td>{{$item->eventDate}}</td>
                                    <td>{{$item->availableMaximumTicket}}</td>
                                    <td>
                                        <a href="/events/buy/{{$item->eventID}}" style="font-weight: bold;color: forestgreen;text-decoration: none;border: none;background-color: transparent;cursor: pointer">Buy Ticket</a>
                                    </td>
                                </tr>
                                </tbody>
                                <?php $i++ ?>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection