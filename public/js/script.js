const session = document.querySelector('.session');


window.addEventListener('load', () => {
    try {
        session.classList.add('animate')
        setTimeout(() => {
            session.classList.remove('animate')
        }, 3000);
    } catch (error) {
    }
});

// handle navbar
const trigger = document.querySelector('#trigger');
const listNav = document.querySelector('#nav-link');
const icon = document.querySelectorAll('.icon');
trigger.addEventListener('click', () => {
    icon[0].classList.toggle('hidden')
    icon[1].classList.toggle('hidden')
    listNav.classList.toggle('hidden');
})

const dropdown = document.querySelector('.dropdown');
const dropdown_icon = document.querySelector('.dropdown-icon')
dropdown.addEventListener('click', () => {
    dropdown.classList.toggle('open');
})


// Logout handle
const logout = document.querySelector('.logout')
logout.addEventListener('click', (e)=>{
    e.preventDefault();
    document.querySelector('#logout').submit();
})

// Preview Image before publish
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview-thumbnail').removeClass('hidden')
            $('#preview-thumbnail').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#thumbnail").change(function(){
    readURL(this);
});

// delete Post handle

const destory = document.querySelector('#delete');
const deleteConfirm = document.querySelector('.delete-confirm')
const closeConfirm = document.querySelector('.close');
destory.addEventListener('click', () => {
    deleteConfirm.classList.toggle('open');
})

closeConfirm.addEventListener('click', () => {
    deleteConfirm.classList.remove('open')
})

// close Handle in press esc Key
document.addEventListener('keydown', (e) => {
    if(e.key == 'Escape'){
        dropdown.classList.remove('open')
        deleteConfirm.classList.remove('open')
    }
})
