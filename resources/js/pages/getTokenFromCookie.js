export function getTokenFromCookie(cookieName = 'token') {
  const cookies = document.cookie.split(';');
  console.log(cookies);
  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i].trim();

    if (cookie.startsWith(cookieName + '=')) {
      token = cookie.substring(cookieName.length + 1);
      return token;
    }
  }
  return null;
}
