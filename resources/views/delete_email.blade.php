@extends('layouts.app')

<button id="begin">Begin</button>

@section('footer_script')
    <script>

        $('#begin').on('click', function () {
            for (let i = 0; i < data.length; i++) {
                deleteAlert(data[i]['recipients'][0].address);
            }
        });

        function deleteAlert(email) {
            console.log(email);
            $.ajax({

                url: '{!! route('delete_alerts') !!}',
                data: {email: email, _token: '{!! csrf_token() !!}'},
                type: 'POST',
                success: function (data) {
                    console.log(data.message);
                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                }
            });
        }

        const data = [];

        /*$.ajax({

            url: 'http://localhost/unified-pay/public/api/payment/initialize/EQtQ7IjnI1hWcvq53449BculY27U60kSCnyxerD0iMUUMb0O',
            data: data,
            type: 'POST',
            success: function (data) {
                if (data.status === 'success') {
                    window.location.href = data.link;
                } else {
                    console.log(data);
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr)
            }
        });*/
    </script>
@endsection