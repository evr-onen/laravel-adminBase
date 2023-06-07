const getCookie = (name) => {
  const cookies = document.cookie.split(';'); // Tüm cookie'leri alır ve noktalı virgül ile ayırır
  for (let i = 0; i < cookies.length; i++) {
    const cookie = cookies[i].trim(); // Her bir cookie'yi boşluklardan temizler
    if (cookie.startsWith(name + '=')) {
      return cookie.substring(name.length + 1); // İstenen cookie'yi değerini döndürür
    }
  }
  return null; // İstenen cookie bulunamazsa null döndürür
};

export default getCookie;
// Örnek kullanım
// const myCookieValue = getCookie('myCookie');
// console.log(myCookieValue);
