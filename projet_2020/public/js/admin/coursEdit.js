const editBtns = document.querySelectorAll('.edit-module')
const titre = document.querySelector('input[name=titre]')
const desc = document.querySelector('textarea[name=description]')
const url = document.querySelector('input[name=url_video]')
const form = document.querySelector('#form-module')
editBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        titre.value = btn.dataset.titre;
        desc.value = btn.dataset.desc;
        url.value = btn.dataset.url;
        form.action = `/admin/module/${btn.dataset.action}`
    })
})