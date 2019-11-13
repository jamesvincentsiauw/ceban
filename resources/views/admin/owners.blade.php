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
                    <div class="card-header">Owner</div>

                    <div class="table-responsive">
                        <table class="table"  style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Penyelenggara</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php $i=1 ?>
                            @foreach($owners as $item)
                                <tbody>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->organizationName}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @if($item->email == \Illuminate\Support\Facades\Auth::user()->email)
                                        <button data-toggle="modal" data-target="#editItemForm" datasrc="{{$item}}" style="font-weight: bold;color: cornflowerblue;text-decoration: none;border: none;background-color: transparent;cursor: pointer">Edit</button>
                                            <form method="post" action="owners/delete/{{$item->email}}">
                                                @csrf
                                                <input type="submit" style="font-weight: bold;color: red;text-decoration: none;border: none;background-color: transparent;cursor: pointer" value="Delete"/>
                                            </form>
                                        @endif
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
                        Be an Owner
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
                            <h4 class="modal-title" id="labelModalKu">Be an Owner</h4>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <p class="statusMsg"></p>
                            <form method="post" action="/owners/add">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Pemilik</label>
                                    <input type="text" class="form-control" name="nama" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" disabled/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" disabled/>
                                </div>
                                <div class="form-group">
                                    <label for="organizationName">Nama Organisasi</label>
                                    <input type="text" class="form-control" name="organizationName" placeholder="Nama Organisasi" required/>
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