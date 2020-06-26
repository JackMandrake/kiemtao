// Module app Add
/**
 * 1) Mettre en place une validation des champs
 */
/**
 * On aimerait pouvoir valider des champs du formulaire.
 * Il existe plusieurs méthodes :
 * 
 * - document.getElementById('field-username')
 * - document.querySelector('#field-username')
 */

// Module app (objet)
let app = {
    // Propriétés
    // Elements du HTML (DOM)
    fieldUsername: document.getElementById('name'),
    fieldEmail: document.getElementById('email'),
    fieldMessage: document.getElementById('message'),
    fieldForm: document.querySelector('form'),
    fielDivErrors: document.getElementById('errors'),
    errors: [],

    // Permet de savoir si notre input a changé
    inputChanged: false,

    // Méthodes
    init: function() {
        console.log('Démarrage du module Connexion');

        /**
         * On va brancher des écouteurs pour espionner nos éléments username
         * et password (on est mode espion).
         * 
         * Pour cela, nous allons devoir utiliser l'évènement blur (déclenché lorsque l'on perd le focus)
         */

        // Brancher l'évent onblur sur username : si perte de focus
        // on vérifie le nombre de caractères saisis est correcte
        app.fieldUsername.addEventListener('blur', app.handleOnBlurInput);

        // Brancher l'évent onblur sur Email
        // on vérifie le nombre de caractères saisis est correcte
        app.fieldEmail.addEventListener('blur', app.handleOnBlurInput);

        // Brancher l'évent onblur sur Message
        // on vérifie le nombre de caractères saisis est correcte
        app.fieldMessage.addEventListener('blur', app.handleOnBlurInput);

        // Brancher l'évent submit sur le formulaire
        app.fieldForm.addEventListener('submit', app.handleOnSubmitForm);

        /**
         * 3 Si une modification est apportée sur les inputs du form, 
         * retirer les erreurs de l'élément du DOM
         */
        // On récupère d'abord tous les éléments du DOM, avant de les brancher
        // à l'évent "change"
        app.allInputs = document.querySelectorAll('form input');
        let totalInput = app.allInputs.length;
        for (let indexInput = 0; indexInput < totalInput; indexInput++) {
            let currentInput = app.allInputs[indexInput];
            currentInput.addEventListener('change', app.handleOnChangeInput);
        }

    },

    /**
     * Cette méthode est appelée lorsqu'un champ perd le focus (blur)
     * @param {Object} event 
     */
    handleOnBlurInput: function(event) {
        console.log('blur input');
        // console.log(event);
        let inputTarget = event.target;

        // On va pouvoir tester la valeur de l'input
        app.checkInput(inputTarget);
    },

    /**
     * 3 Si une modification est apportée sur les inputs du form, 
     * retirer les erreurs de l'élément du DOM
     */
    handleOnChangeInput: function(event) {
        // On reset
        // console.log('change input');
        app.reset();
    },

    handleOnSubmitForm: function(event) {
        // Dans event : on a des informations sur l'évenement et sur l'élément
        // déclencheur de l'évent.
        /**
         * Chaque champ doit être validé
         *  Si il y a des erreurs :
         *    - on empêche la soumission
         *    - on les affiche dans le formulaire
         * Si aucune erreur, on soumet le formulaire normalement
         */

        // On fait reset
        app.reset();

        // On va vérifier s'il y a des erreurs : est-ce que nos champs
        // comportent au moins 3 caractères.

        // Est-ce que les champs identifiants et password sont valid
        if (app.hasErrors()) {
            // Si on veut empecher le comportement par défaut du formulaire
            // on appelle la méthode preventDefault()

            // Si on a une erreur, alors on bloque la soumission du form
            event.preventDefault();

            // J'affiche mes erreurs dans le formulaire
            app.showErrors();
        }


    },

    hasErrors: function() {
        // On vérifie le champs identifiant : est-ce valide ?
        // true ou false
        let isUsernameValid = app.checkInput(app.fieldUsername);

        // On vérifie le champs Email : est-ce valide ?
        let isEmailValid = app.checkInput(app.fieldEmail);

        // On vérifie le champs Message : est-ce valide ?
        let isMessageValid = app.checkInput(app.fieldMessage);

        return !isUsernameValid || !isEmailValid || !isMessageValid;
    },


    /**
     * Cette méthode va afficher les erreurs de saisies dans le formulaire
     */
    showErrors: function() {
        console.log('Erreurs : ', app.errors);
        app.fielDivErrors.style.display = "block";
        for (indexError in app.errors) {
            // app.fielDivErrors.innerHTML += '<p class="error">' + app.errors[indexError] + '</p>';

            // Création d'un nouvel enfant paragraphe
            let tagPara = document.createElement('p');
            tagPara.classList.add('error');
            tagPara.textContent = app.errors[indexError];

            // On rajoute l'enfant à la div errors
            app.fielDivErrors.appendChild(tagPara);
        }
    },

    /**
     * Cette méthode va simplement venir vérifier le contenu de l'input
     * et nous dire si sa valeur est superieur à 3 ou non
     * @param {Object} field 
     */
    checkInput: function(paramField) {
        // console.log(field.value);
        // Si la taille du texte saisi (string) est inférieur à 3
        // alors la saisie est invalide
        // console.log(field);

        // paramField.className = 'field-input';
        let fieldLenth = paramField.value.length,
            minChar = parseInt(paramField.dataset.min);

        console.log(fieldLenth);
        // minChar = paramField.minLength;
        // Si le nombre de caractères est égal à zero
        // OU inférieur à la valeur minimal, alors c'est invalide
        // (Ex : dans le textarea message c'est au moins 1 caractère)
        if (fieldLenth == 0 || fieldLenth < minChar) {
            //if (app.fieldUsername.value.length < 3 && app.fieldEmail.value.length < 2) {
            console.log('invalide');
            // paramField.className += ' invalid'; // className = field-input invalid

            paramField.classList.remove('valid');
            paramField.classList.add('invalid');

            // On rajoute ici un message d'erreur du type : placeholder incorrecte
            // exemple : Identifiant incorrecte
            app.errors.push(paramField.placeholder + ' incorrecte');

            return false;
        } else {
            console.log('valide');
            // paramField.className += ' valid'; // className = field-input valid

            paramField.classList.remove('invalid');
            paramField.classList.add('valid');

            return true;
        }
    },

    reset: function() {
        app.errors = [];
        app.fielDivErrors.innerHTML = '';
    }

};

// au chargement du DOM, on demande au navigateur d'exécuter la méthode app.init()
document.addEventListener('DOMContentLoaded', app.init);