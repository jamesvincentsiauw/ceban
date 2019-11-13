@extends('layouts.app')
@section('content')
    <div class="form-check">
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
            <div class="card-header">
                Purchase Ticket
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="/events/buy/{{$event->eventID}}">
                    @csrf
                    <div class="form-group">
                        <label for="eventID">ID Event</label>
                        <input type="text" class="form-control" name="eventID" value="{{$event->eventID}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="eventName">Nama Event</label>
                        <input type="text" class="form-control" name="eventName" value="{{$event->eventName}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <input type="text" class="form-control" name="category" value="{{$event->category}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input type="text" class="form-control" name="location" value="{{$event->location}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Tiket Masuk</label>
                        <input type="text" class="form-control" name="price" value="{{$event->price}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="eventDate">Tanggal Pelaksanaan</label>
                        <input type="text" class="form-control" name="eventDate" placeholder="{{$event->eventDate}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Peserta<a style="color: darkred; font-weight: bold">*</a></label>
                        <input type="text" class="form-control" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="name">Email Peserta<a style="color: darkred; font-weight: bold">*</a></label>
                        <input type="text" class="form-control" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon<a style="color: darkred; font-weight: bold">*</a></label>
                        <input type="text" class="form-control" name="phone" placeholder="Nomor Telepon" required/>
                    </div>
                    <div class="form-group">
                        <label for="qty">Jumlah Pembelian Tiket <a style="color: darkred; font-weight: bold">*</a></label>
                        <input type="number" class="form-control" name="qty" placeholder="Jumlah Pembelian Tiket" required/>
                    </div>
                    <div class="modal-footer">
                        <a href="/events" class="btn btn-default" >Cancel</a>
                        <input type="submit" class="btn btn-primary submitBtn" value="Purchase"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection