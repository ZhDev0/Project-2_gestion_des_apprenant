<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="../css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Edit Apprenant</title>
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
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="marquee">
        <marquee behavior="scroll" direction="right" class="mx-auto" scrollamount="12">Presented By OmarZR :)</marquee>
        {{-- <marquee behavior="scroll" direction="right" scrollamount="12"></marquee> --}}
    </div>

    {{-- <marquee behavior="" direction="">Follow ZhDev0 On GitHub !!</marquee> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 mt-5 pt-5">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <span class="material-icons">edit</span>&nbsp;Edit Apprenant
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
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom_promo"></label>
                                <input type="text" name="prenom_promo" id="prenom_promo"
                                    value="{{ $apprenant->Prenom }}" class="form-control">
                                {{-- @error('nom_promo')
                                    <div class="alert alert-danger mt-4">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <label for="nom_promo">Nom De la Promotion</label>
                                <input type="text" name="nom_promo" id="nom_promo" value="{{ $apprenant->Nom }}"
                                    class="form-control">
                                {{-- @error('nom_promo')
                                    <div class="alert alert-danger mt-4">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <label for="nom_promo">Nom De la Promotion</label>
                                <input type="text" name="email_promo" id="email_promo"
                                    value="{{ $apprenant->email }}" class="form-control">
                                {{-- @error('nom_promo')
                                    <div class="alert alert-danger mt-4">{{ $message }}</div>
                                @enderror --}}
                            </div>
                            <button type="submit" class="btn mt-3 btn-success w-100">Modifier</button>
                            <a href="{{ route('apprenant.get') }}" class="showall">Show All</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
