<!DOCTYPE html>
<html>
<head>
	<title>You have an upcoming appointment!</title>
</head>
<body>
@php
	$appointment = \App\Appointment::find($id);
@endphp
<h1 style="width: 100%;">Reminder!</h1>
<p style="width: 100%;font-size: 20px">You received this email because you have an upcoming appointment this <b>{{ date('F d, Y', strtotime($appointment->date_time)) }}</b></p>
<p style="width: 100%;padding-top: 40px;margin-bottom: 20px;">If you need to cancel or reschedule this appointment, please contact us:</p>

<h4 style="width: 100%;margin:10px"><b>My OBTouch</b>,</h4>
<h6 style="width: 100%;margin:10px">151, Celestino Gallares St, Tagbilaran City, 6300 Bohol</h6>
<h6 style="width: 100%;margin:10px">+63 949 990 7246</h6>
</body>
</html>