document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search__input');
    const searchResults = document.createElement('div');
    searchResults.className = 'search-results';
    searchInput.parentNode.appendChild(searchResults);

    let timeoutId;
    
    searchInput.addEventListener('input', function(e) {
        clearTimeout(timeoutId);
        const query = e.target.value.trim();
        
        if(query.length < 2) {
            searchResults.innerHTML = '';
            return;
        }

        timeoutId = setTimeout(() => {
            fetch(`/tektn/controller/search.php?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                    searchResults.innerHTML = '';
                    if(data.length > 0) {
                        data.forEach(item => {
                            const resultItem = document.createElement('a');
                            resultItem.href = item.url;
                            resultItem.className = 'search-result-item';
                            resultItem.textContent = item.name;
                            searchResults.appendChild(resultItem);
                        });
                    } else {
                        searchResults.innerHTML = '<div class="no-results">No results found</div>';
                    }
                })
                .catch(error => console.error('Error:', error));
        }, 300);
    });

    document.addEventListener('click', function(e) {
        if(!e.target.closest('.search')) {
            searchResults.innerHTML = '';
        }
    });
});