document.addEventListener('DOMContentLoaded', function() {
    // Пример массива книг (добавляем жанр, рейтинг, отзывы)
    const books = [
      { 
        id: 1, 
        title: "Тайна древнего замка", 
        author: "Алексей Петров", 
        genre: "Приключения", 
        image: "book1.jpg",
        rating: 4.2,
        reviews: ["Захватывающе!", "Отличная книга, понравилась атмосфера."]
      },
      { 
        id: 2, 
        title: "Путешествие во времени", 
        author: "Мария Иванова", 
        genre: "Фантастика", 
        image: "book2.jpg",
        rating: 3.8,
        reviews: ["Хорошая книга, но местами затянута."]
      },
      { 
        id: 3, 
        title: "Загадка Сфинкса", 
        author: "Игорь Смирнов", 
        genre: "Детектив", 
        image: "book3.jpg",
        rating: 4.5,
        reviews: []
      },
      { 
        id: 4, 
        title: "Мир без границ", 
        author: "Елена Козлова", 
        genre: "Научпоп", 
        image: "book4.jpg",
        rating: 4.0,
        reviews: []
      },
      { 
        id: 5, 
        title: "Лабиринты разума", 
        author: "Сергей Волков", 
        genre: "Психология", 
        image: "book5.jpg",
        rating: 4.9,
        reviews: []
      },
      { 
        id: 6, 
        title: "Сияние звезд", 
        author: "Ольга Соколова", 
        genre: "Фантастика", 
        image: "book6.jpg",
        rating: 3.5,
        reviews: []
      },
      { 
        id: 7, 
        title: "Огонь и лед", 
        author: "Владимир Николаев", 
        genre: "Фэнтези", 
        image: "book7.jpg",
        rating: 4.1,
        reviews: []
      },
      { 
        id: 8, 
        title: "Мелодии души", 
        author: "Анна Лебедева", 
        genre: "Роман", 
        image: "book8.jpg",
        rating: 4.7,
        reviews: []
      },
      { 
        id: 9, 
        title: "На краю вселенной", 
        author: "Дмитрий Михайлов", 
        genre: "Фантастика", 
        image: "book9.jpg",
        rating: 4.3,
        reviews: []
      },
      { 
        id: 10, 
        title: "Потерянный рай", 
        author: "Наталья Федорова", 
        genre: "Драма", 
        image: "book10.jpg",
        rating: 4.1,
        reviews: []
      },
      { 
        id: 11, 
        title: "В погоне за мечтой", 
        author: "Константин Орлов", 
        genre: "Приключения", 
        image: "book11.jpg",
        rating: 4.0,
        reviews: []
      },
      { 
        id: 12, 
        title: "Тени прошлого", 
        author: "Светлана Васильева", 
        genre: "Детектив", 
        image: "book12.jpg",
        rating: 3.8,
        reviews: []
      },
      { 
        id: 13, 
        title: "Грани реальности", 
        author: "Михаил Зайцев", 
        genre: "Фантастика", 
        image: "book13.jpg",
        rating: 4.2,
        reviews: []
      },
      { 
        id: 14, 
        title: "Зов сердца", 
        author: "Людмила Егорова", 
        genre: "Роман", 
        image: "book14.jpg",
        rating: 4.5,
        reviews: []
      },
      { 
        id: 15, 
        title: "Перо судьбы", 
        author: "Андрей Романов", 
        genre: "Фэнтези", 
        image: "book15.jpg",
        rating: 4.9,
        reviews: []
      },
      { 
        id: 16, 
        title: "Эхо воспоминаний", 
        author: "Ирина Григорьева", 
        genre: "Драма", 
        image: "book16.jpg",
        rating: 4.1,
        reviews: []
      },
      { 
        id: 17, 
        title: "Пыль времен", 
        author: "Василий Семёнов", 
        genre: "История", 
        image: "book17.jpg",
        rating: 4.3,
        reviews: []
      },
      { 
        id: 18, 
        title: "Полет фантазии", 
        author: "Юлия Крылова", 
        genre: "Фантастика", 
        image: "book18.jpg",
        rating: 3.7,
        reviews: []
      },
      { 
        id: 19, 
        title: "В лабиринте мыслей", 
        author: "Роман Корнеев", 
        genre: "Психология", 
        image: "book19.jpg",
        rating: 4.2,
        reviews: []
      },
      { 
        id: 20, 
        title: "Звёздная одиссея", 
        author: "Екатерина Богданова", 
        genre: "Фантастика", 
        image: "book20.jpg",
        rating: 4.6,
        reviews: []
      },
      { 
        id: 21, 
        title: "Послдений Путь", 
        author: "Виктор Мелявский", 
        genre: "Романтика", 
        image: "book21.jpg",
        rating: 4.9,
        reviews: []
      },
    ];const bookGrid = document.getElementById('bookGrid');
    const searchInput = document.getElementById('searchInput');
    
    // Сохраняем заказы/брони в localStorage (или массив)
    // Пример структуры: [{ title: "Название книги", type: "заказ" | "бронирование", date: "..." }]
    let orders = JSON.parse(localStorage.getItem('orders')) || [];
  
    // Функция для отображения книг
    function renderBooks(bookArray) {
      bookGrid.innerHTML = '';
      bookArray.forEach(book => {
        const bookItem = document.createElement('div');
        bookItem.classList.add('book-item');
        bookItem.innerHTML = `
          <img src="${book.image}" alt="${book.title}">
          <h3>${book.title}</h3>
          <p>${book.author} | ${book.genre}</p>
          <p>Рейтинг: ${book.rating.toFixed(1)}</p>
          <div class="btn-group">
            <button class="order-btn" data-title="${book.title}">Заказ</button>
            <button class="booking-btn" data-title="${book.title}">Бронь</button>
          </div>
        `;
        bookGrid.appendChild(bookItem);
      });
  
      // Обработчики для кнопок "Заказ"
      document.querySelectorAll('.order-btn').forEach(button => {
        button.addEventListener('click', function() {
          const title = this.getAttribute('data-title');
          document.querySelector('#orderModal p strong').textContent = title;
          openModal('orderModal');
          
          // При подтверждении заказа сохраняем в историю
          document.getElementById('confirmOrderBtn').onclick = function() {
            saveOrderHistory(title, 'Заказ');
            closeModal('orderModal');
          };
        });
      });
  
      // Обработчики для кнопок "Бронь"
      document.querySelectorAll('.booking-btn').forEach(button => {
        button.addEventListener('click', function() {
          const title = this.getAttribute('data-title');
          document.querySelector('#bookingModal p strong').textContent = title;
          openModal('bookingModal');
          
          // При подтверждении брони сохраняем в историю
          document.getElementById('confirmBookingBtn').onclick = function() {
            saveOrderHistory(title, 'Бронь');
            closeModal('bookingModal');
          };
        });
      });
  

    }
    
    // Функция сохранения заказа/брони в localStorage
    function saveOrderHistory(bookTitle, operationType) {
      const orderData = {
        title: bookTitle,
        type: operationType,
        date: new Date().toLocaleString()
      };
      orders.push(orderData);
      localStorage.setItem('orders', JSON.stringify(orders));
    }
  
    // Функция поиска
    searchInput.addEventListener('keyup', function() {
      const query = this.value.toLowerCase();
      const filtered = books.filter(book => {
        return (
          book.title.toLowerCase().includes(query) ||
          book.author.toLowerCase().includes(query) ||
          book.genre.toLowerCase().includes(query)
        );
      });
      renderBooks(filtered);
    });
  
    // === Модалки (заказ, бронь, рейтинг) ===
    function openModal(modalId) {
      document.getElementById(modalId).style.display = 'flex';
    }
    function closeModal(modalId) {
      document.getElementById(modalId).style.display = 'none';
    }
    // Закрытие при клике на крестик
    const modalCloseButtons = document.querySelectorAll('.modal-close');
    modalCloseButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        closeModal(this.getAttribute('data-modal'));
      });
    });
    // Закрытие при клике вне окна
    window.addEventListener('click', function(e) {
      const modals = document.querySelectorAll('.modal');
      modals.forEach(function(modal) {
        if (e.target === modal) {
          modal.style.display = 'none';
        }
      });
    });
  
    // Звёздный рейтинг
    const stars = document.querySelectorAll('#starRating .star');
    stars.forEach(star => {
      star.addEventListener('mouseover', function() {
        const val = parseInt(this.getAttribute('data-value'), 10);
        highlightStars(val);
      });
      star.addEventListener('mouseout', function() {
        highlightStars(0);
      });
      star.addEventListener('click', function() {
        const val = parseInt(this.getAttribute('data-value'), 10);
        setActiveStars(val);
      });
    });
    function highlightStars(value) {
      stars.forEach(star => {
        const starVal = parseInt(star.getAttribute('data-value'), 10);
        star.style.color = (starVal <= value) ? 'gold' : '#ccc';
      });
    }
    function setActiveStars(value) {
      stars.forEach(star => {
        const starVal = parseInt(star.getAttribute('data-value'), 10);
        if (starVal <= value) {
          star.classList.add('active');
          star.style.color = 'gold';
        } else {
          star.classList.remove('active');
          star.style.color = '#ccc';
        }
      });
    }
    function resetStars() {
      stars.forEach(star => {
        star.classList.remove('active');
        star.style.color = '#ccc';
      });
    }
  
    // Отрисовываем все книги при загрузке
    renderBooks(books);
  });