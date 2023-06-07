const createCookie = (name, value) => {
  document.cookie = name + '=' + value + '; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
};
export default createCookie;
