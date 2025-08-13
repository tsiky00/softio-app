window.toggleSidebar = function () {
  const sidebar = document.getElementById("sidebar");
  const mainContent = document.getElementById("mainContent");
  sidebar.classList.toggle("hidden");
  mainContent.classList.toggle("expanded");
};

$(document).ready(function () {
  loadUsers();

  // Soumission du formulaire d'ajout
  $("#formSend").on("submit", function (e) {
    e.preventDefault();
    $(".invalid-feedback").text("");
    $(".form-control").removeClass("is-invalid");

    $("#btnSpinner").removeClass("d-none");
    $("#btnText").addClass("d-none");

    // Utilisation de FormData pour inclure le fichier
    let formData = new FormData(this);

    $.ajax({
      url: "contact/create",
      method: "POST",
      data: formData,
      dataType: "json",
      contentType: false,
      processData: false,
      success: function (response) {
        $("#btnSpinner").addClass("d-none");
        $("#btnText").removeClass("d-none");

        if (response.status === "success") {
          Swal.fire({
            icon: "success",
            title: "Succès !",
            text: response.message,
            timer: 1500,
            showConfirmButton: false,
          });
          loadUsers();
          setTimeout(function () {
            $("#registerModal").modal("hide");
            $("#formSend")[0].reset();
          }, 1500);
        } else if (response.status === "error") {
          Swal.fire("Erreur", response.message, "error");
        } else if (response.status === "validation") {
          for (const [key, message] of Object.entries(response.errors)) {
            $(`#${key}`).addClass("is-invalid");
            $(`#error-${key}`).text(message);
          }
          Swal.fire({
            icon: "warning",
            title: "Champs invalides",
            text: "Veuillez corriger les champs en rouge.",
          });
        }
      },
      error: function () {
        $("#btnSpinner").addClass("d-none");
        $("#btnText").removeClass("d-none");
        Swal.fire("Erreur serveur", "Une erreur est survenue.", "error");
      },
    });
  });

  // Chargement des utilisateurs
  function loadUsers() {
    $.ajax({
      method: "GET",
      url: "getInfoContact",
      dataType: "json",
      success: function (response) {
        if (response.status == "success") {
          updateUser(response.data);
        }
      },
      error: function () {
        Swal.fire("Erreur", "Erreur lors du chargement !", "error");
      },
    });
  }

  // Mise à jour du tableau
  function updateUser(users) {
    if ($.fn.DataTable.isDataTable("#example")) {
      $("#example").DataTable().clear().destroy();
    }

    var rows = "";
    for (var i = 0; i < users.length; i++) {
      var user = users[i];
      rows += `
      <tr>
          <td>${user.idContact}</td>
          <td>${user.numero}</td>
          <td>${user.adresse}</td>
          <td>${user.email}</td>
          <td class="text-center">
              <a class="btn btn-primary edit-btn" data-id="${user.idContact}" title="Modifier">
                  <i class="fa fa-edit"></i>
              </a>
              <a class="btn btn-danger delete-btn" data-id="${user.idContact}" title="Supprimer">
                  <i class="fa fa-trash"></i>
              </a>
          </td>
      </tr>`;
    }

    $("#example tbody").html(rows);
    $("#example").DataTable({
      language: {
        sProcessing: "Traitement en cours...",
        sLengthMenu: "Afficher _MENU_ Listes des produits",
        sZeroRecords: "Aucun élément à afficher",
        sInfo: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
        sInfoEmpty: "Affichage de 0 à 0 sur 0 éléments",
        sInfoFiltered: "(filtré à partir de _MAX_ éléments au total)",
        sSearch: "Rechercher :",
        oPaginate: {
          sFirst: '<i class="fa fa-arrow-left"></i>',
          sPrevious: "Précédent",
          sNext: "Suivant",
          sLast: "Dernier",
        },
      },
    });
  }

  // Suppression
  var id = "";
  $(document).on("click", ".delete-btn", function () {
    id = $(this).attr("data-id");

    Swal.fire({
      title: "Confirmer la suppression",
      text: "Voulez-vous vraiment supprimer ?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Oui, supprimer",
      cancelButtonText: "Annuler",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          method: "POST",
          url: "contact/delete/" + id,
          dataType: "json",
          success: function (response) {
            if (response.status == "success") {
              Swal.fire("Supprimé", response.message, "success");
              if ($.fn.DataTable.isDataTable("#example")) {
                $("#example").DataTable().clear().destroy();
                $("#example tbody").empty();
              }
              loadUsers(); // Recharger les utilisateurs
            } else {
              Swal.fire("Erreur", response.message, "error");
            }
          },
          error: function () {
            Swal.fire("Erreur", "La suppression a échoué.", "error");
          },
        });
      }
    });
  });

  /* remplir les modification */
  $(document).on("click", ".edit-btn", function () {
    const userId = $(this).data("id");
    $.ajax({
      url: "contact/get-contact/" + userId,
      method: "GET",
      dataType: "json",
      success: function (res) {
        if (res.status === "success") {
          const u = res.data;
          $("#edit-id").val(u.idContact);
          $("#edit-numero").val(u.numero);
          $("#edit-adresse").val(u.adresse);
          $("#edit-email").val(u.email);
          $("#registerModal").modal("show");
        } else {
          Swal.fire("Erreur", res.message, "error");
        }
      },
      error: function () {
        Swal.fire("Erreur", "Impossible de charger l'utilisateur.", "error");
      },
    });
  });

  // Soumission du formulaire de modification
  $("#formEdit").on("submit", function (e) {
    e.preventDefault();
    // Spinner ON
    $("#editBtnSpinner").removeClass("d-none");
    $("#editBtnText").addClass("d-none");
    $("#formEdit button[type='submit']").prop("disabled", true);
    $.ajax({
      url:
        (typeof BASE_URL !== "undefined" ? BASE_URL : "/") +
        "admin/contact/update-contact",
      method: "POST",
      data: $(this).serialize(),
      dataType: "json",
      success: function (res) {
        // Spinner OFF
        $("#editBtnSpinner").addClass("d-none");
        $("#editBtnText").removeClass("d-none");
        $("#formEdit button[type='submit']").prop("disabled", false);
        if (res.status === "success") {
          $("#registerModal").modal("hide");
          // Reset form et aperçu image
          $("#formEdit")[0].reset();
          Swal.fire("Succès", res.message, "success");
          loadUsers();
        } else {
          Swal.fire("Erreur", res.message, "error");
        }
      },
      error: function () {
        $("#editBtnSpinner").addClass("d-none");
        $("#editBtnText").removeClass("d-none");
        $("#formEdit button[type='submit']").prop("disabled", false);
        Swal.fire("Erreur", "Erreur serveur pendant la mise à jour.", "error");
      },
    });
  });
  
});

/* dropdown */

document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.getElementById("dropdownToggle");
  const menu = document.getElementById("dropdownMenu");

  toggle.addEventListener("click", function (e) {
    e.stopPropagation();
    menu.classList.toggle("hidden");
  });

  document.addEventListener("click", function () {
    menu.classList.add("hidden");
  });
});
