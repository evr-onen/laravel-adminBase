import getCookie from '../utils/getCookie';
import createCookie from '../utils/createCookie';

const defaultPageHeader = document.querySelector('.defaultPageHeader');
const headerLogo = document.querySelector('header > h1');
const overlayLogo = document.querySelector('.overlayLogo');

const btnMenu = document.querySelector('.defaultPageHeader .mobilNav  .btnMenu');
const overlayMenu = document.querySelector('.defaultPageHeader .mobilNav .navbtnMenu');
const htMl = document.querySelector('htMl');
const headerImageOverlay = document.querySelector('.headerImageOverlay');
const mainHeader = document.querySelector('.mainHeader');
const pageHeaderBtns = document.querySelectorAll('.pageHeaderBtns > li');

const langBtn = document.querySelector('.langBtn');

if (defaultPageHeader) {
  window.addEventListener('scroll', function () {
    if (window.scrollY > 0 && defaultPageHeader) {
      defaultPageHeader.classList.add('headerScrolled');
      if (overlayLogo) {
        overlayLogo.style.opacity = '0';
        overlayLogo.style.visibility = 'hidden';
      }
      if (mainHeader) {
        headerLogo.style.opacity = '1';
        headerLogo.style.visibility = 'visible';
      }
    } else {
      defaultPageHeader.classList.remove('headerScrolled');
      if (overlayLogo) {
        overlayLogo.style.opacity = '1';
        overlayLogo.style.visibility = 'visible';
      }
      if (mainHeader) {
        headerLogo.style.opacity = '0';
        headerLogo.style.visibility = 'hidden';
      }
    }
  });

  btnMenu &&
    btnMenu.addEventListener('click', (e) => {
      if (e.currentTarget.classList.contains('opened')) {
        headerLogo.style.visibility = 'hidden';
        defaultPageHeader.classList.add('menuOpacity');
        overlayMenu.classList.add('overlayMenuOpen');
        htMl.style.overflow = 'hidden';
        if (headerImageOverlay) {
          headerImageOverlay.classList.remove('bg-black');
          headerImageOverlay.classList.remove('opacity-50');
        }
      } else {
        headerLogo.style.visibility = 'visible';
        defaultPageHeader.classList.remove('menuOpacity');
        if (headerImageOverlay) {
          headerImageOverlay.classList.add('bg-black');
          headerImageOverlay.classList.add('opacity-50');
        }
        defaultPageHeader.classList.remove('headerScrolled');
        overlayMenu.classList.remove('overlayMenuOpen');
        htMl.style.overflow = 'auto';
      }
    });
}

if (getCookie('lang') === null) {
  const browserLanguage = navigator.language;
  createCookie('lang', browserLanguage.slice(0, 2));
}
if (langBtn) {
  switch (getCookie('lang')) {
    case 'tr':
      langBtn.querySelector('.dropdownMenuCont > #tr').classList.add('currentLang');
      langBtn.querySelector('#showLang').innerHTML = 'TR';
      break;
    case 'en':
      langBtn.querySelector('.dropdownMenuCont > #en').classList.add('currentLang');
      langBtn.querySelector('#showLang').innerHTML = 'EN';
      break;

    default:
      break;
  }
}
