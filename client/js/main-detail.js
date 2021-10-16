const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)


// quanlity

const minus = $('.minus i')
const plus = $('.plus i')
const quanlity = $('.sub__add-quanlity input')
const quanlityProduct = $('.sub__quanlity p span')

console.log(quanlityProduct.innerText, quanlity.value);

minus && (minus.onclick = () => {
  if (quanlity.value <= 1) {
    minus.style.disable = true
  }
  else {
    quanlity.value--
  }
})

plus && (plus.onclick = () => {
  if (Number.parseInt(quanlity.value) >= Number.parseInt(quanlityProduct.innerText)) {
    plus.style.disable = true
  }
  else {
    quanlity.value++
  }
})

// hide cart
const cart = $('.cart')
function hide() {
  cart.classList.remove('active')
}
function toggleCart() {
  cart.classList.toggle('active')
}
function showCart() {
  cart.classList.add('active')
}

const addCart = $('.add-cart')
const watch_cart = $('.watch-cart')

addCart.addEventListener('click', addToCart)
addCart.addEventListener('click', showCart)
addCart.addEventListener('click', pageCartList)
watch_cart.addEventListener('click', toggleCart)
watch_cart.addEventListener('click', pageCartList)

function pageCartList() {
  let total = 0
  let html = ''
  for (let i = 0; i < cartList.length; i++) {
    total += cartList[i].price * cartList[i].num
    html += `
      <li class="item">
        <img src="../images/${cartList[i].img}" alt="">
        <span>${cartList[i].name}</span>
        <span class="item-count">${cartList[i].num}</span>
        <span class="delete-item" onclick="deleteItem(${cartList[i].id})">Xóa</span>
      </li>`
  }
  $('.cart__list').innerHTML = html
  $('.count-cart').innerText = ' Tổng tiền: ' + total + ' trieu'
}
function deleteItem(id) {
  const check_delete = confirm('M chắc chưa? ')
  if (check_delete) {
    for (var i = 0; i < cartList.length; i++) {
      if (cartList[i].id == id) {
        cartList.splice(i, 1)
        break
      }
    }

    const now = new Date()
    const time = now.getTime()
    const expireTime = time + 30 * 24 * 60 * 60 * 1000
    now.setTime(expireTime)

    document.cookie = "cart=" + JSON.stringify(cartList) + ";path=/;expires=" + now.toUTCString()

    location.reload()
  }
}

//js for scrollTop
const scrollTop = $('.scroll-top')

scrollTop.onclick = () => {
  window.scroll({
    top: 0,
    behavior: 'smooth'
  })
}