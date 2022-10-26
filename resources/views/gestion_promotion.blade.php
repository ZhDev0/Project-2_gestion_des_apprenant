<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="../css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Gestion Promotion</title>
    <style>
        .card-header {
            display: flex;
        }

        .marquee {
            height: calc(100vh - 95vh);
            background: black;
            color: white;
        }

        .link-container {
            display: flex;
            justify-content: space-between;
            align-content: center;
        }

        .modal {
            display: none;
        }

        .modal-back {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, .25)
        }

        .modal-container {
            position: fixed;
            top: 50%;
            left: 50%;
            padding: 25px;
            border-radius: 5px;
            /* background-image: url({{ asset('image/wp10021529-red-pill-wallpapers.jpg') }}); */
            background: rgba(0, 0, 0, 0.931);
            background-position: center;
            width: 920px;
            color: white;
            height: 500px;
            transform: translate(-50%, -50%);
        }
        .modal-container > p {
            text-align: center;
            margin-top: 20%;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="marquee">
        <marquee behavior="scroll" direction="right" class="mx-auto" scrollamount="12">
            <span id="target"></span>
            <span id="cursor"></span>
        </marquee>
        {{-- <marquee behavior="scroll" direction="right" scrollamount="12"></marquee> --}}
    </div>
    <div class="modal" id="modal">
        <div class="modal-back"></div>

        <div class="modal-container">
            <p> Welcome to <span style="color: orange">Project-2</span> Presented By<span style="color: green"> OmarZR</span><a href="#" id="modal-close">[X]</a>
            </p>
            <br />
        </div>
    </div>

    {{-- <marquee behavior="" direction="">Follow ZhDev0 On GitHub !!</marquee> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 mt-5 pt-5">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <span class="material-icons">manage_accounts</span>&nbsp;Gestion Promotion
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <div class="link-container mb-3">
                                <a href="{{ route('promo.index') }}" class="btn btn-primary">Ajouter Promotion</a>
                                {{-- <form action="" method=""> --}}
                                <div class="form-group">
                                    <input type="text" id="search" name="search" class="form-control"
                                        placeholder="Chercher Promotion">
                                </div>
                                {{-- </form> --}}
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nom De Promotion</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach ($promos as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->Nom_promo }}</td>
                                        <td><a href="gestion_apprenant/{{ $value->id }}"
                                                class="btn btn-primary w-100">View</a></td>
                                        <td><a href="edit_promotion/{{ $value->id }}"
                                                class="btn btn-success">Modifier</a></td>
                                        <td><a href="delete_promotion/{{ $value->id }}"
                                                class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                @endforeach
                                @if (Session::has('promo_deleted'))
                                    <div class="alert alert-warning">
                                        {{ Session::get('promo_deleted') }}
                                    </div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        /*** Plugin ***/

        (function($) {
            // writes the string
            //
            // @param jQuery $target
            // @param String str
            // @param Numeric cursor
            // @param Numeric delay
            // @param Function cb
            // @return void
            function typeString($target, str, cursor, delay, cb) {
                $target.html(function(_, html) {
                    return html + str[cursor];
                });

                if (cursor < str.length - 1) {
                    setTimeout(function() {
                        typeString($target, str, cursor + 1, delay, cb);
                    }, delay);
                } else {
                    cb();
                }
            }

            // clears the string
            //
            // @param jQuery $target
            // @param Numeric delay
            // @param Function cb
            // @return void
            function deleteString($target, delay, cb) {
                var length;

                $target.html(function(_, html) {
                    length = html.length;
                    return html.substr(0, length - 1);
                });

                if (length > 1) {
                    setTimeout(function() {
                        deleteString($target, delay, cb);
                    }, delay);
                } else {
                    cb();
                }
            }

            // jQuery hook
            $.fn.extend({
                teletype: function(opts) {
                    var settings = $.extend({}, $.teletype.defaults, opts);

                    return $(this).each(function() {
                        (function loop($tar, idx) {
                            // type
                            typeString($tar, settings.text[idx], 0, settings.delay, function() {
                                // delete
                                setTimeout(function() {
                                    deleteString($tar, settings.delay,
                                        function() {
                                            loop($tar, (idx + 1) % settings
                                                .text.length);
                                        });
                                }, settings.pause);
                            });

                        }($(this), 0));
                    });
                }
            });

            // plugin defaults
            $.extend({
                teletype: {
                    defaults: {
                        delay: 100,
                        pause: 5000,
                        text: []
                    }
                }
            });
        }(jQuery));


        /*** init ***/

        $('#target').teletype({
            text: [
                `Presented By OmarZR

                :)`
            ]
        });

        $('#cursor').teletype({
            text: ['|', ' '],
            delay: 0,
            pause: 500
        });
    </script>
    <script>
        document.getElementById('modal').style.display = 'block'
        window.addEventListener('scroll', function(e) {
            setTimeout(() => {
                document.getElementById('modal').style.display = 'block'
            }, 2000)
        });
        let modalAlreadyShowed = false

        window.addEventListener('scroll', function(e) {
            if (!modalAlreadyShowed) {
                setTimeout(() => {
                    document.getElementById('modal').style.display = 'block'
                }, 2000)
                modalAlreadyShowed = true
            }
        });
        document.getElementById('modal-close').addEventListener('click', function(e) {
            document.getElementById('modal').style.display = 'none'
        })
    </script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/Search.js') }}"></script>
</body>

</html>
