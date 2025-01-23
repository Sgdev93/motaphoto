document.addEventListener('DOMContentLoaded', function() {

    let button = document.querySelector('.load-more-button')
    // Fonction pour charger les photos
    function loadPhotos() {
        let page = document.querySelector('.load-more-button').dataset.page 
        const categorie = document.getElementById('categorie').value;
        const format = document.getElementById('format').value;
        const trier = document.getElementById('trier').value;

        console.log("page",page);

        // Création de l'objet FormData pour envoyer les données
        const formData = new FormData();
        formData.append('action', 'filter_photos');
        formData.append('page', page);
        formData.append('categorie', categorie);
        formData.append('format', format);
        formData.append('trier', trier);
        formData.append('nonce', ajax_object.nonce);

        console.log(ajax_object.nonce);

        fetch(ajax_object.ajax_url, {
            method: 'POST',
            credentials: 'same-origin',
            body: formData
        })
        .then(response => response.json())
        .then(reponse => {
            console.log(reponse);
            document.querySelector('.photos_list').innerHTML = reponse.html;
            if (reponse.found_posts >= reponse.max_posts) {
                button.classList.add("hidden");
            } else {
                button.classList.remove("hidden");
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
    }

    loadPhotos();
    
    // Écouteurs d'événements pour les selects
    document.querySelectorAll('.myform').forEach(select => {
        select.addEventListener('change', ()=>{
            resetButton(); 
            loadPhotos();
        });
    });

    // au clic sur le bouton load more => incrementer la valeur + charger les photos
    button.addEventListener('click', ()=>{
        incrementButton(); 
        loadPhotos();
    });

    function incrementButton() {
        let currentPage = parseInt(button.getAttribute('data-page'), 10);
        currentPage++;
        button.setAttribute('data-page', currentPage);
    }

    function resetButton() {
        button.setAttribute('data-page', 1);
    }
});