document.getElementbyId("mail").addEventListener('DOMContentLoaded', function() {
    autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('origin')), { types: ['geocode'], componentRestrictions: { country: 'fr' } }
    );
}, false);