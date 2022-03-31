const addPopupBack = document.querySelector('.popup__background')
const addPopup = document.querySelector('.popup')
const deletePopup = document.querySelector('.delete_popup')
const deletePopUpBack = document.querySelector('.delete_popup__background')
const coachIdDiv = document.querySelector('.coachid_insert')
const popupAbonementNameDiv = document.querySelector('.popup__abonement_name')
const popupAbonementDeleteNameDiv = document.querySelector(
  '.popup__abonement_delete_name'
)
let abonement = ''
let abonementId = -1
let submitType = null
window.addEventListener('click', (e) => {
  if (e.target.closest('.clubcard__item_btn')) {
    e.preventDefault()
    abonement = e.target.dataset.abonement
    popupAbonementNameDiv.textContent = abonement
    addPopup.classList.add('popup__active')
    submitType = 'add'
    return addPopupBack.classList.add('popup__background_active')
  }
  if (e.target.closest('.delete_abonement_btn')) {
    e.preventDefault()
    popupAbonementDeleteNameDiv.textContent = e.target.dataset.abonementname
    deletePopup.classList.add('popup__active')
    submitType = 'delete'
    abonementId = e.target.dataset.abonementid
    return deletePopUpBack.classList.add('popup__background_active')
  }
  if (
    (!e.target.closest('.popup') &&
      deletePopup.classList.contains('popup__active')) ||
    addPopup.classList.contains('popup__active') ||
    e.target.closest('.popup__close') ||
    e.target.closest('.popup__close_btn')
  ) {
    deletePopup.classList.remove('popup__active')
    deletePopUpBack.classList.remove('popup__background_active')
    addPopup.classList.remove('popup__active')
    addPopupBack.classList.remove('popup__background_active')
  }
})

window.addEventListener('submit', async (e) => {
  e.preventDefault()
  let formData = new FormData()
  let res
  if (submitType == 'add') {
    formData.append('abonement', abonement)
    res = await fetch('./abonement_add.php', {
      method: 'POST',
      body: formData,
    })
  } else if (submitType == 'delete') {
    formData.append('id', abonementId)
    res = await fetch('./abonement_delete.php', {
      method: 'POST',
      body: formData,
    })
  }
  const resData = await res.json()
  if (resData.success) {
    return document.location.reload()
  }
  return alert('Что-то пошло не так')
})
