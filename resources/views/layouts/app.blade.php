<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jwplayer.com/libraries/jP6uqMk5.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="{{ asset('vendor/dropzone-5/dist/min/dropzone.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        {{--@yield('content')--}}

        <form action="#">
            <div class="fallback">
                <div class="dropzone" id="myzone"></div>
            </div>
        </form>
        {{--<script src="https://cdn.jwplayer.com/players/Dyv9E7kh-jP6uqMk5.js"></script>--}}


        <div id="myElement"></div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </main>
</div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/dropzone-5/dist/min/dropzone.min.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;

    jwplayer("myElement").setup({
        "playlist": "https://cdn.jwplayer.com/v2/media/pOybiax8",
        "autoPause": {
            "viewability": true
        },
        "floating": {
            "dismissible": true,
        },
        "logo": {
            "file": "https://smevi.com/techskilz/imgs/techskilz logo.svg",
            "link": "https://smevi.com/techskilz/",
            "hide": "true",
            "position": "bottom-right"
        },
        "displayPlaybackLabel": true,
        "nextUpDisplay": true,
    });

    $(function () {

        var myDropzone = new Dropzone("#myzone", {
            url: "{!! route('upload.dropzone') !!}",
            method: "POST",
            chunking: true,
            chunkSize: 1000000,
            maxFilesize: 4000000000,
            forceChunking: true,
            retryChunks: true,
            parallelChunkUploads: false,
            acceptedFiles: "video/*",
            chunksUploaded: function (file, done) {
                // All chunks have been uploaded. Perform any other actions
                let currentFile = file;
                let ext = currentFile.name.substring(currentFile.name.lastIndexOf('.') + 1);

                // This calls server-side code to merge all chunks for the currentFile
                $.ajax({
                    url: '{!! route('concat.dropzone') !!}',
                    method: 'POST',
                    data: {
                        '_token': '{!! csrf_token() !!}',
                        'dzuuid': currentFile.upload.uuid,
                        'chunk_count': currentFile.upload.totalChunkCount,
                        'ext': ext
                    },
                    success: function (data) {
                        uploadToJw(data.path, done)
                    },
                    error: function (msg) {
                        currentFile.accepted = false;
                        myDropzone._errorProcessing([currentFile], msg.responseText);
                    }
                });
            },
            init: function () {
                this.on('sending', function (file, xhr, formData) {
                    formData.append("_token", '{{ csrf_token() }}');
                });
                this.on('uploadprogress', function (file, progress, bytesSent) {
                    progress = bytesSent / file.size * 100;
                    $('.dz-upload').width(progress + "%");
                });
            }
        });

        function uploadToJw(filename, done) {
            $.ajax({
                url: '{!! route('jw.upload') !!}',
                method: 'POST',
                data: {
                    '_token': '{!! csrf_token() !!}',
                    'filename': filename
                },
                success: function (data) {
                    console.log(data);
                    console.log(data.media.key);
                    done();
                },
                error: function (msg) {
                    alert(msg.responseText);
                }
            });
        }

        $("#try").on('click', function () {
            const data = {
                'amount': '5000',
                'currency': 'XAF',
                'invoiceId': '112353',
                'invoiceDetails': '[]',
                'language': 'en',
                'successURL': 'https://google.com',
                'failureURL': 'https://google.com'
            };
            $.ajax({

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
            });
        });

        /*$("#try").on('click', function() {
            const data = {
                '_amount':100,
                '_tel':675230094
            };
            $.ajax({
                url: 'https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml?idbouton=2&typebouton=PAIE&_clP=&_email=info@afrovisiongroup.com&submit.x=104&submit.y=70',
                data: data,
                type: 'GET',
                success: function (data) {
                    console.log(data)
                },
                error: function (xhr, status, error) {
                    console.log(xhr)
                }
            });
        });*/
    });
</script>
@yield('footer_script')

</body>
</html>
