// MRW image upload JS

if (document.getElementById('drop_zone')) {
  var myDropzone = new Dropzone("div#drop_zone", { url: "/photos"});
}