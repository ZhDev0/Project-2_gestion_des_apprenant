<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="../css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Ajouter apprenant</title>
    <style>
        .card-header {
            display: flex;
        }
        .marquee {
            height: calc(100vh - 95vh);
            background: black;
            color: white;
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
                        <span class="material-icons">new_label</span>&nbsp;Ajouter apprenant
                    </div>
                    <div class="card-body">
                        @if (Session::has('apprenant_created'))
                            <div class="alert alert-success">
                                {{ Session::get('apprenant_created') }}
                            </div>
                        @endif
                        <form action="{{ route('apprenant.ajouter') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="prenom">Prenom</label>
                                <input type="text" name="prenom" id="prenom" class="form-control">
                            </div>
                            @error('prenom')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control">
                            </div>
                            @error('nom')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn mt-3 btn-primary w-100">Envoyer</button>
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
