function togglePassword() {
  const passwordField = document.getElementById("password");
  const toggle = document.querySelector(".password-toggle i");

  if (passwordField.type === "password") {
    passwordField.type = "text";
    toggle.classList.remove("fa-eye");
    toggle.classList.add("fa-eye-slash");
  } else {
    passwordField.type = "password";
    toggle.classList.remove("fa-eye-slash");
    toggle.classList.add("fa-eye");
  }
}

$('#loginForm').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: 'login-admin',
      data: {
        email: $('#email').val(),
        password: $('#password').val()
      },
      dataType: 'json',
      success: function(response) {
        if (response.status === 'success') {
          $('#message').html('<p style="color:green;">' + response.message + '</p>');
          window.location.href = response.redirect;
        } else {
          $('#message').html('<p style="color:red;">' + response.message + '</p>');
        }
      },
      error: function() {
        $('#message').html('<p style="color:red;">Erreur de connexion au serveur.</p>');
      }
    });
  });



