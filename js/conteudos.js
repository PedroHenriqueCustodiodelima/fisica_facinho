let isAscending = true;  

    function sortCards() {
      let conteudos = document.querySelectorAll('.conteudo-item');
      let conteudosArray = Array.from(conteudos);

      conteudosArray.sort((a, b) => {
        let titleA = a.querySelector('.card-title').textContent.toLowerCase();
        let titleB = b.querySelector('.card-title').textContent.toLowerCase();
        return isAscending ? titleA.localeCompare(titleB) : titleB.localeCompare(titleA);
      });
      isAscending = !isAscending;
      document.getElementById('sort-icon').classList.toggle('fa-sort-alpha-down', isAscending);
      document.getElementById('sort-icon').classList.toggle('fa-sort-alpha-up', !isAscending);
      let container = document.getElementById('conteudos-lista');
      conteudosArray.forEach(item => container.appendChild(item));
    }