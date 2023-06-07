const registerSubmit = document.querySelector('.registerSubmit');
const registerName = document.querySelector('[name="name"]');
const registerEmail = document.querySelector('[name="email"]');
const registerPass = document.querySelector('[name="password"]');
const registerPassConf = document.querySelector('[name="password_confirmation"]');
console.log('register');

registerSubmit &&
  registerSubmit.addEventListener('click', async () => {
    const data = {
      name: registerEmail.value,
      email: registerEmail.value,
      password: registerPass.value,
      password_confirmation: registerPassConf.value,
    };
    const url = 'http://127.0.0.1:8000/api/auth/register';
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
        window.location.href = 'http://127.0.0.1:8000/dashboard/';
      })
      .catch((error) => {
        console.log('Hata:', error);
      });
  });
