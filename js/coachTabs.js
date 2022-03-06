const listItems = document.querySelectorAll('.coach_times_item_wrapper')
const select = document.querySelector('.coach__select_time')
const popup = document.querySelector('.popup')
const popupBack = document.querySelector('.popup__background')
const popupDate = document.querySelector('.poup__date_value')
const popupTime = document.querySelector('.poup__time_value')
let currentDate = listItems[0].dataset.day
let currentTime = null
function showTab(e) {
  listItems.forEach((item) => {
    if (item.dataset.day != e.target.value) {
      return item.classList.add('coach_times_item_wrapper_hidden')
    }
    currentDate = item.dataset.day
    return item.classList.remove('coach_times_item_wrapper_hidden')
  })
}

select.addEventListener('change', showTab)

window.addEventListener('click', (e) => {
  if (e.target.closest('.coach_times_item_disabled')) {
    return
  }
  if (e.target.closest('.coach_times_item')) {
    e.preventDefault()
    popupDate.textContent += currentDate
    currentTime = e.target.dataset.time
    popupTime.textContent += e.target.dataset.time
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
    popupDate.textContent = 'Дата:'
    popupTime.textContent = 'Время:'
  }
})

window.addEventListener('submit', async (e) => {
  e.preventDefault()
  let formData = new FormData()

  formData.append('date', currentDate)
  formData.append('time', currentTime)
  formData.append('coach_id', coach_id.value)
  const res = await fetch('./record.php', {
    method: 'POST',
    body: formData,
  })
  const resData = await res.json()

  if (resData.success) {
    alert('Вы успешно записаны')
    console.log(1)
    return document.location.reload()
  }
  return alert('Что-то пошло не так')
})
