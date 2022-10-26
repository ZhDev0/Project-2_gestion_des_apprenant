<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="../css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Edit Promotion</title>
    <style>
        .card-header {
            display: flex;
        }

        .marquee {
            height: calc(100vh - 95vh);
            background: black;
            color: white;
        }

        .showall {
            text-decoration: none
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

    {{-- <marquee behavior="" direction="">Follow ZhDev0 On GitHub !!</marquee> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 mt-5 pt-5">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <span class="material-icons">edit</span>&nbsp;Edit promotion
                    </div>
                    <div class="card-body">
                        {{-- @if (Session::has('promo_created'))
                            <div class="alert alert-success">
                                {{ Session::get('promo_created') }}
                            </div>
                        @endif --}}
                        @if (Session::has('promo_updated'))
                            <div class="alert alert-success">
                                {{ Session::get('promo_updated') }}
                            </div>
                        @endif
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom_promo">Nom De la Promotion</label>
                                <input type="text" name="nom_promo" id="nom_promo" value="{{ $promo->Nom_promo }}"
                                    class="form-control">
                                {{-- @error('nom_promo')
                                    <div class="alert alert-danger mt-4">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <button type="submit" class="btn mt-3 btn-success w-100">Modifier</button>
                            <a href="{{ route('promo.get') }}" class="btn bg-black text-white w-100 mt-2">Annuler</a>
                        </form>
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
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
