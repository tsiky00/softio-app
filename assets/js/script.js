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
        getHero(response.data) ;
      }
    },
    error: function () {
      alert("une erreur est survenue !");
    },
  });

  function getHero(users) {
    for (let i = 0; i < users.length; i++) {
      let user = users[i];
      $('.slogan').text(user.titre) ;
      $('.description').text(user.description) ;
      $('.hero-image img').attr('src', 'assets/uploads/'+user.image);
    }
  }
});

// apropos 


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
  let scrollTimeout;

  window.addEventListener("scroll", function () {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // Débounce pour optimiser les performances
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(function () {
      handleNavbarScroll(scrollTop);
    }, 10);
  });

  function handleNavbarScroll(scrollTop) {
    // Ajouter/retirer la classe 'scrolled' selon la position
    if (scrollTop > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }

    // Gestion de l'affichage/masquage selon la direction du scroll
    if (scrollTop > lastScrollTop && scrollTop > 100) {
      // Scroll vers le bas - cacher la navbar
      navbar.classList.add("hidden");
    } else {
      // Scroll vers le haut - afficher la navbar
      navbar.classList.remove("hidden");
    }

    lastScrollTop = scrollTop;
  }
});
