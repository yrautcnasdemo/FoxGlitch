// Affichage volumes totale enregistrés
document.addEventListener('DOMContentLoaded', () => {
    const volumeInput = document.getElementById('volumeCount');
    const volumesPanel = document.querySelector('.volumes-panel');
    const selectAllCheckbox = document.getElementById('collection');

    let globalVolumeId = 1; // Compteur global pour IDs uniques

    volumeInput.addEventListener('input', () => {
        volumesPanel.innerHTML = ''; // On vide le panel à chaque changement
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
                checkbox.name = `volume-${globalVolumeId}`;

                const label = document.createElement('label');
                label.htmlFor = `volume-${globalVolumeId}`;
                label.textContent = `vol.${String(i).padStart(3, '0')}`;

                globalVolumeId++; // On incrémente le compteur global

                bookVolDiv.appendChild(checkbox);
                bookVolDiv.appendChild(label);
                volDiv.appendChild(bookVolDiv);
                volumesPanel.appendChild(volDiv);
            }
        }
    });

    // Fonction "Select All"
    selectAllCheckbox.addEventListener('change', () => {
        const checkboxes = volumesPanel.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
    });
});
