let showError = false
form.addEventListener('submit', (e) => {
  e.preventDefault()
  if (formInputPassword.value === formInputConfirmPassword.value) {
    return form.submit()
  }
  if (!showError) {
    formInputPassword.insertAdjacentHTML(
      'afterEnd',
      '<span class="login__form_erorr">Пароли не совпадают</span>'
    )
    showError = true
  }
})
