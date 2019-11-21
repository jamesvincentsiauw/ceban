@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">My Tickets</div>

                    <div class="table-responsive">
                        <table class="table"  style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Event</th>
                                <th>Tanggal Event</th>
                                <th>Lokasi</th>
                                <th>Ticket</th>
                            </tr>
                            </thead>
                            <?php $i=1 ?>
                            @foreach($data as $item)
                                <tbody>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->eventName}}</td>
                                    <td>{{$item->eventDate}}</td>
                                    <td>{{$item->location}}</td>
                                    <td>
                                        <a href="/download/{{$item->participantID}}" class="btn btn-outline-primary">Download Ticket</a>
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
        <br><br><br>
    </div>
@endsection