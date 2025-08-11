<?php 
include_once 'app/models/model.php';
$model = new modeladmin();

$depp = []; 
$dep = $model->recuperer_tous("departements", $ordre = 'DESC');

foreach ($dep as $d) {
    $depp[] = $d['nom_dep']; 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="text-center text-primary mb-4">Ajouter un utilisateur</h3>

                        <?php if (empty($erreur)) { ?>
                            <div class="alert alert-danger text-center py-2 mb-3">
                                <?= $erreur ?>
                            </div>
                        <?php } ?>

                        <form method="POST" action="index.php?action=add_users">
                            
                            <div class="mb-3">
                                <label class="form-label">Nom Complet :</label>
                                <input type="text" name="nom_complet" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email :</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Poste :</label>
                                <input type="text" name="poste" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Département d'intervenance :</label>
                                <select name="departement" id="departement" class="form-select">
                                    <option value="">Sélectionner une option</option>
                                    <?php
                                    if(isset($depp)){
                                        foreach ($depp as $value){ ?>
                                            <option value="<?php echo htmlspecialchars($value); ?>">
                                                <?php echo htmlspecialchars($value); ?>
                                            </option>
                                    <?php } } ?>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Droit d'utilisateur :</label>
                                <select name="droit" id="droit" class="form-select">
                                    <option value="">Sélectionner un droit</option>
                                    <option value="validation">Droit de validation</option>
                                    <option value="edite">Droit de création</option>
                                    <option value="impression">Droit d'impression</option>
                                    <option value="tous">Tous les droits</option>
                                </select>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-plus-circle me-2"></i> Ajouter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-3 text-muted small">© <?= date('Y') ?> NOCIBE Admin</p>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
