document.addEventListener("DOMContentLoaded", () => {
    const contactBtn = document.querySelector(".contactform");
    const contactPopup = document.querySelector(".popup");
    const closecontact = document.querySelector(".closecontact");
    const boutonContact = document.querySelector(".bouton-contact");
    const maref = document.querySelector(".maref");
    const refphoto = document.querySelector(".refphoto");
    const burger = document.querySelector(".burger-menu");
    const burgermenu = document.querySelector("#menu-header");
 
    if (burger) { /* permet d'éviter une erreur JS si l'élément n'existe pas */
    burger.addEventListener("click", (event) => {
       event.preventDefault();
       burgermenu.classList.toggle("fixed");
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
 
    if (closecontact) {
    closecontact.addEventListener("click", (event) => {
       contactPopup.classList.remove("show");
       refphoto.value = "";
    });
   }
 
 
 
 
 });
 