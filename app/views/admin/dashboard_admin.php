<?php 
include_once 'app/models/model.php';
$model = new modeladmin();

$depp = []; 
$dep = $model->recuperer_tous("departements", $ordre = 'DESC');

foreach ($dep as $d) {
    $depp[] = $d['nom_dep']; 
}

$user = [];
$users = $model->recuperer_tous("users", $ordre = 'DESC');

foreach ($users as $us) {
    $user[] = $us['nom_complet']; 
}

?>

<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOCIBE Admin | Dashboard</title>
    <link rel="stylesheet" href="app/desing/css/style.css">
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex">
    <!-- Sidebar -->
    <aside class="admin-sidebar vh-100 position-fixed text-white">
        <div class="p-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold">NOCIBE</h2>
                <small class="text-muted">Admin Dashboard</small>
            </div>
            
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="index.php?action=dashboard" class="nav-link sidebar-link d-flex align-items-center gap-3 text-white p-3 active">
                        <i class="mdi mdi-speedometer fs-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?action=departement"  class="nav-link sidebar-link d-flex align-items-center gap-3 text-white p-3">
                        <i class="mdi mdi-office-building fs-5"></i>
                        <span>Départements</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="index.php?action=modify_users"  class="nav-link sidebar-link d-flex align-items-center gap-3 text-white p-3">
                        <i class="bi bi-arrow-repeat fs-5"></i>
                        <span>Mise à jour Utilisateurs</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="index.php?action=historiques"  class="nav-link sidebar-link d-flex align-items-center gap-3 text-white p-3">
                        <i class="mdi mdi-history fs-5"></i>
                        <span>Historiques</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?action=droit"  class="nav-link sidebar-link d-flex align-items-center gap-3 text-white p-3">
                        <i class="bi bi-key fs-5"></i>
                        <span>Droits</span>
                    </a>
                </li>

                <li class="nav-item mt-4">
                    <a href="index.php?action=logout" class="nav-link sidebar-link d-flex align-items-center gap-3 text-danger p-3">
                        <i class="mdi mdi-logout fs-5"></i>
                        <span>Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content w-100">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg bg-white shadow-sm p-3">
            <div class="container-fluid">
                <button class="navbar-toggler d-lg-none" type="button" onclick="toggleSidebar()">
                    <i class="mdi mdi-menu"></i>
                </button>
                
                <div class="d-flex align-items-center gap-4 ms-auto">
                    <div class="position-relative">
                        <i class="mdi mdi-bell-outline fs-4"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </div>
                    
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown">
                            <div class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-account"></i>
                            </div>
                            <span class="ms-2 d-none d-sm-inline">Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="#">
                                <i class="mdi mdi-account me-2"></i>Profil
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="mdi mdi-cog me-2"></i>Paramètres
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="index.php?action=logout">
                                <i class="mdi mdi-logout me-2"></i>Déconnexion
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container-fluid p-4">
            <div class="row g-4">
                <!-- Stats Cards -->
                <div class="col-md-4">
                    <div class="stats-card bg-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Départements</h6>
                                <h2 class="mb-0 fw-bold"><?php echo count($depp);?></h2>
                            </div>
                            <div class="bg-primary bg-opacity-10 p-3 rounded">
                                <i class="mdi mdi-office-building-marker text-primary fs-3"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="text-success"> </span>
                            <span class="text-muted ms-2"></span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="stats-card bg-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Utilisateurs</h6>
                                <h2 class="mb-0 fw-bold"><?php echo count($user);?></h2>
                            </div>
                            <div class="bg-success bg-opacity-10 p-3 rounded">
                                <i class="mdi mdi-account-group text-success fs-3"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <span class="text-success"> </span>
                            <span class="text-muted ms-2"></span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="stats-card bg-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted mb-2">Activités</h6>
                                <h2 class="mb-0 fw-bold">00</h2>
                            </div>
                            <div class="bg-warning bg-opacity-10 p-3 rounded">
                                <i class="mdi mdi-chart-bar text-warning fs-3"></i>
                            </div>
                           

                        </div>
                        <div class="mt-3">
    <span class="text-danger"> </span>
    <span class="text-muted ms-2" style="visibility: hidden;"></span>
</div>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title mb-0">Activité Récente</h5>
                                <a href="#" class="btn btn-sm btn-outline-primary">Voir tout</a>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Utilisateur</th>
                                            <th>Action</th>
                                            <th>Heure</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-xs me-2 bg-primary text-white">
                                                        <i class="mdi mdi-account"></i>
                                                    </div>
                                                    <span>John Doe</span>
                                                </div>
                                            </td>
                                            <td>Connexion</td>
                                            <td>10:42 AM</td>
                                            <td><span class="badge bg-success">Succès</span></td>
                                        </tr>
                                        <!-- Plus d'activités... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Actions Rapides</h5>
                            
                            <div class="d-grid gap-3">
                                <a href="index.php?action=add_dep" class="btn btn-primary d-inline-flex align-items-center">
                                <i class="mdi mdi-plus me-2"></i>
                                Nouveau Département
                                </a>
                                <a href="index.php?action=add_users" class="btn btn-secondary d-inline-flex align-items-center">
                                <i class="mdi mdi-account-plus me-2"></i>
                                Ajouter Utilisateur
                                </a>

                                <a href="#" class="btn btn-success d-inline-flex align-items-center">
                                <i class="mdi mdi-account-plus me-2"></i>
                                Exporter Données
                                </a>
                            </div>
                            
                            <hr class="my-4">
                            
                            <h6 class="mb-3">Statut Système</h6>
                            <div class="d-flex align-items-center mb-2">
                                <div class="flex-grow-1">
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" style="width: 85%"></div>
                                    </div>
                                </div>
                                <small class="text-muted ms-3">85%</small>
                            </div>
                            <small class="text-muted">Performance globale du système</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="app/desing/js/script.js"></script>
</body>
</html>