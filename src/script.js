/*////// MODAL LOGIN-REGISTRER ///////*/
window.onload = () => {
    // On récupère tous les boutons d'ouverture de modale
    const modalButtons = document.querySelectorAll("[data-toggle=modal]");

    for (let button of modalButtons) {
        button.addEventListener("click", function (e) {
            // On empêche la navigation
            e.preventDefault();

            // On récupère le data-target
            let target = this.dataset.target;

            // On récupère la bonne modale
            let modal = document.querySelector(target);
            // On affiche la modale en ajoutant la class "show"
            modal.classList.add("show");

            // On récupère les boutons de fermeture
            const modalClose = modal.querySelectorAll("[data-dismiss=form]");
            for (let close of modalClose) {
                close.addEventListener("click", () => {
                    modal.classList.remove("show");
                });
            }

            //On gère la fermeture lors du click sur la zone grise
            modal.addEventListener("click", function(){
                this.classList.remove("show");
            });
            //On évite la propagation du click d'un enfant a son parent, car sans ca, la modal ferme si on click dessus
            modal.children[0].addEventListener("click", function(e){
                e.stopPropagation();
            });
        });
    }

    // Pour passer de la modal Login à Register
    const createAccButton = document.querySelector(".create-acc");
    const loginModal = document.querySelector("#modal");
    const registerModal = document.querySelector("#modal2");

    createAccButton.addEventListener("click", function (e) {
        e.preventDefault();
        loginModal.classList.remove("show");
        registerModal.classList.add("show");
    });

    // Pour passer de la modal Register à Login
    const loginButton = document.querySelector(".loged-modal");

    loginButton.addEventListener("click", function (e) {
        e.preventDefault();
        registerModal.classList.remove("show");
        loginModal.classList.add("show");
    });
}









/*////// AUDIO PLAYING FRIEND LIST //////*/
document.querySelectorAll('.dial-icon').forEach(ppFriend => {
    const hoverSound = ppFriend.closest('.bloc-fl-unique').querySelector('.hover-sound');
    ppFriend.addEventListener('click', () => {
        hoverSound && (hoverSound.currentTime = 0, hoverSound.play());
    });
});








/*////// SLIDER-OPENING MANGA TABLE //////*/
let bookTable = document.querySelector(".user-manga-panel");
let mangaBtnSlide = document.querySelector(".btn-list");

bookTable.style.transition = "height 0.7s ease-in-out";

function slidingBook1(event) {
    event.preventDefault();
    if (bookTable.style.height !== "200px") {
        bookTable.style.height = "200px"; 
    } else if (bookTable.style.height === "200px") { 
        bookTable.style.height = "1200px";
    }
}
mangaBtnSlide.addEventListener("click", slidingBook1);


/* Comics Table */
let bookTable2 = document.querySelector(".user-comics-panel");
let comicsBtnSlide = document.querySelector(".btn-list2");

bookTable2.style.transition = "height 0.7s ease-in-out";

function slidingBook2(event) {
    event.preventDefault();
    if (bookTable2.style.height !== "200px") {
        bookTable2.style.height = "200px"; 
    } else if (bookTable2.style.height === "200px") { 
        bookTable2.style.height = "1200px";
    }
}
comicsBtnSlide.addEventListener("click", slidingBook2);



////////////////////////////////////////////////////////////////////////////////
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











document.addEventListener('DOMContentLoaded', () => {

  function createVolumesRow(bookRow) {
    // si déjà créé juste après, retourne cet élément
    const next = bookRow.nextElementSibling;
    if (next && next.classList.contains('volumes-row')) return next;

    const tdCount = bookRow.querySelectorAll('td').length || 4;
    const tr = document.createElement('tr');
    tr.className = 'volumes-row';
    const td = document.createElement('td');
    td.colSpan = tdCount;

    const panel = document.createElement('div');
    panel.className = 'volumes-panel';

    const grid = document.createElement('div');
    grid.className = 'volumes-grid';

    panel.appendChild(grid);
    td.appendChild(panel);
    tr.appendChild(td);

    // insert after the book row
    bookRow.parentNode.insertBefore(tr, bookRow.nextSibling);
    return tr;
  }

  function renderVolumes(bookRow, trVolumes) {
    const panel = trVolumes.querySelector('.volumes-panel');
    const grid = trVolumes.querySelector('.volumes-grid');

    // read data
    const count = parseInt(bookRow.dataset.volumeCount, 10) || 0;
    let owned = [];
    try {
      owned = JSON.parse(bookRow.dataset.owned || "[]");
      // normalize to strings for comparison
      owned = owned.map(v => String(v));
    } catch(e) {
      owned = [];
    }

    // clear grid
    grid.innerHTML = '';

    for (let i = 1; i <= count; i++) {
      const sq = document.createElement('div');
      sq.className = 'vol-square';

      const dot = document.createElement('span');
      dot.className = 'vol-dot ' + (owned.includes(String(i)) ? 'owned' : 'missing');

      const label = document.createElement('span');
      label.textContent = `vol.${String(i).padStart(3, '0')}`;

      sq.appendChild(dot);
      sq.appendChild(label);

      // optional: add a title attribute or click handler to toggle owned locally
      sq.title = owned.includes(String(i)) ? 'Owned' : 'Missing';
      grid.appendChild(sq);
    }

    // Smooth open: we toggle class and let CSS transition. To make animation smooth, we set exact max-height:
    panel.classList.remove('open');
    panel.style.maxHeight = '0px';

    // wait a tick so transition applies
    requestAnimationFrame(() => {
      // compute full height (temporarily set to auto)
      panel.classList.add('open');
      const fullHeight = panel.scrollHeight + 8; // padding margin
      panel.style.maxHeight = fullHeight + 'px';
    });
  }

  // Attach listeners to title cells
  document.querySelectorAll('.toggle-volumes').forEach(titleCell => {
    titleCell.addEventListener('click', (e) => {
      const bookRow = e.currentTarget.closest('.book-row');
      if (!bookRow) return;

      const trVolumes = createVolumesRow(bookRow);
      const panel = trVolumes.querySelector('.volumes-panel');

      // if panel is already open => close it
      if (panel.classList.contains('open')) {
        // close
        panel.style.maxHeight = panel.scrollHeight + 'px'; // set current height
        requestAnimationFrame(() => {
          panel.classList.remove('open');
          panel.style.maxHeight = '0px';
        });
        return;
      }

      // otherwise render & open
      renderVolumes(bookRow, trVolumes);
    });
  });

});