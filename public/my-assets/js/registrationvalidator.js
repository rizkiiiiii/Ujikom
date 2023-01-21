const passwordInput = document.getElementById('password');
const pwInvalidMssgEl = document.getElementById('passwordInvalidMessage');
const confirmationPasswordInput = document.getElementById('password_confirmation');
const confirmPwInvalidMssgEl = document.getElementById('confirmPasswordInvalidMessage');
const usernameInput = document.getElementById('username');
const usernameInvalidMssgEl = document.getElementById('usernameInvalidMessage');

passwordInput.addEventListener('input', function() {
  if (this.value.length < 8) return pwInvalidMssgEl.getElementsByTagName('small')[0].innerText = 'Panjang minimal untuk password adalah 8!';
  return pwInvalidMssgEl.getElementsByTagName('small')[0].innerText = '';
});

confirmationPasswordInput.addEventListener('input', function() {
  if (!passwordInput.value.trim()) return;
  if (passwordInput.value !== this.value) return confirmPwInvalidMssgEl.getElementsByTagName('small')[0].innerText = 'Konfirmasi password harus sama dengan password!';
  return confirmPwInvalidMssgEl.getElementsByTagName('small')[0].innerText = '';
});

usernameInput.addEventListener('input', function() {
  if (this.value.length > 12) {
    return usernameInvalidMssgEl.getElementsByTagName('small')[0].innerText = 'Username memiliki panjang maksimal 12!';
  }

  return usernameInvalidMssgEl.getElementsByTagName('small')[0].innerText = '';
});