setTimeout(function() {
    var successMessage = document.getElementById('feedback-message');
    var errorMessage = document.getElementById('feedback-message-erro');
    if (successMessage) {
      successMessage.classList.add('hidden');  
      setTimeout(function() {
        successMessage.style.display = 'none'; 
      }, 1000);  
    }
    if (errorMessage) {
      errorMessage.classList.add('hidden');  
      setTimeout(function() {
        errorMessage.style.display = 'none';  
      }, 1000); 
    }
  }, 2000); 
  function alterarImagemPerfil() {
    document.getElementById('troca-imagem-form').submit();
  }