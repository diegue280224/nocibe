<?php 
include_once 'app/models/model.php';
$model = new modeladmin();

$user = [];
$users = $model->recuperer_tous("users", $ordre = 'DESC');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mise à jour des utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
.custom-thead {
    background-color: #360debff !important; /* bleu clair */
    color: #084298 !important; /* texte bleu foncé */
    font-weight: 600;
    text-transform: uppercase;
}


.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f8f9fa !important; /* gris clair */
}

.table-hover tbody tr:hover {
    background-color: #b6d4fe !important; /* bleu très clair */
    cursor: default;
}

</style>

</head>
<body class="bg-light">
 
<div class="container my-5">
    <h2 class="mb-4 text-center">Liste des utilisateurs inscrits</h2>

    <div class="table-responsive shadow-sm rounded bg-white p-3">
    <table class="table table-striped table-hover align-middle">
        <thead class="custom-thead text-center">
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Date modification</th>
                <th>Heure modification</th>
                <th>Actions</th>
            </tr>
        </thead>

                <tbody>
            <?php
            $n = 1;
            foreach ($users as $us) { ?>
                <tr class="text-center">
                    <td><?= htmlspecialchars($n) ?></td>
                    <td><?= htmlspecialchars($us['nom_complet']) ?></td>
                    <td><?= htmlspecialchars($us['email']) ?></td>
                    <td><?= htmlspecialchars($us['date_enregistrement']) ?></td>
                    <td><?= htmlspecialchars($us['heure']) ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm me-2 btn-modifier" data-index="<?= $n ?>" 
                                data-nom="<?= htmlspecialchars($us['nom_complet'], ENT_QUOTES) ?>"
                                data-email="<?= htmlspecialchars($us['email'], ENT_QUOTES) ?>"
                                data-poste="<?= htmlspecialchars($us['poste'] ?? '', ENT_QUOTES) ?>"
                                data-departement="<?= htmlspecialchars($us['departement'] ?? '', ENT_QUOTES) ?>"
                                data-droit="<?= htmlspecialchars($us['droit'] ?? '', ENT_QUOTES) ?>"
                        >Modifier</button>
                        <button class="btn btn-danger btn-sm"><a href="index.php?action=delete_users">Supprimer</a></button>
                    </td>
                </tr>
                <tr class="form-row" id="form-row-<?= $n ?>" style="display:none; background-color:#eef4ff;">
                    <td colspan="6">
                        <form class="form-modification" action="index.php?action=update_users" method="POST" data-index="<?= $n ?>">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-3">
                                    <label>Nom complet</label>
                                    <input type="text" name="nom_complet" class="form-control nom_complet" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control email" required>
                                </div>
                                <div class="col-md-2">
                                    <label>Poste</label>
                                    <input type="text" name="poste" class="form-control poste">
                                </div>
                                <div class="col-md-2">
                                    <label>Département d'intervenance</label>
                                    <input type="text" name="departement" class="form-control departement">
                                </div>
                                <div class="col-md-2">
                                    <label>Droit d'utilisateur</label>
                                    <select name="droit" class="form-select droit">
                                        <option value="droit">Droit de validation</option>
                                        <option value="utilisateur">Droit de création</option>
                                        <option value="admin">Droit d'impression</option>
                                        <option value="superadmin">Tous les droits</option>
                                    </select>  
                                </div>  
                            </div>
                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-success btn-sm">Approuvé</button>
                                <button type="button" class="btn btn-secondary btn-sm btn-annuler">Annuler</button>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php $n++; } ?>
            </tbody>

            <!-- lignes -->
        </tbody>
    </table>
</div>


    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.btn-modifier').forEach(btn => {
    btn.addEventListener('click', function() {
        const index = this.dataset.index;
        const formRow = document.getElementById('form-row-' + index);

        // Remplir le formulaire avec les données du bouton
        formRow.querySelector('.nom_complet').value = this.dataset.nom;
        formRow.querySelector('.email').value = this.dataset.email;
        formRow.querySelector('.poste').value = this.dataset.poste;
        formRow.querySelector('.departement').value = this.dataset.departement;
        formRow.querySelector('.droit').value = this.dataset.droit;

        // Afficher le formulaire
        formRow.style.display = 'table-row';
    });
});

// Gestion du bouton annuler
document.querySelectorAll('.btn-annuler').forEach(btn => {
    btn.addEventListener('click', function() {
        const formRow = this.closest('tr.form-row');
        formRow.style.display = 'none';
    });
});

// Gestion de la soumission du formulaire
document.querySelectorAll('.form-modification').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const index = this.dataset.index;

        // Récupère les données modifiées
        const nom = this.querySelector('.nom_complet').value;
        const email = this.querySelector('.email').value;
        const poste = this.querySelector('.poste').value;
        const departement = this.querySelector('.departement').value;
        const droit = this.querySelector('.droit').value;

        // TODO : ici tu peux faire un appel AJAX pour envoyer ces données au serveur
        // ou soumettre via un formulaire classique, ou autre

        alert(`Mise à jour pour l'utilisateur #${index}:\nNom: ${nom}\nEmail: ${email}\nPoste: ${poste}\nDépartement: ${departement}\nDroit: ${droit}`);

        // Masquer le formulaire après validation
        this.closest('tr.form-row').style.display = 'none';

        // Optionnel : mettre à jour la ligne du tableau (en JS) ou recharger la page
    });
});
</script>

</body>
</html>
