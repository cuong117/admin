var selected = 'showoff'
var showoff = document.querySelector('.showoff')
var iterative = document.querySelector('.iterative')
var showoff_div = document.querySelector('#showoff')
var iterative_div = document.querySelector('#iterative')

showoff.classList.add('active')

showoff.addEventListener('click', e => {
    e.target.classList.add('active')
    iterative.classList.remove('active')
    showoff_div.style.display = 'block'
    iterative_div.style.display = 'none'
})

iterative.addEventListener('click', e => {
    e.target.classList.add('active')
    showoff.classList.remove('active')
    iterative_div.style.display = 'block'
    showoff_div.style.display = 'none'
})