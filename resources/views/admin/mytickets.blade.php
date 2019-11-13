@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                </tr>
                                </tbody>
                                <?php $i++ ?>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a class="btn btn-success btn-lg" href="/ceban" style="background-color: indianred; color: black; font-weight: 500">
                Back to Dashboard
            </a>
        </div>
@endsection