// menuMS.js
document.addEventListener("DOMContentLoaded", function () {
    // Charger le contenu du menu depuis menuMS.html
    fetch('menuMS.html')
        .then(response => response.text())
        .then(data => {
            document.querySelector('body').insertAdjacentHTML('afterbegin', data);
        });
});