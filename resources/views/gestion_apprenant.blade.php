<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="../css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Gestion Apprenant</title>
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
    </style>
</head>

<body>
    <div class="marquee">
        <marquee behavior="scroll" direction="right" class="mx-auto" scrollamount="12"><span id="target"></span>
            <span id="cursor"></span>
        </marquee>
        {{-- <marquee behavior="scroll" direction="right" scrollamount="12"></marquee> --}}
    </div>

    {{-- <marquee behavior="" direction="">Follow ZhDev0 On GitHub !!</marquee> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5 pt-5">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <span class="material-icons">manage_accounts</span>&nbsp;Gestion Apprenant
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <div class="link-container mb-3">
                                <a href="{{ route('apprenant.ajouter') }}" class="btn btn-primary">Ajouter Apprenant</a>
                                {{-- <form action="" method=""> --}}
                                {{-- Start Combox --}}
                                <select class="browser-default custom-select">
                                    {{-- @foreach ($promotionid as $value) --}}
                                    <option selected="">Choisissez Le Promotion</option>
                                    <option value="">Promotion 1</option>
                                    <option value="">Promotion 2</option>
                                    <option value="">Promotion 3</option>
                                    {{-- @endforeach --}}
                                </select>
                                {{-- End Combox --}}
                                <div class="form-group">
                                    <input type="text" id="searcha" name="searcha" class="form-control"
                                        placeholder="Chercher Promotion">
                                </div>
                                {{-- </form> --}}
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>

                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach ($apprenantt as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>{{ $value->Prenom }}</td>
                                        <td>{{ $value->Nom }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td><a href="{{ url('edit_apprenant') }}/{{ $value->id }}"
                                                class="btn btn-success">Modifier</a></td>
                                        <td><a href="{{ url('delete_apprenant') }}/{{ $value->id }}"
                                                class="btn btn-danger">Supprimer</a></td>
                                    </tr>
                                @endforeach
                                @if (Session::has('apprenant_deleted'))
                                    <div class="alert alert-warning">
                                        {{ Session::get('apprenant_deleted') }}
                                    </div>
                                @endif
                            </tbody>
                            <a href="{{ route('promo.get') }}" class="btn bg-dark text-white">Back</a>
                            {{-- promo.get --}}
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
        // ComboBox
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/SearchA.js') }}"></script>
</body>

</html>
