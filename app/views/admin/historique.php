<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Liste Laissez-passer validés</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet" />
    <style>
        body {
            background: #f8f9fa;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 0.15);
        }

        .card-header {
            background: linear-gradient(90deg, #0d6efd 0%, #4dabf7 100%);
            color: white;
            font-weight: 600;
            font-size: 1.25rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-new {
            background-color: #fff;
            color: #0d6efd;
            border-radius: 2rem;
            font-weight: 600;
            padding: 0.375rem 1.25rem;
            border: 2px solid #0d6efd;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-new:hover {
            background-color: #0d6efd;
            color: white;
        }

        table thead tr th {
            vertical-align: middle;
            text-align: center;
        }

        table tbody tr td {
            vertical-align: middle;
            text-align: center;
        }

        table tbody tr:hover {
            background-color: #e9f2ff;
            cursor: pointer;
            transition: background-color 0.25s ease-in-out;
        }

        .btn-download {
            border-radius: 2rem;
            padding-left: 1rem;
            padding-right: 1rem;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <div class="card mx-auto" style="max-width: 900px;">
        <div class="card-header">
            <div><i class="mdi mdi-file-document-box-outline me-2"></i>Laissez-passer validés</div>
            <button class="btn btn-new btn-sm">
                <i class="mdi mdi-plus me-1"></i> Nouveau
            </button>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>Département</th>
                            <th>Date de création</th>
                            <th>Date d’impression</th>
                            <th>Télécharger</th>
                        </tr>
                    </thead>
                    <tbody id="tableLaissezPasser">
                        <tr>
                            <td>Informatique</td>
                            <td>2025-08-05</td>
                            <td>2025-08-08</td>
                            <td>
                                <a href="documents/laissez-passer1.pdf" class="btn btn-outline-success btn-sm btn-download">
                                    <i class="mdi mdi-download me-1"></i> Télécharger
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted text-end small">
            
        </div>
    </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const tableBody = document.getElementById("tableLaissezPasser");

    function ajouterLaissezPasser(departement, dateCreation, dateImpression, lien) {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${departement}</td>
            <td>${dateCreation}</td>
            <td>${dateImpression}</td>
            <td>
                <a href="${lien}" class="btn btn-outline-success btn-sm btn-download">
                    <i class="mdi mdi-download me-1"></i> Télécharger
                </a>
            </td>
        `;
        tableBody.appendChild(row);
    }

    // Exemple d'ajout dynamique
    ajouterLaissezPasser("Sécurité", "2025-08-07", "2025-08-10", "documents/laissez-passer2.pdf");
</script>
</body>
</html>
