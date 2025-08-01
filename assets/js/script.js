// Effet de scroll
window.addEventListener("scroll", function () {
  const navbar = document.getElementById("mainNavbar");
  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

// Toggle menu mobile
function toggleMenu() {
  const toggler = document.getElementById("customToggler");
  toggler.classList.toggle("active");
}

// Gestion des liens actifs
document.querySelectorAll(".nav-link").forEach((link) => {
  link.addEventListener("click", function () {
    // Retirer la classe active de tous les liens
    document
      .querySelectorAll(".nav-link")
      .forEach((l) => l.classList.remove("active"));
    // Ajouter la classe active au lien cliqué
    this.classList.add("active");

    // Fermer le menu mobile si ouvert
    const navbarCollapse = document.getElementById("navbarNav");
    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
      toggle: false,
    });
    bsCollapse.hide();

    // Réinitialiser le toggler
    document.getElementById("customToggler").classList.remove("active");
  });
});

// Fermer le menu quand on clique en dehors
document.addEventListener("click", function (e) {
  const navbar = document.querySelector(".navbar-collapse");
  const toggler = document.querySelector(".navbar-toggler");

  if (!navbar.contains(e.target) && !toggler.contains(e.target)) {
    const navbarCollapse = document.getElementById("navbarNav");
    if (navbarCollapse.classList.contains("show")) {
      const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
        toggle: false,
      });
      bsCollapse.hide();
      document.getElementById("customToggler").classList.remove("active");
    }
  }
});

// BODY
// contenu de la page
// hero

$(document).ready(function () {
  $.ajax({
    url: "getInfoHero",
    method: "GET",
    dataType: "json",
    success: function (response) {
      if (response.status == "success") {
        getHero(response.data);
      }
    },
    error: function () {
      alert("une erreur est survenue !");
    },
  });

  function getHero(users) {
    for (let i = 0; i < users.length; i++) {
      let user = users[i];
      $(".slogan").text(user.titre);
      $(".description").text(user.description);
      $(".hero-image img").attr("src", "assets/uploads/" + user.image);
    }
  }
});

/* formulaire de contact */
$("#send-data").on("submit", function (e) {
  e.preventDefault();

  // Reset des erreurs
  $(".form-control").removeClass("is-invalid");
  $(".invalid-feedback").text("");

  $.ajax({
    url: "send-message",
    method: "POST",
    data: $(this).serialize(),
    dataType: "json",
    success: function (response) {
      if (response.status === "error") {
        // Gestion des erreurs
        if (response.errors) {
          $.each(response.errors, function (key, val) {
            $(`input[name="${key}"]`).addClass("is-invalid");
            $(`#error-${key}`).text(val);
          });
        }
      } else if (response.status === "success") {
        $("#formSend")[0].reset();
      }
    },
    error: function () {
      alert("une erreur est survenue !");
    },
  });
});

// Initialize AOS
AOS.init({
  duration: 800,
  easing: "ease-in-out",
  once: true,
});

// Add smooth scrolling to all links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute("href")).scrollIntoView({
      behavior: "smooth",
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const navbar = document.getElementById("mainNavbar");
  let lastScrollTop = 0;
  let accumulatedScrollDown = 0;
  const scrollThreshold = 200; // Distance cumulée avant de cacher
  const minScrollTop = 100; // Position minimale pour pouvoir cacher

  window.addEventListener("scroll", function () {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Appliquer la classe 'scrolled' si on a scrollé un peu
    if (scrollTop > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }

    if (scrollTop > lastScrollTop) {
      // Scroll vers le bas
      accumulatedScrollDown += scrollTop - lastScrollTop;

      if (accumulatedScrollDown >= scrollThreshold && scrollTop > minScrollTop) {
        navbar.classList.add("hidden");
      }
    } else {
      // Scroll vers le haut → réinitialisation
      accumulatedScrollDown = 0;
      navbar.classList.remove("hidden");
    }

    lastScrollTop = scrollTop;
  });
});


