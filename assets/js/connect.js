// Toggle password visibility
document.querySelectorAll(".toggle-password").forEach((button) => {
  button.addEventListener("click", function () {
    const input = this.parentElement.querySelector("input");
    const icon = this.querySelector("i");

    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  });
});

$(document).ready(function () {
  $("#formSend").on("submit", function (e) {
    e.preventDefault();

    // Cacher les anciens messages
    $("#errorMessage").addClass("d-none").text('');
    
    // Activer l'état de chargement
    const $submitBtn = $(this).find('[type="submit"]');
    const $btnText = $submitBtn.find('#btnText');
    const $btnSpinner = $submitBtn.find('#btnSpinner');
    const $btnIcon = $submitBtn.find('#btnIcon');
    
    // Sauvegarder le texte original avec l'icône
    const originalContent = $btnText.html();
    
    $btnText.html('Connexion...'); // Utiliser html() au lieu de text()
    $btnSpinner.removeClass('d-none');
    $btnIcon.addClass('d-none');
    $submitBtn.prop('disabled', true);

    $.ajax({
      url: 'login',
      method: "POST",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.status === 'success') {
          // Redirection vers un autre domaine
          window.location.href = response.redirect;
        } else {
          // Afficher le message d'erreur
          $("#errorMessage").removeClass("d-none").text(response.message);
          // Réinitialiser le bouton avec le contenu original
          resetSubmitButton($submitBtn, $btnText, $btnSpinner, $btnIcon, originalContent);
        }
      },
      error: function () {
        // Affichage d'un message par défaut en cas d'erreur serveur ou réseau
        $("#errorMessage").removeClass("d-none").text('Erreur technique. Veuillez réessayer.');
        // Réinitialiser le bouton avec le contenu original
        resetSubmitButton($submitBtn, $btnText, $btnSpinner, $btnIcon, originalContent);
      }
    });
  });

  // Fonction pour réinitialiser le bouton (modifiée pour accepter le contenu original)
  function resetSubmitButton($submitBtn, $btnText, $btnSpinner, $btnIcon, originalContent) {
    $btnText.html(originalContent); // Restaurer le contenu original avec l'icône
    $btnSpinner.addClass('d-none');
    $btnIcon.removeClass('d-none');
    $submitBtn.prop('disabled', false);
  }
});