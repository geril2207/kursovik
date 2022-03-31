let popupBtn = document.querySelector('.price__left_btn_item'),
  popup = document.querySelector('.popup'),
  burger = document.querySelector('.header__nav')

let navLinks = document.querySelectorAll('.header__nav_item_scroll')

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
