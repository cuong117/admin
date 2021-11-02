
var template = document.querySelector('.item').cloneNode(true)
var count = 0;
var item_count = 1;

document.querySelector('[type = "submit"]').addEventListener('click', e => {
    for (var i = 0; i <= count; i++) {
        var id = document.querySelector('#img' + i)
        var area = document.querySelector('#area' + i)
        if (id.value === "") {
            e.preventDefault()
            var spanErr = document.querySelector('#img' + i + ' + span')
            spanErr.style.display = "block"
        } else {
            var spanErr = document.querySelector('#img' + i + ' + span')
            spanErr.style.display = "none"
        }
        if (area.value === "") {
            e.preventDefault()
            var spanErr = document.querySelector('#area' + i + ' + span')
            spanErr.style.display = "block"
        } else {
            var spanErr = document.querySelector('#area' + i + ' + span')
            spanErr.style.display = "none"
        }
    }
})

document.querySelector('.addInfor').addEventListener('click', e => {
    e.preventDefault()
    var node = template.cloneNode(true);
    change_id_for_name(node)
    e.target.parentNode.previousSibling.previousSibling.after(node)
    item_count++
    addlistener(node)
})

function addlistener(element) {
    var but_remove = element.querySelector('[value = "-"]')
    var but_add = element.querySelector('[value = "+"]')
    var inputs = element.querySelectorAll('input')
    var inputs_require = element.querySelectorAll('.require')

    but_remove.addEventListener('click', e => {
        e.preventDefault()
        if (item_count > 1) {
            e.target.parentNode.parentNode.remove()
            item_count--
        }
    })

    but_add.addEventListener('click', e => {
        e.preventDefault()
        var a = template.cloneNode(true);
        change_id_for_name(a)
        e.target.parentNode.parentNode.after(a)
        item_count++;
        addlistener(a)
    })

    inputs.forEach(el => {
        el.addEventListener("keypress", ev => {
            if (ev.keyCode == 13) {
                ev.preventDefault()
                var next = ev.target.nextSibling.nextSibling
                if (next.nodeName === 'SPAN') {
                    next = next.nextSibling.nextSibling
                }
                if (next) {
                    next.focus()
                }
            }
        })
    })

    inputs_require.forEach(el => {
        el.addEventListener('blur', ev => {
            if (ev.target.value === "") {
                ev.target.nextSibling.nextSibling.style.display = "block"
            } else {
                ev.target.nextSibling.nextSibling.style.display = "none"
            }
        })
    })

}

addlistener(document)

function change_id_for_name(element) {
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
}