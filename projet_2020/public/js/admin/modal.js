// Script permettant d'afficher la modal d'ajout d'un user/cours (en fonction de la page où l'on se trouve)
const modal = document.querySelector('#modal');
const openModal = document.querySelector('#modal-open')
const closeModal = document.querySelector('#modal-close')
const icon = document.querySelector('.fa-plus')
openModal.addEventListener('click', () => {
    if (modal.style.display == "block") {
        modal.style.display = "none";
        icon.style.transform = 'none';
    } else {
        modal.style.display = "block";
        icon.style.transform = 'rotate(45deg)'
    }
})

