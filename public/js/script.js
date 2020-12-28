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
