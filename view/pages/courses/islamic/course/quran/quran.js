document.addEventListener("DOMContentLoaded", function() {
  const surahListUl = document.querySelector(".surah-list");
  const surahContentDiv = document.getElementById("surahContent");
  const searchInput = document.getElementById("surahSearch");
  let allSurahs = [];

  const listUrl = "https://quranapi.pages.dev/api/surah.json";

  fetch(listUrl)
    .then(response => {
      if (!response.ok) {
        throw new Error("Failed to fetch surah list.");
      }
      return response.json();
    })
    .then(data => {
      allSurahs = data;
      renderSurahList(allSurahs);

      if(allSurahs.length > 0) {
        const firstItem = document.querySelector(".surah-list li");
        if(firstItem) {
          firstItem.classList.add("active");
          loadSurah(1, allSurahs[0].surahNameArabic);
        }
      }
    })
    .catch(error => {
      surahListUl.innerHTML = `<li class="loading">Error loading surahs: ${error.message}</li>`;
    });

  searchInput.addEventListener("input", function() {
    const query = searchInput.value.trim().toLowerCase();
    const filtered = allSurahs.filter(surah => {
      return surah.surahNameTranslation.toLowerCase().includes(query) ||
             surah.surahNameArabic.includes(query);
    });
    renderSurahList(filtered);
  });
  
  function renderSurahList(surahs) {
    surahListUl.innerHTML = "";
    if(surahs.length === 0) {
      surahListUl.innerHTML = `<li class="loading">No surahs found.</li>`;
      return;
    }
    surahs.forEach((surah, index) => {
      const surahNumber = index + 1;
      const li = document.createElement("li");
      li.className = "surah-list-item";
      li.textContent = `${surahNumber}. ${surah.surahNameTranslation} - ${surah.surahNameArabic}`;
      li.addEventListener("click", function() {
        document.querySelectorAll(".surah-list li").forEach(item => item.classList.remove("active"));
        li.classList.add("active");
        loadSurah(surahNumber, surah.surahNameArabic);
      });
      surahListUl.appendChild(li);
    });
  }

  function loadSurah(surahNumber, surahArabicName) {
    surahContentDiv.innerHTML = `<p class="loading">Loading Surah ${surahNumber} - ${surahArabicName}...</p>`;
    const detailUrl = `http://api.alquran.cloud/v1/surah/${surahNumber}/quran-uthmani`;
    fetch(detailUrl)
      .then(response => {
        if (!response.ok) {
          throw new Error("Failed to load surah details.");
        }
        return response.json();
      })
      .then(data => {
        displaySurahContent(data.data);
      })
      .catch(error => {
        surahContentDiv.innerHTML = `<p class="loading">Error loading surah: ${error.message}</p>`;
      });
  }

  function displaySurahContent(surahData) {
    surahContentDiv.innerHTML = "";
    const heading = document.createElement("h3");
    heading.textContent = surahData.name;
    surahContentDiv.appendChild(heading);
    surahData.ayahs.forEach(ayah => {
      const p = document.createElement("p");
      p.className = "ayah";
      
      const spanNumber = document.createElement("span");
      spanNumber.className = "ayah-number";
      spanNumber.textContent = ayah.numberInSurah;
      
      const spanText = document.createElement("span");
      spanText.className = "ayah-text";
      spanText.textContent = ayah.text;
      
      p.appendChild(spanText);
      p.appendChild(spanNumber);
      surahContentDiv.appendChild(p);
    });
  }
});