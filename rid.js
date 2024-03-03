// Récupérez les éléments span correspondants
const webDesignerSpan = document.querySelector('.text h1 span:nth-child(1)');
const webDeveloperSpan = document.querySelector('.text h1 span:nth-child(2)');

// Textes à afficher
const webDesignerText = 'Web Designer';
const webDeveloperText = 'Web Developer';

// Durée de l'animation (en millisecondes)
const animationDuration = 2000;

// Fonction pour animer le texte en machine à écrire
function typeWriterAnimation(element, text) {
    let charIndex = 0;

    function type() {
        if (charIndex < text.length) {
            element.textContent += text.charAt(charIndex);
            charIndex++;
            setTimeout(type, 100); // Délai entre chaque caractère (en millisecondes)
        }
    }

    type();
}

// Animation pour "Web Designer"
setTimeout(() => {
    typeWriterAnimation(webDesignerSpan, webDesignerText);

    // Après l'animation du web designer, effacez le texte après un délai
    setTimeout(() => {
        webDesignerSpan.classList.add('hidden');
    }, animationDuration);
}, 1000); // Délai initial avant de commencer l'animation

// Animation pour "Web Developer" après l'effacement du web designer
setTimeout(() => {
    webDeveloperSpan.classList.remove('hidden');
    typeWriterAnimation(webDeveloperSpan, webDeveloperText);
}, animationDuration + 1000); // Ajoutez une pause avant de commencer l'animation suivante
