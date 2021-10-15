// require('croppie');
// window.addEventListener('DOMContentLoaded', function () {

//   let $uploadCrop,
//       rawImg
  
//   function readFile(input, modalId, modalBodyId) {
//     if(input.files && input.files[0]) {
//       let reader = new FileReader();
//       reader.onload = function(e) {
//         $(modalBodyId).addClass('ready');
//         $(modalId).modal('show');
//         rawImg = e.target.result;
//       }
//       reader.readAsDataURL(input.files[0]);
//     }
//   }
  
//   $uploadCrop = $('#upload-demo').croppie({
//     viewport: {
//         width: 100,
//         height: 100,
//         type: 'square',
//     },
//     enforceBoundary: false,
//     enableExif: false
//   });
  
//   $('#cropImagePop').on('shown.bs.modal', function () {
//     $uploadCrop.croppie('bind', {
//         url: rawImg
//     }).then(function () { });
//   });
  
//   $('.image').on('change', function () {
//     imageId = $(this).data('id');
//     $('#cancelCropBtn').data('id', imageId);
//     readFile(this, '#cropImagePop', '#upload-demo');
//     $(this).val('');
//     console.log('change!');
//   });
  
//   $('#cropImageBtn').on('click', function (ev) {
//     $uploadCrop.croppie('result', {
//         type: 'base64',
//         format: 'jpg',
//         backgroundColor: '#fff',
//         size: { width: 320, height: 320 }
//     }).then(function (resp) {
//         $('#image-output').attr('src', resp);
//         $('#cropImage').val(resp);
//         $('#cropImagePop').modal('hide');
//     });
//   });
// });












// $uploadCrop = $('#upload-demo').croppie({
//   enableExif: true,
//   viewport: {
//       width: 200,
//       height: 200,
//       type: 'square'
//   },
//   boundary: {
//       width: 300,
//       height: 300
//   }
// });

// $("#image").on('change', function(){
//   if(window.File && window.FileReader && window.FileList && window.Blob) {
//     let reader = new FileReader();
//     reader.onload = function(e) {
//       $uploadCrop.croppie('bind', {
//         url: e.target.result
//       }).then(function() {
//         console.log('jQuery bind complete');
//       });
//     }
//     reader.readAsDataURL(this.files[0]);
//   }
// });

// $('#uploadImage').on('click', function (ev) {
// 	$uploadCrop.croppie('result', {
// 		type: 'canvas',
// 		size: 'viewport'
// 	}).then(function (resp) {

//     document.getElementById('image').setAttribute('src', resp);
//     // $.ajax({
// 		// 	url: "/image-crop",
// 		// 	type: "POST",
// 		// 	data: {"image":resp},
// 		// 	success: function (data) {
// 		// 		html = '<img src="' + resp + '" />';
// 		// 		$("#upload-demo-i").html(html);
// 		// 	}
// 		// });
// 	});
// });