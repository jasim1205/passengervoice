document.addEventListener('DOMContentLoaded', function () {
    const prevMonthBtn = document.getElementById('prevMonthBtn');
    const nextMonthBtn = document.getElementById('nextMonthBtn');
    const currentMonthYear = document.getElementById('currentMonthYear');
    const calendar = document.getElementById('calendar');
    const content = document.getElementById('content');
  
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();
  
    function generateCalendar() {
      calendar.innerHTML = '';
  
      // Get the first day of the month
      let firstDay = new Date(currentYear, currentMonth, 1).getDay();
  
      // Get the last day of the month
      let lastDay = new Date(currentYear, currentMonth + 1, 0).getDate();
  
      currentMonthYear.textContent = `${getMonthName(currentMonth)} ${currentYear}`;
  
      // Generate calendar days
      for (let i = 0; i < firstDay; i++) {
        calendar.innerHTML += '<div></div>';
      }
  
      for (let i = 1; i <= lastDay; i++) {
        let dayDiv = document.createElement('div');
        dayDiv.textContent = i;
        dayDiv.dataset.date = i;
        if (currentDate.getDate() === i && currentDate.getMonth() === currentMonth && currentDate.getFullYear() === currentYear) {
          dayDiv.classList.add('current-day');
        }
        calendar.appendChild(dayDiv);
      }
    }
  
    function getMonthName(monthIndex) {
      const months = [
        'January', 'February', 'March', 'April',
        'May', 'June', 'July', 'August',
        'September', 'October', 'November', 'December'
      ];
      return months[monthIndex];
    }
  
    function displayContent(date) {
      // Sample content - Replace with actual content retrieval logic
      content.innerHTML = `<p>Content for ${getMonthName(currentMonth)} ${date}, ${currentYear}</p>`;
    }
  
    // Initial generation
    generateCalendar();
    
    // Event listeners for navigation buttons
    prevMonthBtn.addEventListener('click', function () {
      currentMonth--;
      if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
      }
      generateCalendar();
    });
  
    nextMonthBtn.addEventListener('click', function () {
      currentMonth++;
      if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
      }
      generateCalendar();
    });
  
    // Event listener for clicking on a date
    calendar.addEventListener('click', function (event) {
      if (event.target.dataset.date) {
        let burl=document.querySelector('#burl').value;
        window.location=burl+'archive/'+currentYear+'-'+minTwoDigits(currentMonth + 1) +'-'+minTwoDigits(event.target.dataset.date)
        
      }
    });
  });

  function minTwoDigits(n) {
    return (n < 10 ? '0' : '') + n;
  }