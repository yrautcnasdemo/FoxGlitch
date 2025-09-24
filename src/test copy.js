// ============================================================================
// Variables
// ============================================================================

const numberInput = document.getElementById('number-input');
const submitButton = document.getElementById('submit-button');

const checkboxesContainer = document.getElementById('checkboxes-container');


// ============================================================================
// Functions
// ============================================================================

function generateCheckboxes() {
    const numborOfVolumes = numberInput.value;

    let html = '';

    for (let i = 1; i <= numborOfVolumes; i++) {
        html += `
            <div class="checkbox-container">
                <input type="checkbox" id="volume-${i}" name="${i}">
                <label for="volume-${i}">Volume ${i}</label>
            </div>
        `;
    }

    checkboxesContainer.innerHTML = html;
}


// ============================================================================
// Code to execute on load
// ============================================================================


// ============================================================================
// Event listeners
// ============================================================================

submitButton.addEventListener('click', generateCheckboxes);










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




















/* //////////////////////////////TEST */

/* container inséré dans un <tr> juste après la ligne du livre */
.volumes-row td {
  padding: 0;
  border-top: 1px solid rgba(255,255,255,0.06);
  background: rgba(0,0,0,0.04);
}

/* slider panel (collapsible) */
.volumes-panel {
  overflow: scroll;
  max-height: 0;
  transition: max-height 350ms ease, padding 250ms ease;
  padding: 0 16px;
}

/* when open we add class .open on panel wrapper */
.volumes-panel.open {
  padding: 12px 16px;
  /* max-height large enough to contain grid; JS will set a precise max-height for smooth animation */
  max-height: 2000px; 
}

/* grid of small squares */
.volumes-grid {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
  align-items: center;
}

/* each volume tile */
.vol-square {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 8px;
  border-radius: 6px;
  font-size: 13px;
  background: rgba(255,255,255,0.03);
}

/* small color indicator box */
.vol-dot {
  width: 12px;
  height: 12px;
  border-radius: 3px;
  border: 1px solid rgba(0,0,0,0.2);
}

/* owned / missing colors (ajuste si tu préfères d'autres couleurs) */
.vol-dot.owned { background: #46d160; }   /* green */
.vol-dot.missing { background: #e74c3c; } /* red */

/* responsive */
@media (max-width:700px){
  .vol-square { padding:4px 6px; font-size:12px; }
  .vol-dot { width:10px; height:10px; }
}
