async function getHijriYear() {
    const today = new Date();
    const dateStr = `${today.getDate()}-${today.getMonth()+1}-${today.getFullYear()}`;
    const res = await fetch(`https://api.aladhan.com/v1/gToH?date=${dateStr}`);
    const json = await res.json();
    return json.data.hijri.year;
  }
  
  async function fetchHijriMonth(month, year) {
    const res = await fetch(`https://api.aladhan.com/v1/hToGCalendar/${month}/${year}`);
    const json = await res.json();
    return json.data;
  }
  
  const monthNames = [
    { arabic: "مُحَرَّم",      english: "Muharram"      },
    { arabic: "صَفَر",            english: "Safar"         },
    { arabic: "رَبِيع ٱلْأَوَّل", english: "Rabiʿ al‑Awwal" },
    { arabic: "رَبِيع ٱلثَّانِي", english: "Rabiʿ al‑Thani" },
    { arabic: "جُمَادَىٰ ٱلْأُولَىٰ",english: "Jumada al‑Ula"  },
    { arabic: "جُمَادَىٰ ٱلْثَّانِيَة",english:"Jumada al‑Thania"},
    { arabic: "رَجَب",            english: "Rajab"         },
    { arabic: "شَعْبَان",         english: "Shaʿban"       },
    { arabic: "رَمَضَان",         english: "Ramadan"       },
    { arabic: "شَوَّال",         english: "Shawwal"       },
    { arabic: "ذُو ٱلْقَعْدَة",    english: "Dhu al‑Qadah"   },
    { arabic: "ذُو ٱلْحِجَّة",    english: "Dhu al‑Hijjah"  }
  ];
  
  const events = [
    { month:1, day:10, arabic:"عاشوراء",             english:"Ashura"           },
    { month:3, day:12, arabic:"المولد النبويّ",       english:"Mawlid an‑Nabī"   },
    { month:9, day:1,  arabic:"بداية رمضان",         english:"Start of Ramadan" },
    { month:9, day:27, arabic:"ليلة القدر",          english:"Laylat al‑Qadr"    },
    { month:10,day:1,  arabic:"عيد الفطر",           english:"Eid al‑Fitr"      },
    { month:12,day:9,  arabic:"يوم عرفة",           english:"Day of Arafah"    },
    { month:12,day:10, arabic:"عيد الأضحى",         english:"Eid al‑Adha"      }
  ];
  
  async function renderCalendar() {
    const hijriYear = await getHijriYear();
    const gregYear  = new Date().getFullYear();
    const container = document.getElementById('calendar');
    container.innerHTML = '';
  
    for (let m = 1; m <= 12; m++) {
      const monthData = await fetchHijriMonth(m, hijriYear);
      const monthDiv  = document.createElement('div');
      monthDiv.className = 'month';
  
      const title = document.createElement('div');
      title.className = 'month-name';
      title.textContent = `${monthNames[m-1].arabic} (${monthNames[m-1].english}) – ${gregYear}`;
      monthDiv.appendChild(title);
  
      const daysRow = document.createElement('div');
      daysRow.className = 'day-names';
      ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'].forEach(d => {
        const cell = document.createElement('div');
        cell.textContent = d;
        daysRow.appendChild(cell);
      });
      monthDiv.appendChild(daysRow);
  
      const datesGrid    = document.createElement('div');
      datesGrid.className = 'dates';
      const firstWeekday = new Date(monthData[0].gregorian.date).getDay();
      for (let i = 0; i < firstWeekday; i++) {
        datesGrid.appendChild(document.createElement('div'));
      }
      monthData.forEach(day => {
        const item = document.createElement('div');
        item.className = 'date-item';
        item.textContent = Number(day.hijri.day);
        datesGrid.appendChild(item);
      });
      monthDiv.appendChild(datesGrid);
  
      const evtList = document.createElement('ul');
      evtList.className = 'event-list';
      events
        .filter(e => e.month === m)
        .forEach(e => {
          const entry = monthData.find(d => Number(d.hijri.day) === e.day);
          const date  = entry ? entry.gregorian.date : '–';
          const li    = document.createElement('li');
          li.innerHTML = `<strong>${e.arabic} (${e.english})</strong>: ${date}`;
          evtList.appendChild(li);
        });
      monthDiv.appendChild(evtList);
  
      container.appendChild(monthDiv);
    }
  }
  
  renderCalendar();
  