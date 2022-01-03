var template = document.querySelector('.item-content0').cloneNode(true)
var h1 = document.querySelector('h1')
var count = 0;
var item_count = 1;
var itemShowed = document.querySelector('.item-content0')
var ul = document.querySelector('ul')
var liSelected = document.querySelector('li')
var liTemp = liSelected.cloneNode(true)
liSelected.classList.add('selected')

document.querySelector('[type = "submit"]').addEventListener('click', e => {
    var accept = false;
    var require = document.querySelectorAll('.item-content' + liSelected.classList[0].split('_')[1] + ' .require')
    var id = document.querySelector('#img' + liSelected.classList[0].split('_')[1])
    e.preventDefault()

    require.forEach(el => {
        if (el.value.trim() === "") {
            var spanErr = el.previousSibling.previousSibling
            spanErr.style.display = "block"
            accept = false
        } else {
            var spanErr = el.previousSibling.previousSibling
            spanErr.style.display = "none"
            accept = true
        }
    })

    if (accept) {
        var title = document.querySelector('#title' + liSelected.classList[0].split('_')[1])
        var div = liSelected.querySelector('div')
        if (title.value.trim() === "")
            div.textContent = id.value.trim()
        else
            div.textContent = title.value.trim()
    }
})

document.querySelectorAll('[type = "submit"]')[1].addEventListener('click', e => {
    var require = document.querySelectorAll('.require')
    var upload = true
    require.forEach(el => {
        if (el.value.trim() === "") {
            upload = false;
        }
    })

    if(!upload){
        alert('Bạn có trường chưa nhập')
        e.preventDefault()
    }
})

document.querySelector('.add').addEventListener('click', e => {
    var li = liTemp.cloneNode(true)
    var item = template.cloneNode(true)
    change_id_for_name(item, li)
    ul.appendChild(li)
    item_count++
    h1.after(item)
    addlistener(item, li)
    item.style.display = 'none'
})

function addlistener(element, li) {
    var inputs = element.querySelectorAll('input')
    var inputs_require = element.querySelectorAll('.require')
    var textarea = document.querySelector('textarea')
    var removebtn = li.querySelector('button')
    inputs.forEach(el => {
        el.addEventListener("keypress", ev => {
            if (ev.keyCode == 13) {
                ev.preventDefault()
                var previous = ev.target.previousSibling.previousSibling
                if (previous.nodeName === 'SPAN') {
                    previous = previous.previousSibling.previousSibling
                }
                if (previous) {
                    previous.focus()
                }
            }
        })
    })

    inputs_require.forEach(el => {
        el.addEventListener('blur', ev => {
            if (ev.target.value === "") {
                ev.target.previousSibling.previousSibling.style.display = "block"
            } else {
                ev.target.previousSibling.previousSibling.style.display = "none"
            }
        })
    })

    inputs.forEach(element => {
        element.setAttribute('data-empty', true)
        element.onchange = e => {
            e.target.setAttribute('data-empty', !e.target.value)
        }
    })

    textarea.setAttribute('data-empty', true)
    textarea.onchange = e => {
        e.target.setAttribute('data-empty', !e.target.value)
    }

    li.addEventListener('click', ev => {
        liSelected.classList.remove('selected')
        li.classList.add('selected')
        liSelected = li
        var item = document.querySelector('.item-content' + liSelected.classList[0].split('_')[1])
        itemShowed.style.display = 'none'
        item.style.display = 'flex'
        itemShowed = item
    })

    removebtn.addEventListener('click', ev => {
        ev.stopPropagation()
        if (item_count > 1) {
            var parentNode = ev.target.parentNode
            var item = document.querySelector('.item-content' + parentNode.classList[0].split('_')[1])
            if (item === itemShowed) {
                liSelected = parentNode.previousElementSibling
                if (!liSelected || liSelected.nodeName === '#text')
                    liSelected = parentNode.nextElementSibling
                liSelected.classList.add('selected')
                itemShowed = document.querySelector('.item-content' + liSelected.classList[0].split('_')[1])
                itemShowed.style.display = 'flex'
            }
            parentNode.remove()
            item.remove()
            item_count--
        }
    })
}

addlistener(document, liSelected)

function change_id_for_name(element, li) {
    count++
    var inputs = element.querySelectorAll('input')
    var labels = element.querySelectorAll('label')
    var textarea = element.querySelector('textarea')

    textarea.id = textarea.id.slice(0, -1) + count
    textarea.name = textarea.name.slice(0, -1) + count

    inputs.forEach(e => {
        e.id = e.id.slice(0, -1) + count
        e.name = e.name.slice(0, -1) + count
    })

    labels.forEach(e => {
        e.htmlFor = e.htmlFor.slice(0, -1) + count
    })

    li.classList.remove(li.classList[0])
    li.classList.add('item_' + count)
    element.classList.remove(element.classList[0])
    element.classList.add('item-content' + count)
}
