if (document.querySelector('#homepageOptions')) {
  const modalOverlay = document.querySelector('.modal-overlay');
  const modalBtns = document.querySelectorAll('.modalBtn');
  const saveBtn = modalOverlay?.querySelector('.saveBtn');
  const modalContainer = modalOverlay?.querySelector('.modalContainer');
  let dataId;

  const openModal = (e) => {
    dataId = e.target.parentNode.parentNode.children[0].innerHTML;
    let dataContent = data_json.filter((row) => row.id === Number(dataId))[0].data;

    modalContainer.innerHTML = `
    <div class="max-w-2xl mx-auto">
    <h4 class="mb-4 text-2xl font-bold">Turkce</h4>
    <textarea id="message" rows="4"  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">${dataContent.tr}</textarea>
    </div>
    <div class="max-w-2xl mx-auto">
    <h4 class="my-4 text-2xl font-bold">English</h4>
    <textarea id="message" rows="4"  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">${dataContent.en}</textarea>
    </div>
    `;

    modalOverlay.classList.add('openOverlay');
  };

  const closeModal = () => {
    modalOverlay.classList.remove('openOverlay');
  };

  modalBtns.forEach((btn) => {
    btn?.addEventListener('click', openModal);
  });

  const updateOptions = async (e) => {
    e.preventDefault();
    let textAreaData = modalContainer.querySelectorAll('textarea');

    const data = {
      id: dataId,
      content_data: { tr: textAreaData[0].value, en: textAreaData[1].value },
    };
    console.log(data);

    const url = 'http://127.0.0.1:8000/api/options/homepage';
    const options = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    };
    await fetch(url, options)
      .then((response) => response.json())
      .then((result) => {
        return 'basarili bir sekilde homePage options gonderildi!';
      })
      .catch((error) => {
        console.log(error);
      });
  };

  document.querySelector('.cancelBtn')?.addEventListener('click', closeModal);
  modalOverlay?.addEventListener('click', (e) => {
    e.target.classList.contains('close-overlay') && closeModal();
  });
  saveBtn?.addEventListener('click', updateOptions);
}
