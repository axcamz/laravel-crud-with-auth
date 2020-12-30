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
console.log(dropdown);
dropdown.addEventListener('click', () => {
    dropdown.classList.toggle('open');
})
