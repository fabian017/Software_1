const Clickbutton = document.querySelectorAll('button')
Clickbutton.forEach(btn => {
    btn.addEventListener('click', () => console.log('button'))
})