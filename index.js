let popupBtn = document.querySelector('.price__left_btn_item'),
  popup = document.querySelector('.popup'),
  burger = document.querySelector('.header__nav')

let navLinks = document.querySelectorAll('.header__nav_item')

navLinks.forEach((e) => {
  let elementID = e.dataset.scroll

  e.addEventListener('click', function (e) {
    let elementOffset = document.querySelector(elementID).offsetTop
    e.preventDefault()
    window.scrollTo({
      top: elementOffset - 150,
      behavior: 'smooth',
    })
    if (burger.classList.contains('header__nav_burger')) {
      burger.classList.remove('header__nav_burger')
    }
  })
})

window.addEventListener('click', (e) => {
  if (e.target.closest('.price__left_btn_item')) {
    e.preventDefault()
    popup.classList.add('popup__active')
    return
  }
  if (
    (!e.target.closest('.popup') &&
      popup.classList.contains('popup__active')) ||
    e.target.closest('.popup__close')
  ) {
    popup.classList.remove('popup__active')
  }
  if (e.target.closest('.burger')) {
    burger.classList.add('header__nav_burger')
  }
  if (e.target.closest('.burger__close')) {
    burger.classList.remove('header__nav_burger')
  }
})
