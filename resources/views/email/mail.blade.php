<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Mail</title>
</head>
<body>

		<h2>Hello: </h2>
		<p>SomeOne with Name: {{ $username }} and email: {{ $useremail }}</p>
		<p>Sent message: {{$msg}}</p>


{{--		<h2>{{ $username }}</h2> Said:--}}
		{{--<a href="mailto:{{$useremail}}">{{$username}}</a>.<br>--}}
		{{--<p>{{ $msg }}</p>--}}
</body>
</html>