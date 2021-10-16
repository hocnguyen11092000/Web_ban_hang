
const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

const nav_list = [...$$('.sidebar__list .item')]

const sub = [...$$('.sub')]

nav_list.forEach(function(item, index) {
  item.onclick = function () {

    sub[index].classList.toggle('show')
    
    Object.assign(sub[index].style, {
      background: "#fff",
      color: '#333',
      borderRadius: '5px'
    })
  }
})