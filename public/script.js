const selectMordida = document.getElementById("mordida");
const textareaOutro = document.getElementById("mordida_outro");

  textareaOutro.style.display = "none";

  selectMordida.addEventListener("change", function () {
    if (this.value === "Outra") {
      textareaOutro.style.display = "block";
      textareaOutro.required = true;
    } else {
      textareaOutro.style.display = "none";
      textareaOutro.required = false;
      textareaOutro.value = "";
    }
  });

document.getElementById('form-adocao').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch('processa_formulario.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(resposta => {
        if (resposta.includes('sucesso')) {
            Swal.fire({
                title: 'Tudo certo!',
                text: 'Sua mensagem foi enviada com sucesso.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
            form.reset();
        } else {
            Swal.fire({
                title: 'Erro!',
                text: 'Ocorreu um erro ao enviar o formulário. Tente novamente.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Erro!',
            text: 'Não foi possível enviar o formulário.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});