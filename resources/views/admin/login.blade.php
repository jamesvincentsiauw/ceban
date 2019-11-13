@extends('admin.layout')

@section('content')
    <fieldset style="width:300px; margin:100px auto">
        <legend>Form Login</legend>
        <form action="/admin/login" method="post">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <input type="submit">
        </form>
    </fieldset>
@endsection