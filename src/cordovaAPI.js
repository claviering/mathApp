document.addEventListener('backbutton', onBackKeyDown, false)
function onBackKeyDown (e) {
  e.preventDefault()
  alert('Back Button is Pressed!')
}
