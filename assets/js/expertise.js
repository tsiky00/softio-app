window.toggleSidebar = function () {
  const sidebar = document.getElementById("sidebar");
  const mainContent = document.getElementById("mainContent");
  sidebar.classList.toggle("hidden");
  mainContent.classList.toggle("expanded");
};

$(document).ready(function () {
  // Aperçu image ajout (drag & drop et label stylisé)
  function showImagePreview(input, imgSelector, labelTextSelector) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $(imgSelector).attr("src", e.target.result).show();
        if (labelTextSelector) $(labelTextSelector).css("visibility", "hidden");
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      $(imgSelector).hide();
      if (labelTextSelector) $(labelTextSelector).css("visibility", "visible");
    }
  }

  $("#image").on("change", function () {
    showImagePreview(this, "#preview-image", "#image-label-text");
  });
  // Drag & drop sur label ajout
  $("#image-label")
    .on("dragover", function (e) {
      e.preventDefault();
      $(this).css("border-color", "#007bff");
    })
    .on("dragleave drop", function (e) {
      e.preventDefault();
      $(this).css("border-color", "#aaa");
    })
    .on("drop", function (e) {
      e.preventDefault();
      const files = e.originalEvent.dataTransfer.files;
      $("#image")[0].files = files;
      $("#image").trigger("change");
    });

  // Aperçu image modification
  $("#edit-image").on("change", function () {
    showImagePreview(this, "#edit-preview-image", "#edit-image-label-text");
  });
  // Drag & drop sur label modif
  $("#edit-image-label")
    .on("dragover", function (e) {
      e.preventDefault();
      $(this).css("border-color", "#007bff");
    })
    .on("dragleave drop", function (e) {
      e.preventDefault();
      $(this).css("border-color", "#aaa");
    })
    .on("drop", function (e) {
      e.preventDefault();
      const files = e.originalEvent.dataTransfer.files;
      $("#edit-image")[0].files = files;
      $("#edit-image").trigger("change");
    });
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
      url: "expertise/create",
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
            // Reset image preview et label
            $("#preview-image").hide();
            $("#image-label-text").show();
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
      url: "getInfoExpertise",
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
      let imgHtml = user.image
        ? `<img src="${
            typeof BASE_URL !== "undefined" ? BASE_URL : "/"
          }assets/uploads/${
            user.image
          }" alt="img" style="width:60px;height:60px;object-fit:cover;border-radius:12px;display:block;margin:0 auto;box-shadow:0 2px 8px #0001;">`
        : "";
      rows += `
      <tr>
          <td>${user.idExpertise}</td>
          <td>${user.titre}</td>
          <td>${user.description}</td>
          <td>${imgHtml}</td>
          <td class="text-center">
              <a class="btn btn-primary edit-btn" data-id="${user.idExpertise}" title="Modifier">
                  <i class="fa fa-edit"></i>
              </a>
              <a class="btn btn-danger delete-btn" data-id="${user.idExpertise}" title="Supprimer">
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
          url: "expertise/delete/" + id,
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

  // modification
  // Remplir le formulaire de modification
  $(document).on("click", ".edit-btn", function () {
    const userId = $(this).data("id");
    $.ajax({
      url: "expertise/get-expertise/" + userId,
      method: "GET",
      dataType: "json",
      success: function (res) {
        if (res.status === "success") {
          const u = res.data;
          $("#edit-id").val(u.idExpertise);
          $("#edit-titre").val(u.titre);
          $("#edit-description").val(u.description);
          // Aperçu image existante
          if (u.image) {
            var imgUrl =
              (typeof BASE_URL !== "undefined" ? BASE_URL : "/") +
              "assets/uploads/" +
              u.image;
            $("#edit-preview-image").attr("src", imgUrl).show();
            $("#edit-image-label-text").css("visibility", "hidden");
          } else {
            $("#edit-preview-image").hide();
            $("#edit-image-label-text").css("visibility", "visible");
          }
          // Reset input file
          $("#edit-image").val("");
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
    var formData = new FormData(this);
    $.ajax({
      url:
        (typeof BASE_URL !== "undefined" ? BASE_URL : "/") +
        "admin/expertise/update-expertise",
      method: "POST",
      data: formData,
      dataType: "json",
      contentType: false,
      processData: false,
      success: function (res) {
        // Spinner OFF
        $("#editBtnSpinner").addClass("d-none");
        $("#editBtnText").removeClass("d-none");
        $("#formEdit button[type='submit']").prop("disabled", false);
        if (res.status === "success") {
          $("#registerModal").modal("hide");
          // Reset form et aperçu image
          $("#formEdit")[0].reset();
          $("#edit-preview-image").hide();
          $("#edit-image-label-text").css("visibility", "visible");
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
