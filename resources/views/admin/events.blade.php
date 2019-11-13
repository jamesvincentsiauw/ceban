@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                    <div class="card-header">Events</div>
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
                                    </tr>
                                </thead>
                                <?php $i=1 ?>
                                @foreach($events as $item)
                                    <tbody>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item->eventName}}</td>
                                        <td>
                                            <img width="350px" src="{{ url($item->poster) }}">
                                        </td>
                                        <td>{{$item->category}}</td>
                                        <td>{{$item->location}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->organizationName}}</td>
                                        <td>{{$item->eventDate}}</td>
                                        <td>{{$item->availableMaximumTicket}}</td>
                                        <td>
                                            <button data-toggle="modal" data-target="#editItemForm" datasrc="{{$item}}" style="font-weight: bold;color: cornflowerblue;text-decoration: none;border: none;background-color: transparent;cursor: pointer">Edit</button>
                                            <a href="/events/buy/{{$item->eventID}}"style="font-weight: bold;color: forestgreen;text-decoration: none;border: none;background-color: transparent;cursor: pointer">Buy Ticket</a>
                                            <form method="post" action="events/delete/{{$item->eventID}}">
                                                @csrf
                                                <input type="submit" style="font-weight: bold;color: red;text-decoration: none;border: none;background-color: transparent;cursor: pointer" value="Delete"/>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <?php $i++ ?>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="newItem">
                        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#newItemForm" style="background-color: lightblue; color: black; font-weight: 500">
                            Add new Event
                        </button>
                        <a class="btn btn-success btn-lg" href="/ceban" style="background-color: indianred; color: black; font-weight: 500">
                            Back to Dashboard
                        </a>
                    </div>
                </div>
                <div class="modal fade" id="newItemForm" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="labelModalKu">Add new Event</h4>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form method="post" enctype="multipart/form-data" action="/events">
                                    @csrf
                                    <div class="form-group">
                                        <label for="eventName">Nama Event</label>
                                        <input type="text" class="form-control" name="eventName" placeholder="Nama Event" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="poster">Poster Event</label>
                                        <input type="file" class="form-control" name="poster" placeholder="Poster Event" accept="image/*" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Kategori</label>
                                        <select class="custom-select" name="category" required>
                                            <option value="Workshop">Workshop</option>
                                            <option value="Seminar">Seminar</option>
                                            <option value="Concert">Concert</option>
                                            <option value="Other">Other..</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Lokasi</label>
                                        <input type="text" class="form-control" name="location" placeholder="Lokasi Event" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Harga Tiket Masuk</label>
                                        <input type="number" class="form-control" name="price" placeholder="Harga Tiket Masuk" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="eventDate">Tanggal Pelaksanaan</label>
                                        <input type="date" class="form-control" name="eventDate" placeholder="Tanggal Pelaksanaan" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="availableMaximumTicket">Jumlah Tiket</label>
                                        <input type="number" class="form-control" name="availableMaximumTicket" placeholder="Jumlah Tiket" required/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <input type="submit" class="btn btn-primary submitBtn" value="Tambah"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editItemForm" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="labelModalKu">Edit Event Data</h4>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <center><a class="alert alert-danger">Maaf, Fitur Ini Belum Tersedia</a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection