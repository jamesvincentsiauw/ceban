@extends('layouts.layout')
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="mx-auto col-sm-6">
                <div class="card">
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
                    <div class="card-header">
                        <h4 class="mb-0">Event Organizer Information</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="/owner/register" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Organization Name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="organizationName" type="text" placeholder="ex: Sumringah Organizer" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Telephone Number</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="organizationPhone" type="text" placeholder="ex: 022-7126992" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="email" type="email" placeholder="ex: ayamkangkung@kandang.com" value="{{Auth::user()->email}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Location</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="location" type="text" placeholder="ex: Jl. Ganesha No. 10 Bandung" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="reset" class="btn btn-secondary" value="Cancel">
                                    <input type="submit" class="btn btn-success" value="Submit Application">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection