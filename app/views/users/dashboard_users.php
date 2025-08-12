<!DOCTYPE html>
<html lang="fr" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>NOCIBE Admin | Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        /* Sidebar styles */
        .admin-sidebar {
            width: 250px;
            height: 100vh;
            background-color: #0d6efd; /* bleu bootstrap */
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            z-index: 1000;
            transition: width 0.3s ease;
        }

        .admin-sidebar.collapsed {
            width: 70px;
        }

        .admin-sidebar .p-4 {
            padding: 1rem !important;
        }

        .admin-sidebar h2 {
            color: white;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            white-space: nowrap;
        }

        .admin-sidebar.collapsed h2 {
            overflow: hidden;
            text-indent: -9999px;
            height: 0;
            margin: 0;
            padding: 0;
        }

        .admin-sidebar .nav-link {
            color: white;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            white-space: nowrap;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background-color: #084298;
            color: white;
            text-decoration: none;
        }

        .admin-sidebar.collapsed .nav-link span {
            display: none;
        }

        /* Main content shifted when sidebar open */
        .main-content {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
            width: calc(100% - 250px);
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .admin-sidebar.collapsed ~ .main-content {
            margin-left: 70px;
            width: calc(100% - 70px);
        }

        /* Navbar styles */
        nav.navbar {
            position: sticky;
            top: 0;
            z-index: 1100;
        }

        /* Avatar styles */
        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
    </style>
</head>
<body class="d-flex">

    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="p-4 vh-100 bg-primary d-flex flex-column">
            <div class="text-center mb-5">
                <h2 class="fw-bold">NOCIBE</h2>
            </div>

            <ul class="nav flex-column gap-2 flex-grow-1">
                <li class="nav-item">
                    <a href="#" class="nav-link active d-flex align-items-center gap-3">
                        <i class="mdi mdi-speedometer fs-5"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center gap-3">
                        <i class="mdi mdi-office-building fs-5"></i>
                        <span>Départements</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link d-flex align-items-center gap-3">
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

    <!-- Main content -->
    <div class="main-content w-100 d-flex flex-column">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-white shadow-sm p-3">
            <div class="container-fluid">
                <button class="navbar-toggler d-lg-none me-3" type="button" aria-label="Toggle sidebar" onclick="toggleSidebar()">
                    <i class="mdi mdi-menu fs-4"></i>
                </button>

                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Dashboard</h5>
                </div>

                <div class="ms-auto d-flex align-items-center gap-4">

                    <div class="position-relative">
                        <i class="mdi mdi-bell-outline fs-4"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </div>

                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">
                                <i class="mdi mdi-account"></i>
                            </div>
                            <span class="ms-2 d-none d-sm-inline">Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                            <li><a class="dropdown-item" href="#"><i class="mdi mdi-account me-2"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="mdi mdi-cog me-2"></i>Paramètres</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="mdi mdi-logout me-2"></i>Déconnexion</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>

        <!-- Page content placeholder -->
        <div class="container-fluid p-4">
            <!-- Ici ton contenu principal -->
            <h2>Contenu principal</h2>
        </div>

    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            document.querySelector('.admin-sidebar').classList.toggle('collapsed');
        }
    </script>
</body>
</html>
