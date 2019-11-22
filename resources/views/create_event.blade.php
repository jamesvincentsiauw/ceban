@extends('layouts.layout')
@section('content')
    <section id="create_event" class="pb-5">
        <div class="container">
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
            <h1>Create Your Event</h1>
            <form action="/event/add" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-3">
                        <div class="text-center">
                            <h6>Upload a photo for your event</h6>
                            <input type="file" name="poster" class="form-control" required>
                        </div>
                    </div>
                    <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                        <h3>Event Details</h3>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Event Name</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="eventName" type="text" placeholder="ex: BIST League 2.0" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Category</label>
                            <div class="col-lg-8">
                                <select name="category" class="custom-select">
                                    <option value="Workshop">Workshop</option>
                                    <option value="Seminar">Seminar</option>
                                    <option value="Concert">Concert</option>
                                    <option value="Social">Social</option>
                                    <option value="Competition">Competition</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Event Location</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="location" type="text" placeholder="ex: Bandung" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Event Date</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="eventDate" type="date" placeholder="ex: 15-12-2012" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-8">
                                <textarea rows="5" class="form-control" name="description" type="text" placeholder="ex: Mini Concert ITB Jazz 2019" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Organization Name</label>
                            <div class="col-md-8">
                                <input class="form-control" name="organizationName" type="text" value="{{$owner[0]->organizationName}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Price</label>
                            <div class="col-md-8">
                                <input class="form-control" name="price" type="text" placeholder="ex: 0 / ex: 100000" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Maximum Ticket</label>
                            <div class="col-md-8">
                                <input class="form-control" name="availableMaximumTicket" type="number" placeholder="999 for Infinite" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="Create Event!">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection