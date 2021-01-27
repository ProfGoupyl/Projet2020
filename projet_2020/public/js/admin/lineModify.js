// Script peremettant de modifier une ligne du tableau des users/cours (en fonction de la page ou l'on se trouve)
const modifyBtns = document.querySelectorAll('.modify-btn');
const inputs = document.querySelectorAll('.line-input');
const saveBtns = document.querySelectorAll('.save-btn')

modifyBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Reset l'affichage des inputs et des buttons
        modifyBtns.forEach(btn => btn.style.display = 'block')
        saveBtns.forEach(btn => btn.style.display = 'none')
        inputs.forEach(input => {
            if (input.disabled == false) {
                input.style.border = "none";
                input.style.backgroundColor = "white";
                input.disabled = true;
            }
        })
        // Vise la ligne actuelle et active les inputs + le save button
        const idTarget = btn.dataset.target;
        const currentInputs = document.querySelectorAll(`.input-${idTarget}`);
        const saveBtn = document.querySelector(`#save-${idTarget}`)
        const deleteForm = document.querySelector(`#test`)
        console.log(deleteForm);
        currentInputs.forEach(input => {
            input.style.border = "1px solid black";
            input.style.backgroundColor = "#f3f3f3";
            input.disabled = false;
        });
        btn.style.display = "none";
        saveBtn.style.display = "inherit";

    })
})

const deleteBtns = document.querySelectorAll('.delete-btn');
const deleteModal = document.querySelector('#delete-modal');
const deleteTitle = document.querySelector('#delete-title');
const deleteClose = document.querySelector('#delete-close');
const deleteForm = document.querySelector('#delete-form');
deleteBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        deleteModal.style.display = "block";
        deleteTitle.innerHTML = btn.dataset.titre;
        deleteForm.action = `${btn.dataset.target}`;
    })
})
deleteClose.addEventListener('click', () => deleteModal.style.display = "none")


const csvShow = document.querySelector('#csv-show');
const csvImg = document.querySelector('#csv-img');
csvShow.addEventListener('click', () => {
    if (csvImg.style.display === "none")
        csvImg.style.display = "block"
    else {
        csvImg.style.display = "none"
    }
})