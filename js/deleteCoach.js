const popupBack = document.querySelector('.popup__background')
const popup = document.querySelector('.popup')
const coachIdDiv = document.querySelector('.coachid_insert')
const coachNameDiv = document.querySelector('.popup__coach_name')
let coachId = -1
window.addEventListener('click', (e) => {
  if (e.target.closest('.coach__list_btn_delete')) {
    e.preventDefault()
    coachId = e.target.dataset.coachid
    coachIdDiv.textContent = coachId
    coachNameDiv.textContent = e.target.dataset.coachname
    popup.classList.add('popup__active')
    return popupBack.classList.add('popup__background_active')
  }
  if (
    (!e.target.closest('.popup') &&
      popup.classList.contains('popup__active')) ||
    e.target.closest('.popup__close') ||
    e.target.closest('.popup__close_btn')
  ) {
    popup.classList.remove('popup__active')
    popupBack.classList.remove('popup__background_active')
  }
})

window.addEventListener('submit', async (e) => {
  e.preventDefault()
  let formData = new FormData()

  formData.append('id', coachId)
  const res = await fetch('./coach_delete.php', {
    method: 'POST',
    body: formData,
  })
  const resData = await res.json()

  if (resData.success) {
    alert('Тренер успешно удален')
    return document.location.reload()
  }
  return alert('Что-то пошло не так')
})
