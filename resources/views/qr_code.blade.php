{{--
<div class="visible-print text-center">
    {!! QrCode::format('png')->merge('https://img.freepik.com/free-vector/abstract-colorful-wave-transparent-stylish_1055-7049.jpg?size=338&ext=jpg', .3, true)
    ->generate('Lenya Hope NembiiSolo  MonLenya Hope NembiiSolo  Mon'); !!}
    <p>Scan me to return to the original page.</p>
</div>
--}}

<img src="data:image/png;base64, {{ $image }} ">



{!! QrCode::wiFi([
	'encryption' => 'WPA/WEP',
	'ssid' => 'SSID of the network',
	'password' => 'Password of the network',
	'hidden' => 'Whether the network is a hidden SSID or not.'
]) !!}