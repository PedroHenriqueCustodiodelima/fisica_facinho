let sortAscending = true;
  document.getElementById('sort-icon').addEventListener('click', function() {
    const cards = Array.from(document.querySelectorAll('.col-md-4'));
    const container = document.getElementById('cards-container');
    cards.sort((a, b) => {
      const titleA = a.querySelector('.card-title').textContent.toLowerCase();
      const titleB = b.querySelector('.card-title').textContent.toLowerCase();
      if (sortAscending) {
        return titleA.localeCompare(titleB);
      } else {
        return titleB.localeCompare(titleA);
      }
    });
    cards.forEach(card => {
      container.appendChild(card);  
    });
    sortAscending = !sortAscending;
    document.getElementById('sort-icon').classList.toggle('fa-arrow-down-a-z', !sortAscending);
    document.getElementById('sort-icon').classList.toggle('fa-arrow-up-a-z', sortAscending);
});