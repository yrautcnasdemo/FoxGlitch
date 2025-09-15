<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générer des volumes</title>
</head>
<body>
    <label for="numberInput">Nombre de volumes :</label>
    <input type="number" id="numberInput" min="1" max="350">
    <div id="checkboxContainer"></div>

    <script>
        const numberInput = document.getElementById('numberInput');
        const checkboxContainer = document.getElementById('checkboxContainer');

        numberInput.addEventListener('input', () => {
            checkboxContainer.innerHTML = ''; // reset

            const numberOfCheckboxes = parseInt(numberInput.value, 10);

            if (!isNaN(numberOfCheckboxes) && numberOfCheckboxes > 0) {
                for (let i = 1; i <= numberOfCheckboxes; i++) {
                    // Crée la checkbox
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.id = `volume-${i}`;   // ID unique : volume-1, volume-2...
                    checkbox.name = 'volumes[]';   // pour envoyer en BDD (tableau)

                    // Crée le label
                    const label = document.createElement('label');
                    label.htmlFor = checkbox.id;
                    label.textContent = ` vol.${String(i).padStart(3, '0')}`;

                    // Ajoute dans le conteneur
                    const lineBreak = document.createElement('br');
                    checkboxContainer.appendChild(checkbox);
                    checkboxContainer.appendChild(label);
                    checkboxContainer.appendChild(lineBreak);
                }
            }
        });
    </script>
</body>
</html>
