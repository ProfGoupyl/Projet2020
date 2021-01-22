// Script permettant d'afficher la modal d'ajout d'un user/cours (en fonction de la page où l'on se trouve)
const modal = document.querySelector('#modal');
const openModal = document.querySelector('#modal-open')
const closeModal = document.querySelector('#modal-close')
openModal.addEventListener('click', () => {
    modal.style.display = "block";
})
closeModal.addEventListener('click', () => {
    modal.style.display = "none";
})