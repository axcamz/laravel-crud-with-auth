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


const dropdown = document.querySelector('.dropdown');
const dropdown_icon = document.querySelector('.dropdown-icon')
dropdown.addEventListener('click', () => {
    dropdown.classList.toggle('open');
})

// close dropdown
document.addEventListener('keydown', (e) => {
    if(e.key == 'Escape'){
        dropdown.classList.remove('open')
    }
})

// Logout handle
const logout = document.querySelector('.logout')
logout.addEventListener('click', (e)=>{
    e.preventDefault();
    document.getElementById('logout').submit();
})

// handle navbar
const trigger = document.querySelector('.trigger');
const listNav = document.querySelector('.nav-link');
trigger.addEventListener('click', () => {
    listNav.classList.toggle('hidden');
})
