import './pages/header';
import './pages/register';
import './pages/login';
import './pages/logout';
import './pages/dashboard/blog/create';
import './pages/dashboard/dashboard';
import './pages/portfolio';
import './pages/dashboard/options/page/main';
import './pages/dashboard/blog/list';
import { getTokenFromCookie } from './pages/getTokenFromCookie';
import { initTE, Select } from 'tw-elements';
console.log('main.js');
initTE({ Select });

AOS.init({
  duration: 700,
  once: true,
  offset: 10, // offset (in px) from the original trigger point
  easing: 'ease-in-out',
});

console.log(getTokenFromCookie('token'));
