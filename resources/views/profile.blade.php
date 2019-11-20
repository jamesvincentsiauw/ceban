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
                        <h4 class="mb-0">User Information</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" action="/profile" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" value="{{$user->name}}" disabled required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Telephone Number</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="phone" type="text" value="{{$user->phone}}" disabled required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="email" type="email" value="{{$user->email}}" disabled required>
                                </div>
                            </div>
                            <div id="edit" class="form-group row" >
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="button" class="btn btn-success" onclick="edit()" value="Edit Profile">
                                </div>
                            </div>
                            <div id="save" class="form-group row" hidden>
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">
                                    <input type="reset" class="btn btn-secondary" onclick="cancel()" value="Cancel">
                                    <input type="submit" class="btn btn-success" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function edit() {
        document.getElementById('save').hidden = false;
        document.getElementById('edit').hidden = true;
        var cells = document.getElementsByClassName("form-control");
        for (var i = 0; i < cells.length; i++) {
            cells[i].disabled = false;
        }
    }
    function cancel() {
        document.getElementById('save').hidden = true;
        document.getElementById('edit').hidden = false;
        var cells = document.getElementsByClassName("form-control");
        for (var i = 0; i < cells.length; i++) {
            cells[i].disabled = true;
        }
    }
</script>