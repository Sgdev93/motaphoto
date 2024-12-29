document.addEventListener('DOMContentLoaded', function() {
    // Fonction pour charger les photos
    function loadPhotos() {
        const categorie = document.getElementById('categorie').value;
        const format = document.getElementById('format').value;
        const trier = document.getElementById('trier').value;

        // Création de l'objet FormData pour envoyer les données
        const formData = new FormData();
        formData.append('action', 'filter_photos');
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
        .then(response => response.text())
        .then(html => {
            document.querySelector('.photos_list').innerHTML = html;
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
    }


    loadPhotos();
    
    // Écouteurs d'événements pour les selects
    document.querySelectorAll('.myform').forEach(select => {
        select.addEventListener('change', loadPhotos);
    });
});