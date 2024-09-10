/*////// MODAL LOGIN-REGISTRER ///////*/
window.onload = () => {
    // On récupère tous les boutons d'ouverture de modale
    const modalButtons = document.querySelectorAll("[data-toggle=modal]");

    for (let button of modalButtons) {
        button.addEventListener("click", function (e) {
            // On empêche la navigation
            e.preventDefault();

            // On récupère le data-target
            let target = this.dataset.target;

            // On récupère la bonne modale
            let modal = document.querySelector(target);
            // On affiche la modale en ajoutant la class "show"
            modal.classList.add("show");

            // On récupère les boutons de fermeture
            const modalClose = modal.querySelectorAll("[data-dismiss=form]");
            for (let close of modalClose) {
                close.addEventListener("click", () => {
                    modal.classList.remove("show");
                });
            }

            //On gère la fermeture lors du click sur la zone grise
            modal.addEventListener("click", function(){
                this.classList.remove("show");
            });
            //On évite la propagation du click d'un enfant a son parent, car sans ca, la modal ferme si on click dessus
            modal.children[0].addEventListener("click", function(e){
                e.stopPropagation();
            });
        });
    }

    // Pour passer de la modal Login à Register
    const createAccButton = document.querySelector(".create-acc");
    const loginModal = document.querySelector("#modal");
    const registerModal = document.querySelector("#modal2");

    createAccButton.addEventListener("click", function (e) {
        e.preventDefault();
        loginModal.classList.remove("show");
        registerModal.classList.add("show");
    });

    // Pour passer de la modal Register à Login
    const loginButton = document.querySelector(".loged-modal");

    loginButton.addEventListener("click", function (e) {
        e.preventDefault();
        registerModal.classList.remove("show");
        loginModal.classList.add("show");
    });
}









/*////// AUDIO PLAYING FRIEND LIST //////*/
document.querySelectorAll('.dial-icon').forEach(ppFriend => {
    const hoverSound = ppFriend.closest('.bloc-fl-unique').querySelector('.hover-sound');
    ppFriend.addEventListener('click', () => {
        hoverSound && (hoverSound.currentTime = 0, hoverSound.play());
    });
});








/*////// SLIDER-OPENING MANGA TABLE //////*/
let bookTable = document.querySelector(".user-manga-panel");
let mangaBtnSlide = document.querySelector(".btn-list");

bookTable.style.transition = "height 0.7s ease-in-out";

function slidingBook1(event) {
    event.preventDefault();
    if (bookTable.style.height !== "200px") {
        bookTable.style.height = "200px"; 
    } else if (bookTable.style.height === "200px") { 
        bookTable.style.height = "1200px";
    }
}
mangaBtnSlide.addEventListener("click", slidingBook1);


/* Comics Table */
let bookTable2 = document.querySelector(".user-comics-panel");
let comicsBtnSlide = document.querySelector(".btn-list2");

bookTable2.style.transition = "height 0.7s ease-in-out";

function slidingBook2(event) {
    event.preventDefault();
    if (bookTable2.style.height !== "200px") {
        bookTable2.style.height = "200px"; 
    } else if (bookTable2.style.height === "200px") { 
        bookTable2.style.height = "1200px";
    }
}
comicsBtnSlide.addEventListener("click", slidingBook2);




