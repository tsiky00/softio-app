// Flag pour désactiver temporairement le hide
let disableHide = false;

// Effet de scroll pour navbar scrolled
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

// Gestion des liens actifs au clic
document.querySelectorAll(".nav-link").forEach((link) => {
  link.addEventListener("click", function () {
    // Retirer la classe active de tous les liens
    document.querySelectorAll(".nav-link").forEach((l) => l.classList.remove("active"));
    // Ajouter la classe active au lien cliqué
    this.classList.add("active");

    // Fermer le menu mobile si ouvert
    const navbarCollapse = document.getElementById("navbarNav");
    const bsCollapse = new bootstrap.Collapse(navbarCollapse, { toggle: false });
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
      const bsCollapse = new bootstrap.Collapse(navbarCollapse, { toggle: false });
      bsCollapse.hide();
      document.getElementById("customToggler").classList.remove("active");
    }
  }
});

// --- Gestion automatique des liens actifs en fonction de la section visible ---
const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".nav-link");

window.addEventListener("scroll", () => {
  if (disableHide) return; // ne pas changer actif si scroll via click

  let currentSection = "";

  sections.forEach((section) => {
    const sectionTop = section.offsetTop - 80; // ajuster selon navbar
    const sectionHeight = section.offsetHeight;

    if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
      currentSection = section.getAttribute("id");
    }
  });

  navLinks.forEach((link) => {
    link.classList.remove("active");
    if (link.getAttribute("href") === `#${currentSection}`) {
      link.classList.add("active");
    }
  });
});

// Smooth scroll avec prise en compte de la navbar
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    const target = document.querySelector(this.getAttribute("href"));
    const navbar = document.getElementById("mainNavbar");

    // Désactiver temporairement le hide
    disableHide = true;

    // Forcer la navbar visible
    navbar.classList.remove("hidden");

    const navbarHeight = navbar.offsetHeight;
    const targetPosition = target.offsetTop - navbarHeight;

    window.scrollTo({
      top: targetPosition,
      behavior: "smooth"
    });

    // Réactiver le hide après le scroll
    setTimeout(() => {
      disableHide = false;
    }, 600); // 600ms correspond à la durée du scroll smooth
  });
});

// Scroll listener pour hide/show navbar
document.addEventListener("DOMContentLoaded", function () {
  const navbar = document.getElementById("mainNavbar");
  let lastScrollTop = 0;
  let accumulatedScrollDown = 0;
  const scrollThreshold = 200;
  const minScrollTop = 100;

  window.addEventListener("scroll", function () {
    if (disableHide) return;

    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
      accumulatedScrollDown += scrollTop - lastScrollTop;

      if (accumulatedScrollDown >= scrollThreshold && scrollTop > minScrollTop) {
        navbar.classList.add("hidden");
      }
    } else {
      accumulatedScrollDown = 0;
      navbar.classList.remove("hidden");
    }

    lastScrollTop = scrollTop;
  });
});

// ----------------- AJAX SECTIONS -----------------
$(document).ready(function () {
  // Hero
  $.ajax({ url: "admin/getInfoHero", method: "GET", dataType: "json",
    success: function (response) { if (response.status == "success") getHero(response.data); },
    error: function () { alert("Erreur hero"); }
  });
  function getHero(users) { users.forEach(user => { $(".slogan").text(user.titre); $(".description").text(user.description); $(".hero-image img").attr("src","assets/uploads/"+user.image); }); }

  // Apropos
  $.ajax({ url: "admin/getInfoApropos", method: "GET", dataType: "json",
    success: function (response) { if (response.status == "success") getApropos(response.data); },
    error: function () { alert("Erreur apropos"); }
  });
  function getApropos(users) { users.forEach(user => { $(".slogan1").text(user.titre); $(".description1").text(user.description); $(".apropos-image img").attr("src","assets/uploads/"+user.image); }); }

  // Solutions
  $.ajax({ url: "admin/getInfoSolution", method: "GET", dataType: "json",
    success: function (response) { if (response.status === "success") getSolutions(response.data); else $(".solutions-container").html("<p>Aucune solution disponible</p>"); },
    error: function () { alert("Erreur solutions"); }
  });
  function getSolutions(solutions) {
    let container = $(".solutions-container"); container.empty();
    solutions.forEach(sol => {
      container.append(`<div class="col text-center">
        <figure class="figure" style="max-width:120px;margin:auto;">
          <div class="solution-image"><img src="assets/uploads/${sol.image}" class="figure-img img-fluid rounded-circle" alt="${sol.description}" style="max-width:120px;"></div>
          <figcaption class="figure-caption mt-2"><h4 class="descriptionS">${sol.description}</h4></figcaption>
        </figure>
      </div>`);
    });
  }

  // Expertise
  $.ajax({ url: "admin/getInfoExpertise", method: "GET", dataType: "json",
    success: function (response) { if (response.status == "success") getExpertise(response.data); },
    error: function () { alert("Erreur expertise"); }
  });
  function getExpertise(users) { users.forEach(user => { $(".sloganE").text(user.titre); $(".descriptionE").text(user.description); $(".expertise-image img").attr("src","assets/uploads/"+user.image); }); }

  // Services
  $.ajax({ url: "admin/getInfoService", method: "GET", dataType: "json",
    success: function (response) { if (response.status === "success") getServices(response.data); else $(".services-container").html("<p>Aucun service disponible</p>"); },
    error: function () { alert("Erreur services"); }
  });
  function getServices(services) {
    let container = $(".services-container"); container.empty();
    services.forEach(service => {
      container.append(`<div class="col-md-6 col-sm-3 card" style="width:48%;">
        <img src="assets/uploads/${service.image}" alt="${service.titre}">
        <div class="card-body"><h5 class="card-title">${service.titre}</h5><p class="card-text">${service.description}</p>
        <a href="#" class="btn btn-primary plus d-flex justify-content-center">Voir plus</a></div></div>`);
    });
  }

  // Contact
  $.ajax({ url: "admin/getInfoContact", method: "GET", dataType: "json",
    success: function (response) { if (response.status == "success") getContact(response.data); },
    error: function () { alert("Erreur contact"); }
  });
  function getContact(users) { users.forEach(user => { $("#numero").text(user.numero); $("#adresse").text(user.adresse); $("#email").text(user.email); }); }

  // Tarifs
  $.ajax({ url: "admin/getInfoTarif", method: "GET", dataType: "json",
    success: function (response) { if (response.status == "success") getTarifs(response.data); else $("#tarifs-container").html("<p>Aucun tarif disponible</p>"); },
    error: function () { alert("Erreur tarifs"); }
  });
  function getTarifs(tarifs) {
    let container = $("#tarifs-container"); container.empty();
    tarifs.forEach(tarif => {
      container.append(`<div class="col-md-5"><div class="card shadow border-0 h-100">
        <div class="card-body text-center">
          <h4 class="card-title">Tarif #${tarif.idTarif}</h4>
          <h5 class="text-muted">${tarif.tarif} Ar</h5>
          <p class="mt-3">${tarif.description}</p>
          <ul class="list-unstyled my-4"><li>✔ Autre info : ${tarif.autre}</li></ul>
          <a href="#" class="btn w-100 contacter">Choisir</a>
        </div></div></div>`);
    });
  }

  // Formulaire contact
  $("#send-data").on("submit", function (e) {
    e.preventDefault();
    $(".form-control").removeClass("is-invalid");
    $(".invalid-feedback").text("");
    $.ajax({
      url: "send-message",
      method: "POST",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        if (response.status === "error" && response.errors) {
          $.each(response.errors, function (key, val) {
            $(`input[name="${key}"]`).addClass("is-invalid");
            $(`#error-${key}`).text(val);
          });
        } else if (response.status === "success") {
          $("#formSend")[0].reset();
        }
      },
      error: function () { alert("Erreur envoi message"); }
    });
  });

  // Initialize AOS
  AOS.init({ duration: 800, easing: "ease-in-out", once: true });
});
