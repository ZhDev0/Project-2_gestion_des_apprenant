{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            background-image: url({{ asset('image/wp10021529-red-pill-wallpapers.jpg') }});
            /* background-repeat: no-repeat; */
            background-size: cover;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 25%;
            color: green;
            font-size: 40px;
            font-family: bold;
            background: black
        }
        .button {
            float: right;
            margin-top: 10em
        }
    </style>

</head>

<body>
    <div class="content">
        <span id="target"></span>
        <span id="cursor"></span>
    </div>
    <div class="button" onclick="button()"><button><img src="{{ asset('image/rabbit.png') }}" alt="rabbit" width="60px"></button></div>

    <!-- used for the blinking cursor effect -->

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
                `$ Hello User...

                Welcome To The Real World !!

                Follow The White Rabbit`
            ]
        });

        $('#cursor').teletype({
            text: ['|', ' '],
            delay: 0,
            pause: 500
        });

        $button = document.querySelector('.button');
        function button() {
            window.location = 'gestion_promotion';
        }
    </script>
</body>

</html>
<link rel="stylesheet" href="{{ asset('css/formAddStudent.css') }}"> --}}
