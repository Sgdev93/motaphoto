document.addEventListener("DOMContentLoaded", () => {
    const contactBtn = document.querySelector(".contactform");
    const contactPopup = document.querySelector(".popup");
    const closeContact = document.querySelector(".closecontact");
    const boutonContact = document.querySelector(".bouton-contact");
    const maref = document.querySelector(".maref");
    const refphoto = document.querySelector(".refphoto");
    const burger = document.querySelector(".burger-menu");
    const burgermenu = document.querySelector("#menu-header");
 
    if (burger) { /* permet d'éviter une erreur JS si l'élément n'existe pas */
    burger.addEventListener("click", (event) => {
       event.preventDefault();
       burgermenu.classList.toggle("fixed");
       burger.classList.toggle("fixed");
    });
   }

   if (contactBtn) {
    contactBtn.addEventListener("click", (event) => {
       event.preventDefault();
       contactPopup.classList.add("show");
    });
   }

    if (boutonContact) {
       boutonContact.addEventListener("click", (event) => {
          event.preventDefault();
          contactPopup.classList.add("show");
          refphoto.value = maref.textContent;
       });
    }
 
    if (closeContact) {
    closeContact.addEventListener("click", (event) => {
       contactPopup.classList.remove("show");
       refphoto.value = "";
    });
   }
 });
 


 document.addEventListener('DOMContentLoaded', function () {
   // Sélectionner les flèches et les images
   const previousArrow = document.querySelector('.previous-photo');
   const nextArrow = document.querySelector('.next-photo');
   const previousThumbnail = document.querySelector('.previous-thumbnail');
   const nextThumbnail = document.querySelector('.next-thumbnail');

   // Vérifier que les éléments existent avant d'appliquer des actions
   if (previousArrow && previousThumbnail) {
       // Masquer l'image précédente au chargement
       previousThumbnail.classList.add('hidden');

       // Afficher l'image précédente au survol de la flèche gauche
       previousArrow.addEventListener('mouseover', function () {
           previousThumbnail.classList.remove('hidden');
       });
       previousArrow.addEventListener('mouseout', function () {
           previousThumbnail.classList.add('hidden');
       });
   }

   if (nextArrow && nextThumbnail) {
       // Masquer l'image suivante au chargement
       nextThumbnail.classList.add('hidden');

       // Afficher l'image suivante au survol de la flèche droite
       nextArrow.addEventListener('mouseover', function () {
           nextThumbnail.classList.remove('hidden');
       });
       nextArrow.addEventListener('mouseout', function () {
           nextThumbnail.classList.add('hidden');
       });
   }
});
