import Cropper from 'cropperjs';

let image = document.getElementById('sample_image');
const modalOverlay = document.querySelector('.modal-overlay');
const imageArea = document.getElementById('img-area');
let isModalOpen = false;
let cropper;

// modalOverlay.addEventListener('click', (e) => {
//   if (e.target.classList.contains('close-overlay')) {
//     modalOverlay.classList.remove('openOverlay');
//     isModalOpen = false;

//     setTimeout(() => {
//       if (cropper) {
//         cropper.destroy();
//         cropper = null;
//       }
//     }, 300);
//   }
// });

const closeModal = () => {
  modalOverlay.classList.remove('openOverlay');
  isModalOpen = false;

  setTimeout(() => {
    if (cropper) {
      cropper.destroy();
      cropper = null;
    }
  }, 300);
  document.getElementById('modalBtn').value = null;
};

const openModal = (e) => {
  let files = e.target.files;

  const done = (url) => {
    image.src = url;
    modalOverlay.classList.add('openOverlay');
    isModalOpen = true;
    cropper = new Cropper(image, {
      //   aspectRatio: 1,
      viewMode: 3,
      preview: '.preview',
    });
  };

  if (files && files.length > 0) {
    let reader = new FileReader();
    reader.onload = function (e) {
      done(reader.result);
    };
    reader.readAsDataURL(files[0]);
  }
};

const cropSubmit = () => {
  let canvas = cropper.getCroppedCanvas();
  canvas.toBlob((blob) => {
    let url = URL.createObjectURL(blob);
    let reader = new FileReader();
    reader.readAsDataURL(blob);
    /* fetching */
    reader.onloadend = () => {
      let croppedImage = document.createElement('img');
      croppedImage.src = reader.result;

      imageArea.hasChildNodes() && imageArea.firstElementChild.remove();
      imageArea.appendChild(croppedImage);
      closeModal();
    };
  });
};
const createBlogCancelBtn = document.querySelector('.dashboard');
if (createBlogCancelBtn) {
  document.querySelector('.cancelBtn')?.addEventListener('click', closeModal);
  document.getElementById('modalBtn')?.addEventListener('change', openModal);
  document.querySelector('.cropBtn')?.addEventListener('click', cropSubmit);
}
