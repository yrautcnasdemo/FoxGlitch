document.addEventListener('DOMContentLoaded', () => {
    const volumeInput = document.getElementById('volumeCount');
    const volumesPanel = document.querySelector('.volumes-panel');
    const selectAllCheckbox = document.getElementById('collection');

    let globalVolumeId = 1;

    volumeInput.addEventListener('input', () => {
        volumesPanel.innerHTML = ''; 
        const numberOfVolumes = parseInt(volumeInput.value, 10);

        if (!isNaN(numberOfVolumes) && numberOfVolumes > 0) {
            for (let i = 1; i <= numberOfVolumes; i++) {
                const volDiv = document.createElement('div');
                volDiv.className = 'vol';

                const bookVolDiv = document.createElement('div');
                bookVolDiv.className = 'book-vol';

                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.id = `volume-${globalVolumeId}`;
                checkbox.name = 'volumes[]';  // <-- Important pour PHP
                checkbox.value = i;           // <-- Le numéro du volume

                const label = document.createElement('label');
                label.htmlFor = `volume-${globalVolumeId}`;
                label.textContent = `vol.${String(i).padStart(3, '0')}`;

                globalVolumeId++;

                bookVolDiv.appendChild(checkbox);
                bookVolDiv.appendChild(label);
                volDiv.appendChild(bookVolDiv);
                volumesPanel.appendChild(volDiv);
            }
        }
    });

    // "Select All"
    selectAllCheckbox.addEventListener('change', () => {
        const checkboxes = volumesPanel.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
    });
});




// SUPPRESSION DE LIVRE DANS LE TABLEAU DE GESTION + AFFICHAGE MESSAGE CONFIRMATION
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-link").forEach(link => {
        link.addEventListener("click", function(event) {
            const title = this.dataset.title; // récupère le titre du livre
            if (!confirm(`Are you sure you want to delete "${title}" ?`)) {
                event.preventDefault(); // bloque la navigation si annulation
            }
        });
    });
});





// SWAP TABLE DANS LE TABLEAU DE GESTION ENTRE MANGA ET COMICS + REAFFICHAGE DES COULEUR - STRIP - DU TABLEAU
document.addEventListener("DOMContentLoaded", () => {
    const mangaBtn = document.getElementById("mangaBtn");
    const comicsBtn = document.getElementById("comicsBtn");
    const tableBody = document.querySelector(".backoffice-table-edit tbody");
    const rows = tableBody.querySelectorAll("tr");

    function filterCategory(category) {
        let visibleIndex = 0;
        rows.forEach(row => {
            if (row.dataset.category === category) {
                row.style.display = "";
                // zébrure
                row.style.background = (visibleIndex % 2 === 0)
                    ? "linear-gradient(90deg,#41132C, #651830)"
                    : "#252525";
                visibleIndex++;
            } else {
                row.style.display = "none";
            }
        });
    }

    // Par défaut → on montre les mangas
    filterCategory("Manga");

    mangaBtn.addEventListener("click", (e) => {
        e.preventDefault();
        filterCategory("Manga");
    });

    comicsBtn.addEventListener("click", (e) => {
        e.preventDefault();
        filterCategory("Comics");
    });
});
