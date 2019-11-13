@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User</div>

                    <div class="table-responsive">
                        <table class="table"  style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Tanggal Bergabung</th>
                            </tr>
                            </thead>
                            <?php $i=1 ?>
                            @foreach($users as $item)
                                <tbody>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                                </tbody>
                                <?php $i++ ?>
                            @endforeach
                        </table>
                    </div>
                    <div class="pagination text-center" style="justify-content: center">{{ $users->links() }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a class="btn btn-success btn-lg" href="/ceban" style="background-color: indianred; color: black; font-weight: 500">
                Back to Dashboard
            </a>
        </div>
@endsection