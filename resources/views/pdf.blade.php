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
        <div align="justify">Here are the details about your event.</div>
        <div align="justify">
            <table style="width: 407px;" border="0">
                <tbody>
                    <tr>
                        <td style="width: 211.5px;"><span style="font-size: medium;">Event Name</span></td>
                        <td style="width: 10px;"><span style="font-size: medium;">:</span></td>
                        <td style="width: 312px;">{{$event->eventName}}</td>
                    </tr>
                    <tr>
                        <td style="width: 211.5px;"><span style="font-size: medium;">Date</span></td>
                        <td style="width: 10px;"><span style="font-size: medium;">:</span></td>
                        <td style="width: 312px;">{{$event->eventDate}}</td>
                    </tr>
                    <tr>
                        <td style="width: 211.5px;">Location</td>
                        <td style="width: 10px;"><span style="font-size: medium;">:</span></td>
                        <td style="width: 312px;">{{$event->location}}</td>
                    </tr>
                    <tr>
                        <td style="width: 211.5px;">Your Name</td>
                        <td style="width: 10px;"><span style="font-size: medium;">:</span></td>
                        <td style="width: 312px;">{{$participant->participantName}}</td>
                    </tr>
                    <tr>
                        <td style="width: 211.5px;"><span style="font-size: medium;">Phone Number</span></td>
                        <td style="width: 10px;"><span style="font-size: medium;">:</span></td>
                        <td style="width: 312px;">{{$participant->phone}}</td>
                    </tr>
                    <tr>
                        <td style="width: 211.5px;"><span style="font-size: medium;">E-mail</span></td>
                        <td style="width: 10px;"><span style="font-size: medium;">:</span></td>
                        <td style="width: 312px;"><span style="font-size: medium;">{{$participant->participantEmail}}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br><br>
        Scan This QR Code for Registration
        <div class="justify-content-center">
            <img src="{{public_path($participant->ticketFile)}}" width="200px" alt="">
        </div>
    </div>
</center>
</body>
</html>