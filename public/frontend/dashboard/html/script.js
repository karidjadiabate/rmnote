document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner les éléments nécessaires
    const prevBtns = document.querySelectorAll(".btn-prev");
    const nextBtns = document.querySelectorAll(".btn-next");
    const progress = document.getElementById("progress");
    const formSteps = document.querySelectorAll(".form-step");
    const progressSteps = document.querySelectorAll(".progress-step");
    const textarea = document.querySelector("textarea");
  
    let formStepsNum = 0; // Indice de l'étape actuelle
  
    // Fonction pour mettre à jour les étapes du formulaire
    function updateFormSteps() {
        formSteps.forEach((formStep) => {
            formStep.classList.remove("form-step-active");
        });
        formSteps[formStepsNum].classList.add("form-step-active");
    }
  
    // Fonction pour mettre à jour la barre de progression
    function updateProgressbar() {
        progressSteps.forEach((progressStep, idx) => {
            if (idx < formStepsNum + 1) {
                progressStep.classList.add("progress-step-active");
            } else {
                progressStep.classList.remove("progress-step-active");
            }
        });
  
        const progressActive = document.querySelectorAll(".progress-step-active");
        progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
    }
  
    // Fonction pour valider un sélecteur spécifique ou tous les sélecteurs
    function validateSelects(selectId = null) {
        const selects = [
            { id: 'position', errorId: 'position-error', errorMessage: 'Veuillez sélectionner un type de sujet.' },
            { id: 'positions', errorId: 'positions-error', errorMessage: 'Veuillez sélectionner une matière.' },
            { id: 'positions1', errorId: 'positions1-error', errorMessage: 'Veuillez sélectionner une filière.' },
            { id: 'positions2', errorId: 'positions2-error', errorMessage: 'Veuillez sélectionner une classe.' }
        ];
  
        let allValid = true;
  
        if (selectId) {
            // Validation d'un sélecteur spécifique
            const select = selects.find(s => s.id === selectId);
            if (select) {
                const selectElement = document.getElementById(select.id);
                const errorElement = document.getElementById(select.errorId);
  
                if (selectElement && selectElement.value === '') {
                    errorElement.style.display = 'block';
                    allValid = false;
                } else if (errorElement) {
                    errorElement.style.display = 'none';
                }
            }
        } else {
            // Validation de tous les sélecteurs
            selects.forEach(select => {
                const selectElement = document.getElementById(select.id);
                const errorElement = document.getElementById(select.errorId);
  
                if (selectElement && selectElement.value === '') {
                    errorElement.style.display = 'block';
                    allValid = false;
                } else if (errorElement) {
                    errorElement.style.display = 'none';
                }
            });
        }
  
        return allValid;
    }
  
    // Fonction pour gérer la perte de focus des éléments select
    function handleBlur(event) {
        const selectId = event.target.id;
        validateSelects(selectId);
    }
  
    // Ajouter un gestionnaire d'événements blur à chaque élément select
    const selects = [
        'position',
        'positions',
        'positions1',
        'positions2'
    ];
  
    selects.forEach(selectId => {
        const selectElement = document.getElementById(selectId);
        if (selectElement) {
            selectElement.addEventListener('blur', handleBlur);
        }
    });
const sectionContainers1 = document.querySelector('.frm');
const btnendnext = document.querySelector('.endnexts1');

// Ajoutez un écouteur d'événements à sectionContainers1
sectionContainers1.addEventListener('input', (event) => {
    // Vérifiez si l'élément déclencheur est un input de type text ou un select
    if (event.target.matches('input, select')) {
        // Vérifiez l'état de validation
        if (!validateSections0(sectionContainers1)) {
            btnendnext.classList.add('disabled'); 
        } else {
            btnendnext.classList.remove('disabled'); 
        }
    }
});


    
    // Gestion du clic sur les boutons "Suivant"
    nextBtns.forEach(btn => {
        btn.addEventListener('click', (event) => {

            const sectionContainer = event.currentTarget.closest('.form');
            let allValid = true;
            var errormsg = document.querySelector('.msg-error');
            errormsg.textContent ="";
            errormsg.style.display ="none";
             var message =  validateSection(sectionContainer);
            if(event.currentTarget.classList.contains('endnext')){
                if (!message) {
                    errormsg.style.display ="block";
                    errormsg.textContent ="Veuillez remplir tous les champs requis avant d'aller à l'étape suivante section.";
                    allValid = false;
                    return;
                }
                if (typeof message === 'string' && message.startsWith("Erreur")) {
                    errormsg.style.display ="block";
                    errormsg.textContent = message;
                    // console.log(errormsg);
                    allValid = false;
                    return;
                }
            }

            // Empêcher le passage à l'étape suivante si la validation échoue
            if (validateSelects()) {
                formStepsNum++;
                updateFormSteps();
                updateProgressbar();
            }
            // Empêcher le passage à l'étape suivante si la validation échoue
            event.preventDefault();
        });
    });

  
    // Gestion du clic sur les boutons "Précédent"
    prevBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            formStepsNum--;
            updateFormSteps();
            updateProgressbar();
        });
    });
  
    // Réglage de la hauteur du textarea en fonction du contenu
    textarea.addEventListener("keyup", e => {
        textarea.style.height = "auto";
        let scHeight = e.target.scrollHeight;
        textarea.style.height = `${scHeight}px`;
    });

    function validateSections0(sectionElement) {
        // Vérification du titre et du sous-titre
        const titreInput = sectionElement.querySelector('input[name$="[titre]"]');
        const sousTitreInput = sectionElement.querySelector('input[name$="[soustitre]"]');
        
        if (!titreInput || !sousTitreInput || !titreInput.value.trim() || !sousTitreInput.value.trim()) {
            // console.log("Titre ou sous-titre manquant");
            return false;
        }
    
        const questions = sectionElement.querySelectorAll('.questionnaire');
        
        if (questions.length === 0) {
            // console.log("Aucune question trouvée");
            return true; 
        }
    
        for (let question of questions) {
            const reponses = question.querySelectorAll('.circle-list li');
            
            if (reponses.length === 0) {
                // console.log("Aucune réponse trouvée pour une question");
                return false;
            }
    
            for (let reponse of reponses) {
                const libreponseInput = reponse.querySelector('input[name$="[libreponse]"]');
                const resultSelect = reponse.querySelector('select[name$="[result]"]');
                const fileInput = reponse.querySelector('input[type="file"]');
                
                if (!libreponseInput || !resultSelect || !fileInput) {
                    // console.log("Champs manquants dans une réponse");
                    return false;
                }
    
                const libreponse = libreponseInput.value.trim();
                const result = resultSelect.value;
    
                if ((!libreponse && !fileInput.files.length) || !result) {
                    // console.log("Champs requis non remplis dans une réponse");
                    return false;
                }
            }
        }
        
        return true;
    }
    

    function validateSection(sectionElement) {

        // Vérification du titre et du sous-titre
        const titreInput = sectionElement.querySelector('input[name$="[titre]"]');
        const sousTitreInput = sectionElement.querySelector('input[name$="[soustitre]"]');
        const noteprincipaleInput = sectionElement.querySelector('input[name="noteprincipale"]');
        const noteprincipale = noteprincipaleInput ? noteprincipaleInput.value.trim() : null;
        
        if (!titreInput || !sousTitreInput || !titreInput.value.trim() || !sousTitreInput.value.trim()) {
            // console.log("Titre ou sous-titre manquant");
            return false;
        }
    
        const questions = sectionElement.querySelectorAll('.questionnaire');
        
        if (questions.length === 0) {
            return true; 
        }
        
        let totalPoints = 0;
        for (let question of questions) {
            const reponses = question.querySelectorAll('.circle-list li');
            
            if (reponses.length === 0) {
                return false;
            }
    
            for (let reponse of reponses) {
                const libreponseInput = reponse.querySelector('input[name$="[libreponse]"]');
                const resultSelect = reponse.querySelector('select[name$="[result]"]');
                const pointsInput = reponse.querySelector('input[name$="[points]"]');
                const fileInput = reponse.querySelector('input[type="file"]');
                
                if (!libreponseInput || !resultSelect || !pointsInput || !fileInput) {
                    return false;
                }
    
                const libreponse = libreponseInput.value.trim();
                const result = resultSelect.value;
                const points = pointsInput.value.trim();
                
                if ((!libreponse && !fileInput.files.length) || !result || !points) {
                    return false;
                }
                if (result === "bonne_reponse") {
                    totalPoints = parseInt(totalPoints) + parseInt(points);
                    // console.log(totalPoints);
                }
            }
        }
        if (totalPoints !== parseInt(noteprincipale)) {
            return `Erreur : la somme des points de bonne réponse (${totalPoints}) ne correspond pas à la note principale (${noteprincipale}).`;
        }
        return true;
    }

    // Initialisation de l'affichage du formulaire
    updateFormSteps();
  });


  