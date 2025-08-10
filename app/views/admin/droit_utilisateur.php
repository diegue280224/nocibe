<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion des droits utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Amélioration visibilité cases à cocher */
        input[type="checkbox"] {
            appearance: none;
            width: 22px;
            height: 22px;
            border: 2px solid #007bff;
            border-radius: 4px;
            position: relative;
            cursor: pointer;
            background-color: white;
        }
        input[type="checkbox"]:checked {
            background-color: #28a745;
            border-color: #28a745;
        }
        input[type="checkbox"]:checked::after {
            content: "✔";
            color: white;
            font-size: 16px;
            position: absolute;
            top: -1px;
            left: 3px;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="mb-4 text-center">Gestion des droits utilisateurs</h2>

    <div class="table-responsive shadow-sm rounded bg-white p-3">
        <table class="table table-striped table-hover align-middle text-center" id="tableDroits">
            <thead class="table-dark">
                <tr>
                    <th>Utilisateur</th>
                    <th>Écriture</th>
                    <th>Confirmation</th>
                    <th>Impression</th>
                    <th>Tous</th>
                    <th>Date modification</th>
                    <th>Heure modification</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jean Dupont</td>
                    <td><input type="checkbox" class="chk-ecriture" disabled /></td>
                    <td><input type="checkbox" class="chk-confirmation" disabled /></td>
                    <td><input type="checkbox" class="chk-impression" disabled /></td>
                    <td><input type="checkbox" class="chk-tous" disabled /></td>
                    <td>2025-08-10</td>
                    <td>14:35</td>
                    <td>
                        <button class="btn btn-warning btn-sm btn-modifier">Modifier</button>
                    </td>
                </tr>
                <tr>
                    <td>Marie Curie</td>
                    <td><input type="checkbox" class="chk-ecriture" checked disabled /></td>
                    <td><input type="checkbox" class="chk-confirmation" disabled /></td>
                    <td><input type="checkbox" class="chk-impression" checked disabled /></td>
                    <td><input type="checkbox" class="chk-tous" disabled /></td>
                    <td>2025-08-09</td>
                    <td>09:12</td>
                    <td>
                        <button class="btn btn-warning btn-sm btn-modifier">Modifier</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Formulaire modal -->
<div class="modal fade" id="modalModifier" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier les droits</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form id="formModifier">
                    <div class="mb-3">
                        <label class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="nomUtilisateur" required readonly />
                    </div>
                    <fieldset class="mb-3">
                        <legend class="form-label">Droits</legend>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="droitEcriture" value="ecriture" />
                            <label class="form-check-label" for="droitEcriture">Écriture</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="droitConfirmation" value="confirmation" />
                            <label class="form-check-label" for="droitConfirmation">Confirmation</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="droitImpression" value="impression" />
                            <label class="form-check-label" for="droitImpression">Impression</label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="droitTous" value="tous" />
                            <label class="form-check-label fw-bold" for="droitTous">Tous</label>
                        </div>
                    </fieldset>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const modal = new bootstrap.Modal(document.getElementById("modalModifier"));
    let currentRow = null;

    // Récupération des cases à cocher dans la modale
    const chkEcriture = document.getElementById("droitEcriture");
    const chkConfirmation = document.getElementById("droitConfirmation");
    const chkImpression = document.getElementById("droitImpression");
    const chkTous = document.getElementById("droitTous");

    // Ouvrir modal et remplir données
    document.querySelectorAll(".btn-modifier").forEach(btn => {
        btn.addEventListener("click", () => {
            currentRow = btn.closest("tr");
            document.getElementById("nomUtilisateur").value = currentRow.cells[0].innerText;

            // Remplir les droits dans la modale selon la table
            const isTous = currentRow.querySelector(".chk-tous").checked;
            chkTous.checked = isTous;

            chkEcriture.checked = currentRow.querySelector(".chk-ecriture").checked;
            chkConfirmation.checked = currentRow.querySelector(".chk-confirmation").checked;
            chkImpression.checked = currentRow.querySelector(".chk-impression").checked;

            // Si "Tous" est coché, décocher les droits individuels dans modale (pour respecter la règle)
            if (isTous) {
                chkEcriture.checked = false;
                chkConfirmation.checked = false;
                chkImpression.checked = false;
            }

            modal.show();
        });
    });

    // Gestion de l’exclusion mutuelle dans la modale
    // Si on coche "Tous", décocher les 3 autres
    chkTous.addEventListener("change", () => {
        if (chkTous.checked) {
            chkEcriture.checked = false;
            chkConfirmation.checked = false;
            chkImpression.checked = false;
        }
    });

    // Si on coche un droit individuel, décocher "Tous"
    [chkEcriture, chkConfirmation, chkImpression].forEach(chk => {
        chk.addEventListener("change", () => {
            if (chk.checked) {
                chkTous.checked = false;
            }
        });
    });

    // Validation du formulaire
    document.getElementById("formModifier").addEventListener("submit", e => {
        e.preventDefault();
        if (!currentRow) return;

        const nom = document.getElementById("nomUtilisateur").value;

        currentRow.cells[0].innerText = nom;

        // Réinitialisation des cases dans la table
        currentRow.querySelector(".chk-ecriture").checked = false;
        currentRow.querySelector(".chk-confirmation").checked = false;
        currentRow.querySelector(".chk-impression").checked = false;
        currentRow.querySelector(".chk-tous").checked = false;

        if (chkTous.checked) {
            // Si droit global coché, on coche uniquement "tous"
            currentRow.querySelector(".chk-tous").checked = true;
        } else {
            // Sinon on coche les droits individuels cochés
            if (chkEcriture.checked) currentRow.querySelector(".chk-ecriture").checked = true;
            if (chkConfirmation.checked) currentRow.querySelector(".chk-confirmation").checked = true;
            if (chkImpression.checked) currentRow.querySelector(".chk-impression").checked = true;
        }

        // Mise à jour date et heure
        const now = new Date();
        currentRow.cells[5].innerText = now.toISOString().split('T')[0];
        currentRow.cells[6].innerText = now.toTimeString().split(' ')[0].slice(0,5);

        modal.hide();
    });
</script>

</body>
</html>
