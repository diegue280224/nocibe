<div class="container mt-4">
    <h3>Gestion des Départements</h3>

    <!-- Bouton pour afficher le formulaire d'ajout département -->
    <button id="showFormBtn" class="btn btn-info mb-3">
        <i class="mdi mdi-plus me-2"></i> Ajouter Département
    </button>

    <!-- Formulaire pour créer un département (caché au départ) -->
    <div id="formContainer" class="card p-3 mb-3" style="display: none;">
        <h5>Créer un nouveau département</h5>
        <form id="departementForm">
            <div class="mb-3">
                <label class="form-label">Nom du département</label>
                <input type="text" id="nomDepartement" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>

    <!-- Zone où les départements vont apparaître -->
    <div id="departementsContainer"></div>
</div>

<script>
    const showFormBtn = document.getElementById("showFormBtn");
    const formContainer = document.getElementById("formContainer");
    const departementForm = document.getElementById("departementForm");
    const departementsContainer = document.getElementById("departementsContainer");

    // Afficher/Masquer le formulaire département
    showFormBtn.addEventListener("click", () => {
        formContainer.style.display = (formContainer.style.display === "none") ? "block" : "none";
    });

    // Lorsqu'on valide le formulaire département
    departementForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const nom = document.getElementById("nomDepartement").value;

        // Création bloc département
        const depCard = document.createElement("div");
        depCard.className = "card mb-4 p-3";

        depCard.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0">${nom}</h5>
                <button class="btn btn-success btn-sm add-intervenant-btn">
                    <i class="mdi mdi-plus"></i> Ajouter Intervenant
                </button>
            </div>
            <table class="table table-bordered table-hover mb-2">
                <thead class="table-light">
                    <tr>
                        <th>Nom complet</th>
                        <th>Poste</th>
                        <th>Droits</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="form-intervenant mt-3" style="display:none;">
                <h6>Ajouter un intervenant</h6>
                <form class="intervenantForm">
                    <div class="mb-2">
                        <input type="text" class="form-control" name="nom" placeholder="Nom complet" required>
                    </div>
                    <div class="mb-2">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control" name="poste" placeholder="Poste" required>
                    </div>
                    <div class="mb-2">
                        <select class="form-select" name="droit" required>
                            <option value="">Sélectionner un droit</option>
                            <option>Droit de validation</option>
                            <option>Droit de création</option>
                            <option>Droit d'impression</option>
                            <option>Tous les droits</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                </form>
            </div>
        `;

        const addIntervenantBtn = depCard.querySelector(".add-intervenant-btn");
        const formIntervenant = depCard.querySelector(".form-intervenant");
        const intervenantForm = depCard.querySelector(".intervenantForm");
        const tbody = depCard.querySelector("tbody");

        // Bouton afficher formulaire intervenant
        addIntervenantBtn.addEventListener("click", () => {
            formIntervenant.style.display = (formIntervenant.style.display === "none") ? "block" : "none";
        });

        // Validation formulaire intervenant
        intervenantForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const nomIntervenant = this.nom.value;
    const posteIntervenant = this.poste.value;
    const droitIntervenant = this.droit.value;

    const row = document.createElement("tr");
    row.innerHTML = `
        <td>${nomIntervenant}</td>
        <td>${posteIntervenant}</td>
        <td>${droitIntervenant}</td>
    `;

    tbody.appendChild(row);
    this.reset();
    formIntervenant.style.display = "none";
});

        // Ajouter le département
        departementsContainer.appendChild(depCard);

        // Réinitialiser formulaire département
        departementForm.reset();
        formContainer.style.display = "none";
    });
</script>

<!-- Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
