document.addEventListener('DOMContentLoaded', function () {
    const sortIcon = document.getElementById('sort-icon');
    const rows = document.querySelectorAll('.row.justify-content-center'); 
    let sorted = false; 
    const initialOrder = Array.from(rows).flatMap(row => Array.from(row.children).map(card => card.cloneNode(true)));
    sortIcon.addEventListener('click', function () {
      const allCards = Array.from(rows).flatMap(row => Array.from(row.children));
      if (!sorted) {
        allCards.sort((a, b) => {
          const titleA = a.querySelector('.card-title').textContent.trim().toLowerCase();
          const titleB = b.querySelector('.card-title').textContent.trim().toLowerCase();
          return titleA.localeCompare(titleB, 'pt-BR'); 
        });
        sorted = true; 
        sortIcon.classList.remove('fa-arrow-up-a-z');
        sortIcon.classList.add('fa-arrow-down-a-z');
      } else {
        allCards.splice(0, allCards.length, ...initialOrder.map(card => card.cloneNode(true)));
        sorted = false;
        sortIcon.classList.remove('fa-arrow-down-a-z');
        sortIcon.classList.add('fa-arrow-up-a-z');
      }
      rows.forEach(row => row.innerHTML = '');
      allCards.forEach((card, index) => {
        const targetRow = rows[Math.floor(index / 3)]; 
        targetRow.appendChild(card);
      });
    });
});