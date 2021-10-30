const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

// js for slider 
const silder_pre = $('.slider-control-pre')
const silder_next = $('.slider-control-next')

const slider_list = [...$$('.left-slider .imgBox img')]
const slider_length = slider_list.length
const DEFINE_LENGTH = 840 * slider_length + 'px'
const box = $('.left-slider .imgBox')
box.style.width = DEFINE_LENGTH

const size = 840

let index = 0
const sliderNext = () => {
  if (index < slider_length - 1) {
    index++
  } else {
    index = 0
  }
  box.style.transform = `translateX(${-size * index}px)`
}

const sliderPre = () => {
  if (index === 0) {
    index = slider_length - 1
  }
  else {
    index--
  }
  box.style.transform = `translateX(${-size * index}px)`
}
silder_next.onclick = sliderNext
silder_pre.onclick = sliderPre

setInterval(() => {
  sliderNext()
}, 5000)

// js for hover nav
const nav_item = [...$$('.header-item')]
const line = $('.line')

nav_item.forEach(function (item, index) {
  item.onmouseover = () => {
    line.style.left = item.offsetLeft + 'px'
    line.style.width = item.offsetWidth + 'px'
  }
  item.onmouseout = () => {
    line.style.width = 0 + 'px'
    line.style.left = '207px'
  }
})

//js for sticky navbar

window.addEventListener('scroll', () => {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    $('header').classList.add('sticky')
  }
  else {
    $('header').classList.remove('sticky')
  }
})


// search 
const search = $('.header-search')
const iconClose = $('.icon-close')
iconClose.onclick = function () {
  $('.search-product').style.width = '0'
  this.style.display = 'none'
  document.body.style.overflow = 'auto'
}

const searchProduct = () => {
  $('.search-product').style.width = 'auto'
  document.body.style.overflow = 'hidden'
  iconClose.style.display = 'flex'
  let input = $('.search-product input')

  input.style.display = 'block'
}

window.location.href.includes('?q=') ? window.scroll({ 'top': 1050, 'behavior': 'smooth' }) : ''

search.addEventListener('click', searchProduct)

//product Slider
const ProductSilder_pre = $('.productSlider-control-pre')
const ProductSilder_next = $('.productSlider-control-next')
const productsliderList = [...$$('.productSlider .product')]

const ProductSlider_length = productsliderList.length
const PRODUCTSLIDER_DEFINE_LENGTH = 228 * ProductSlider_length + 'px'
const ProductSliderBox = $('.slider .productSlider')

ProductSliderBox.style.width = PRODUCTSLIDER_DEFINE_LENGTH
const productSliderSize = 228
const DEFINE_COUNT_PRODUCT = 5
let ProductSliderIndex = 0
const DEFAULT_PRODUCT_SLIDER_MARGIN = 15
const ProductSliderNext = () => {
  if (ProductSliderIndex < ProductSlider_length - DEFINE_COUNT_PRODUCT) {
    ProductSliderIndex++
  } else {
    ProductSliderIndex = 0
  }
  ProductSliderBox.style.transform = `translateX(${-productSliderSize * ProductSliderIndex - (ProductSliderIndex * DEFAULT_PRODUCT_SLIDER_MARGIN)}px)`
}

const productSliderPre = () => {
  if (ProductSliderIndex === 0) {
    ProductSliderIndex = ProductSlider_length - DEFINE_COUNT_PRODUCT
  }
  else {
    ProductSliderIndex--
  }
  ProductSliderBox.style.transform = `translateX(${-productSliderSize * ProductSliderIndex - (ProductSliderIndex * DEFAULT_PRODUCT_SLIDER_MARGIN)}px)`
}
ProductSilder_next.onclick = ProductSliderNext
ProductSilder_pre.onclick = productSliderPre

setInterval(() => {
  ProductSliderNext()
}, 3000)

