import { getTokenFromCookie } from './getTokenFromCookie';
console.log(getTokenFromCookie('token'));

const logoutSubmit = document.querySelector('.logoutSubmit');
const token = getTokenFromCookie('token');
logoutSubmit &&
  logoutSubmit.addEventListener('click', async (e) => {
    e.preventDefault();
    const data = {
      token,
    };
    console.log(token);
    const url = 'http://127.0.0.1:8000/api/auth/logout';
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
        window.location.href = 'http://127.0.0.1:8000/login';
      })
      .catch((error) => {
        console.log(error);
      });
  });
