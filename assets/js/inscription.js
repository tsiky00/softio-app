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

// Password strength indicator
const passwordInput = document.getElementById("password");
const strengthMeter = document.getElementById("strengthMeter");

passwordInput.addEventListener("input", function () {
  const strength = calculatePasswordStrength(this.value);
  updateStrengthMeter(strength);
});

function calculatePasswordStrength(password) {
  let strength = 0;

  // Length check
  if (password.length >= 8) strength += 1;
  if (password.length >= 12) strength += 1;

  // Character diversity
  if (/[A-Z]/.test(password)) strength += 1;
  if (/[0-9]/.test(password)) strength += 1;
  if (/[^A-Za-z0-9]/.test(password)) strength += 1;

  return Math.min(strength, 5); // Max strength is 5
}

function updateStrengthMeter(strength) {
  const colors = ["#e74c3c", "#f39c12", "#f1c40f", "#2ecc71", "#27ae60"];
  const width = (strength / 5) * 100;

  strengthMeter.style.width = `${width}%`;
  strengthMeter.style.backgroundColor = colors[strength - 1] || colors[0];
}

$(document).ready(function () {
  $("#formSend").on("submit", function (e) {
    e.preventDefault();

    // Reset des erreurs
    $(".form-control").removeClass("is-invalid");
    $(".invalid-feedback").text('');
    $("#alertMessage").removeClass("alert-danger alert-success").addClass("d-none").text('');

    // État de chargement
    const $submitBtn = $(this).find('[type="submit"]');
    const $btnText = $submitBtn.find('#btnText');
    const $btnSpinner = $submitBtn.find('#btnSpinner');
    const $mainIcon = $submitBtn.find('#btnMainIcon'); 
    
    $btnText.text('Connexion...');
    $btnSpinner.removeClass('d-none');
    $mainIcon.addClass('d-none');
    $submitBtn.prop('disabled', true);

    $.ajax({
      url: 'save',
      method: 'POST',
      data: $(this).serialize(),
      dataType: 'json',
      success: function (response) {
        if (response.status === 'error') {
          // Gestion des erreurs
          if (response.errors) {
            $.each(response.errors, function (key, val) {
              $(`input[name="${key}"]`).addClass("is-invalid");
              $(`#error-${key}`).text(val);
            });
          }

          $("#alertMessage")
            .removeClass("d-none")
            .addClass("alert-danger")
            .text('Veuillez corriger les erreurs.');
          
          resetSubmitButton($submitBtn, $btnText, $btnSpinner, $mainIcon);
        } else if (response.status === 'success') {
          // Succès
          $("#alertMessage")
            .removeClass("d-none")
            .addClass("alert-success")
            .text(response.message);

          $("#formSend")[0].reset();
          setTimeout(() => window.location.href = response.redirect, 1000);
        }
      },
      error: function () {
        $("#alertMessage")
          .removeClass("d-none")
          .addClass("alert-danger")
          .text('Erreur serveur, veuillez réessayer plus tard.');
        resetSubmitButton($submitBtn, $btnText, $btnSpinner, $mainIcon);
      }
    });
  });

  function resetSubmitButton($submitBtn, $btnText, $btnSpinner, $mainIcon) {
    $btnText.html('<i id="btnMainIcon" class="fas fa-user-plus me-2"></i> S\'inscrire');
    $btnSpinner.addClass('d-none');
    $mainIcon.removeClass('d-none');
    $submitBtn.prop('disabled', false);
  }
});