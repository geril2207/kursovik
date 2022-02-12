form.addEventListener('submit', (e) => {
  e.preventDefault()
  if (formInputPassword.value === formInputConfirmPassword.value) {
    return form.submit()
  }
  formInputPassword.insertAdjacentHTML(
    'afterEnd',
    '<span class="login__form_erorr">Пароли не совпадают</span>'
  )
})
