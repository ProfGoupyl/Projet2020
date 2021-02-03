const editBtns = document.querySelectorAll('.edit-module')
const titre = document.querySelector('#edit-titre')
const desc = document.querySelector('#edit-desc')
const url = document.querySelector('#edit-video')
const form = document.querySelector('#form-module')
editBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        titre.value = btn.dataset.titre;
        desc.value = btn.dataset.desc;
        url.value = btn.dataset.url;
        form.action = `/admin/module/${btn.dataset.action}`
        const textEditor = document.querySelectorAll('.ck-editor');
        if (textEditor.length === 2) {
            textEditor[1].remove();
        }
        ClassicEditor
            .create(document.querySelector('#edit-desc'))
            .catch(error => {
                console.error(error);
            });
    })
})