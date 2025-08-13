$('#loginForm').on('submit', function(e) {
  e.preventDefault();

  // Cacher l'icône login et montrer le spinner
  $('#loginIcon').addClass('d-none');
  $('#spinner').removeClass('d-none');
  $('#loginBtn').prop('disabled', true);

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
    },
    complete: function() {
      // Réactiver le bouton et cacher le spinner
      $('#spinner').addClass('d-none');
      $('#loginIcon').removeClass('d-none');
      $('#loginBtn').prop('disabled', false);
    }
  });
});
