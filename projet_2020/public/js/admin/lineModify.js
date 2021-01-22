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
        const currantInputs = document.querySelectorAll(`.input-${idTarget}`);
        const saveBtn = document.querySelector(`#save-${idTarget}`)
        currantInputs.forEach(input => {
            input.style.border = "1px solid black";
            input.style.backgroundColor = "#f3f3f3";
            input.disabled = false;
        });
        btn.style.display = "none";
        saveBtn.style.display = "inherit";
    })
})