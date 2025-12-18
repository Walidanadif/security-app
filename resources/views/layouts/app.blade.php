<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/agents">SecurityApp</a>

        <div>
            <a href="/agents" class="btn btn-outline-light btn-sm">Agents</a>

            <form action="/logout" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-outline-danger btn-sm">
                    Déconnexion
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- CONTENU -->
<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>