<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<center>
    <div class="container">
        <div class="justify-content-center">
            <h1 class="font-weight-bold">Ticket for {{$participant->participantName}}</h1>
        </div><br><br><br>
        Scan This QR Code for Registration
        <div class="justify-content-center">
            <img src="{{public_path($participant->ticketFile)}}" width="200px" alt="">
        </div>
    </div>
</center>
</body>
</html>