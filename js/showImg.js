const fileInput = document.getElementById('file')
const previewImgContainer = document.querySelector('.coach_create_show_img')
function handleFileSelect(evt) {
  var files = evt.target.files // FileList object
  previewImgContainer.innerHTML = ''
  // Loop through the FileList and render image files as thumbnails.
  for (var i = 0, f; (f = files[i]); i++) {
    // Only process image files.
    if (!f.type.match('image.*')) {
      continue
    }

    var reader = new FileReader()

    // Closure to capture the file information.
    reader.onload = (function (theFile) {
      return function (e) {
        // Render thumbnail.
        var span = document.createElement('span')
        span.innerHTML = [
          '<img class="preview__img" src="',
          e.target.result,
          '" title="',
          theFile.name,
          '"/>',
        ].join('')
        previewImgContainer.insertBefore(span, null)
      }
    })(f)

    // Read in the image file as a data URL.
    reader.readAsDataURL(f)
  }
}

fileInput.addEventListener('change', handleFileSelect, false)
