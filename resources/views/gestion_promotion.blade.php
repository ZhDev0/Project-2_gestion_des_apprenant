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
                        <span class="material-icons">manage_accounts</span>&nbsp;Gestion Promotion
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <div class="link-container mb-3">
                                <a href="{{ route('promo.index') }}" class="btn btn-primary">Ajouter Promotion</a>
                                {{-- <form action="" method=""> --}}
                                    <div class="form-group">
                                        <input type="text" id="search" name="search" class="form-control" placeholder="Chercher Promotion">
                                    </div>
                                {{-- </form> --}}
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nom De Promotion</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach ($promos as $value)
                                <tr>
                                    <th scope="row">{{ $value->id }}</th>
                                    <td>{{ $value->Nom_promo }}</td>
                                    <td><a href="edit_promotion/{{$value->id}}" class="btn btn-success">Modifier</a></td>
                                    <td><a href="delete_promotion/{{ $value->id }}" class="btn btn-danger">Supprimer</a></td>
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
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/Search.js') }}"></script>
</body>

</html>
