document.addEventListener('DOMContentLoaded', function() {
    // Функция открытия модального окна
    function openModal(modalId) {
      document.getElementById(modalId).style.display = 'flex';
    }
    // Функция закрытия модального окна
    function closeModal(modalId) {
      document.getElementById(modalId).style.display = 'none';
    }
  
    // Проверяем, есть ли на странице кнопки входа и регистрации
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
  
    if (loginBtn) {
      loginBtn.addEventListener('click', function(e) {
        e.preventDefault();
        openModal('loginModal');
      });
    }
    if (registerBtn) {
      registerBtn.addEventListener('click', function(e) {
        e.preventDefault();
        openModal('registerModal');
      });
    }
  
    // Закрытие модального окна при клике на крестик
    const modalCloseButtons = document.querySelectorAll('.modal-close');
    modalCloseButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        closeModal(this.getAttribute('data-modal'));
      });
    });
  
    // Закрытие модального окна при клике вне содержимого
    window.addEventListener('click', function(e) {
      const modals = document.querySelectorAll('.modal');
      modals.forEach(function(modal) {
        if (e.target === modal) {
          modal.style.display = 'none';
        }
      });
    });
  });