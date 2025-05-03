const statusEl = document.getElementById('status');
const listEl   = document.getElementById('prayer-times');
const searchBtn = document.getElementById('recherche-btn');
const inputEl   = document.getElementById('location-input');

function fetchPrayerTimes(lat, lon) {
  const method = 2;
  const url = `https://api.aladhan.com/v1/timings?latitude=${lat}&longitude=${lon}&method=${method}`;
  statusEl.textContent = 'Fetching prayer times…';
  
  fetch(url)
    .then(res => res.json())
    .then(data => {
      if (data && data.data && data.data.timings) {
        displayTimes(data.data.timings);
      } else {
        statusEl.textContent = 'No data found for this location.';
      }
    })
    .catch(err => {
      statusEl.textContent = 'Error fetching prayer times.';
      console.error(err);
    });
}

function displayTimes(times) {
  statusEl.textContent = '';
  listEl.innerHTML = '';
  const prayers = ['Fajr','Dhuhr','Asr','Maghrib','Isha'];
  prayers.forEach(prayer => {
    const li = document.createElement('li');
    li.innerHTML = `<strong>${prayer}</strong><span>${times[prayer]}</span>`;
    listEl.appendChild(li);
  });
}

function geocodeLocation(query) {
  const nominatimUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`;
  statusEl.textContent = 'Searching location…';
  fetch(nominatimUrl)
    .then(res => res.json())
    .then(data => {
      if (data && data.length > 0) {
        const location = data[0];
        const lat = location.lat;
        const lon = location.lon;
        statusEl.textContent = `Location found: ${location.display_name}`;
        fetchPrayerTimes(lat, lon);
      } else {
        statusEl.textContent = 'Location not found. Please try a different query.';
      }
    })
    .catch(err => {
      statusEl.textContent = 'Error fetching location data.';
      console.error(err);
    });
}

searchBtn.addEventListener('click', () => {
  const query = inputEl.value.trim();
  if (!query) {
    statusEl.textContent = 'Please enter a location.';
    return;
  }
  geocodeLocation(query);
});

inputEl.addEventListener('keypress', (event) => {
  if (event.key === 'Enter') {
    searchBtn.click();
  }
});
