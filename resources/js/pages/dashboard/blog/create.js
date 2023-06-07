console.log('create sayfasi OK');
import Cropper from 'cropperjs';
import getCookie from '../../../utils/getCookie';
import '../../../../../public/assets/js/easymde.min.js';
let image = document.getElementById('sample_image');
let usedlang;
const modalOverlay = document.querySelector('.modal-overlay');
const modalOverlay2 = document.querySelector('.modal-overlay2');
const imageArea = document.getElementById('img-area');
const addCatsBtn = document.getElementById('addCatsBtn');
const cancelModalBtn = document.querySelector('.cancelBtn2');
const getCatBtn = document.getElementById('getCatBtn');
const selectedCat = document.getElementById('selectedCat');
const catNameInputTr = document.getElementById('catNameInputTr');
const catNameInputEn = document.getElementById('catNameInputEn');
const editModalBtn = document.getElementById('editModalBtn');
const addModalBtn = document.getElementById('addModalBtn');
const deleteModalBtn = document.getElementById('deleteModalBtn');
const multySelect = document.getElementById('multiSelect');
const blogUpdateBtn = document.getElementById('blogUpdateBtn');
const selectedBlog = document.getElementById('selectedBlog');

let isModalOpen = false;
let cropper;
const blogSendbtn = document.querySelector('.sendBlog ');
let selectedCatId, selectedCatName;

// basic
const blogContent = new EasyMDE({
  element: document.getElementById('create-blog'),
});

const openModal2 = () => {
  modalOverlay2.classList.add('openOverlay');
  closeCatModalFunc();
};
const closeModal2 = () => {
  modalOverlay2.classList.remove('openOverlay');
};
const getCatBtnFunc = () => {
  selectedCatId = selectedCat.value;

  catNameInputTr.value = selectedCat.selectedOptions[0].textContent.trim().split(' / ')[0];
  catNameInputEn.value = selectedCat.selectedOptions[0].textContent.trim().split(' / ')[1];
  editModalBtn.removeAttribute('disabled');
  addModalBtn.setAttribute('disabled', 'true');
  deleteModalBtn.removeAttribute('disabled');
};
const selectCatFunc = () => {
  getCatBtn.removeAttribute('disabled');
};
const closeCatModalFunc = () => {
  editModalBtn.setAttribute('disabled', 'true');
  addModalBtn.removeAttribute('disabled');
  deleteModalBtn.setAttribute('disabled', 'true');
  selectedCat.selectedIndex = 0;
  getCatBtn.setAttribute('disabled', 'true');
  catNameInputTr.value = '';
  catNameInputEn.value = '';
};

const createCat = async () => {
  const data = {
    nameTr: catNameInputTr.value,
    nameEn: catNameInputEn.value,
  };
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
  };
  const url = 'http://127.0.0.1:8000/api/category/create';
  await fetch(url, options)
    .then((response) => response.json())
    .then((result) => {
      console.log(result.category.id);
      afterCreateCat(result.category.id);
    })
    .catch((error) => {
      console.log(error);
    });
};

const afterCreateCat = (id) => {
  var option = document.createElement('option');
  option.value = id;
  var multyText = document.createTextNode(getCookie('lang') === 'tr' ? catNameInputTr.value : catNameInputEn.value);
  var selectedText = document.createTextNode(catNameInputTr.value + ' / ' + catNameInputEn.value);
  option.appendChild(multyText);
  multySelect.appendChild(option);
  let option2 = option.cloneNode(true);

  option2.innerHTML = '';
  option2.appendChild(selectedText);
  selectedCat.appendChild(option2);

  closeModal2();
};
const afterDeleteCat = () => {
  catNameInputTr.value = '';
  catNameInputEn.value = '';
  let option = selectedCat.querySelector(`option[value="${selectedCatId}"]`);

  if (option) {
    option.remove();
  }
  option = multySelect.querySelector(`option[value="${selectedCatId}"]`);
  if (option) {
    option.remove();
  }
  selectedCat.selectedIndex = 0;
};
const deleteCat = async () => {
  const data = {
    id: selectedCatId,
  };
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
  };
  const url = 'http://127.0.0.1:8000/api/category/delete';

  await fetch(url, options)
    .then((response) => response.json())
    .then((result) => {
      console.log(result);
      afterDeleteCat();
      selectedCatId = null;
    })
    .catch((error) => {
      console.log(error);
    });
};

const afterUpdateCat = (nameTr, nameEn) => {
  selectedCat.selectedIndex = 0;
  let multySelectOption = multySelect.querySelector(`option[value="${selectedCatId}"]`);
  let selectedOption = selectedCat.querySelector(`option[value="${selectedCatId}"]`);
  multySelectOption.textContent = getCookie('lang') === 'tr' ? nameTr : nameEn;
  selectedOption.textContent = nameTr + ' / ' + nameEn;
  console.log(multySelectOption);
  console.log(selectedOption);
  closeModal2();
};

const updateCat = async () => {
  const data = {
    id: selectedCatId,
    nameTr: catNameInputTr.value,
    nameEn: catNameInputEn.value,
  };
  const options = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
  };
  const url = 'http://127.0.0.1:8000/api/category/update';
  await fetch(url, options)
    .then((response) => response.json())
    .then((result) => {
      console.log(result);
      afterUpdateCat(result.name.tr, result.name.en);
      selectedCatId = null;
    })
    .catch((error) => {
      console.log(error);
    });
};

editModalBtn?.addEventListener('click', updateCat);
deleteModalBtn?.addEventListener('click', deleteCat);
addModalBtn?.addEventListener('click', createCat);
selectedCat?.addEventListener('change', selectCatFunc);

addCatsBtn?.addEventListener('click', openModal2);
cancelModalBtn?.addEventListener('click', closeModal2);
getCatBtn?.addEventListener('click', getCatBtnFunc);
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
let croppedImage;
const cropSubmit = () => {
  let canvas = cropper.getCroppedCanvas();
  canvas.toBlob((blob) => {
    let url = URL.createObjectURL(blob);
    let reader = new FileReader();
    reader.readAsDataURL(blob);
    /* fetching */
    reader.onloadend = () => {
      croppedImage = document.createElement('img');
      croppedImage.src = reader.result;

      imageArea.hasChildNodes() && imageArea.firstElementChild.remove();
      imageArea.appendChild(croppedImage);
      closeModal();
    };
  });
};
const createBlogPage = document.querySelector('.createBlog');
if (createBlogPage) {
  document.querySelector('.cancelBtn')?.addEventListener('click', closeModal);
  document.getElementById('modalBtn')?.addEventListener('change', openModal);
  document.querySelector('.cropBtn')?.addEventListener('click', cropSubmit);
}
const sendBlog = async (e) => {
  e.preventDefault();
  const blob = await fetch(image.src).then((response) => response.blob());
  const formData = new FormData();

  let selectedValues = [];
  for (var i = 0; i < multySelect.options.length; i++) {
    if (multySelect.options[i].selected) {
      selectedValues.push(multySelect.options[i].value);
    }
  }

  formData.append('title', document.querySelector('[name="title"]').value);
  formData.append('cats', selectedValues);
  formData.append('content', blogContent.value());
  formData.append('file', blob, 'image.jpg');

  const url = 'http://127.0.0.1:8000/api/blog/create';
  const options = {
    method: 'POST',
    body: formData,
  };

  await fetch(url, options)
    .then((response) => response.json())
    .then((result) => {
      console.log(result);
      return 'basarili bir sekilde blog gonderildi!';
    })
    .catch((error) => {
      console.log(error);
    });
};

blogSendbtn && blogSendbtn.addEventListener('click', sendBlog);

const updateBeforeBlog = () => {};
const afterSelectBlog = () => {};

blogUpdateBtn?.addEventListener('click', updateBeforeBlog);
selectedBlog.addEventListener('change', afterSelectBlog);
