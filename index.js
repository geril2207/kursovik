let popupBtn = document.querySelector('.price__left_btn_item'),
  popup = document.querySelector('.popup')

window.addEventListener('click', (e) => {
  if (e.target.closest('.price__left_btn_item')) {
    e.preventDefault()
    popup.classList.add('popup__active')
    return
  }
  if (!e.target.closest('.popup')) {
    popup.classList.remove('popup__active')
  }
})
