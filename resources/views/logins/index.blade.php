<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Connexions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }
        .container {
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Historique des Connexions</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom de l'utilisateur</th>
                            <th>Email</th>
                            <th>Type de Compte</th>
                            <th>Date et Heure du Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logins as $login)
                            <tr>
                                <td>{{ $login->user->name }}</td>
                                <td>{{ $login->email }}</td>
                                <td>{{ ucfirst($login->type) }}</td>
                                <td>{{ $login->login_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
