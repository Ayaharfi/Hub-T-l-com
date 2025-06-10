<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Projet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome (pour les icônes) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            padding-top: 60px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.06);
        }
        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            font-weight: 600;
            font-size: 1.2rem;
            color: #333;
        }
        .btn i {
            margin-right: 6px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-project-diagram"></i> Détails du projet
                    </div>
                    <div>
                        <a href="{{ route('projets.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h2 class="mb-3">{{ $projet->nom }}</h2>

                    <p><strong>Type:</strong> 
                        <span class="badge {{ $projet->type === 'normal' ? 'bg-primary' : 'bg-success' }}">
                            {{ $projet->type }}
                        </span>
                    </p>

                    <p><strong>Admin:</strong> {{ $projet->admin_nom }}</p>

                    <p><strong>Description:</strong><br>
                        {{ $projet->description ?: 'Aucune description fournie.' }}
                    </p>

                    <p><strong>Créé le:</strong> {{ $projet->created_at->format('d/m/Y H:i') }}</p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <a href="{{ route('taches.create', ['projet_id' => $projet->id]) }}" class="btn btn-success w-100">
                                <i class="fas fa-plus-circle"></i> Créer une tâche
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('projets.index') }}" class="btn btn-secondary w-100">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                        </div>
                    </div>

                    <hr>

                    <h4 class="mt-4">
                        <i class="fas fa-tasks"></i> Tâches
                    </h4>

                    <div class="list-group mt-3">
                        @forelse($projet->taches as $tache)
                            <div class="list-group-item">
                                <strong>{{ $tache->titre }}</strong>
                                <span class="badge bg-{{ $tache->statut === 'terminé' ? 'success' : ($tache->statut === 'en cours' ? 'warning' : 'secondary') }}">
                                    {{ $tache->statut }}
                                </span>
                                <p class="mb-1">{{ $tache->description }}</p>
                            </div>
                        @empty
                            <div class="text-center py-3 text-muted">
                                <i class="fas fa-info-circle"></i> Aucune tâche pour le moment
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
