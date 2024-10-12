<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        margin: 0;
        padding: 50px 20px;
    }

    .container {
        text-align: center;
        margin-top: 100px;
        position: relative; /* Enable positioning for child elements */
    }

    .header {
        position: absolute;
        top: 20px; /* Adjust as needed */
        right: 20px; /* Adjust as needed */
    }

    .email-logo {
        height: 40px; /* Set a height for the logo */
        width: 40px; /* Set a width for the logo */
        border-radius: 50%; /* Makes the image rounded */
        overflow: hidden; /* Ensures no overflow */
        vertical-align: middle; /* Aligns the image with the text */
        margin-right: 16px; /* Space between image and text */
        margin-left: 10px; /* Space between image and text */
    }

    .email-link {
        font-size: 14px;
        padding: 0px 4px;
        color: #6e6e6e; /* Adjust color as needed */
    }

    .search-container {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        position: relative;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    input[type="text"] {
        width: 100%;
        padding: 15px 60px;
        font-size: 18px;
        border: 1px solid #dcdcdc;
        border-radius: 24px;
        outline: none;
        transition: border 0.3s;
    }

    input[type="text"]:focus {
        border: 1px solid #4285f4;
    }

    #icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        height: 24px;
        width: 24px;
        background-color: #5f6368;
        -webkit-mask-image: url({{ asset('/images/search_cr23.svg') }});
        -webkit-mask-size: contain;
        -webkit-mask-repeat: no-repeat;
    }

    .mic-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 1.5em;
        color: #4285f4;
    }

    #suggestions {
        margin-top: 10px;
        text-align: left;
        width: 100%;
        max-width: 800px;
        margin: 10px auto;
        display: none;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .suggestion-item {
        padding: 10px;
        cursor: pointer;
    }

    .suggestion-item:hover {
        background-color: #e0e0e0;
    }

    #results {
        margin-top: 40px;
        text-align: left;
        max-width: 600px;
        margin: 10px auto;
    }

    .result-item {
        margin-bottom: 20px;
        padding: 10px;
        border-bottom: 1px solid #f1f1f1;
    }

    .result-item a {
        text-decoration: none;
        color: #1a0dab;
        font-size: 1.1em;
    }

    .result-item p {
        margin: 5px 0;
        color: #545454;
    }

    .alert {
        display: none;
        background-color: #f44336;
        color: white;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    input::placeholder {
        font-size: 18px;
    }
</style>

<div class="header">
    <a href="mailto:your-email@example.com" class="email-link">Gmail</a>
    <a href="mailto:your-email@example.com" class="email-link">Image</a>
    <img src={{ asset('/images/download.png') }} alt="Email Logo" class="email-logo">
</div>
<div class="container">

    <img src="{{ asset('images/google_logo.svg') }}" alt=""
        style="display: block; margin: 0 auto; margin-bottom: 20px;">
    
    <div class="search-container">
        <div id="icon"></div>
        <input type="text" id="search-query" placeholder="Search Google or type a URL here"
            oninput="showSuggestions(this.value)">
        <span class="mic-icon" id="mic-btn" onclick="startRecording()">
            <img src="{{ asset('images/mic.svg') }}" alt="Microphone">
        </span>
    </div>

    <div id="suggestions"></div>
    <div class="alert" id="no-results-alert">No results found.</div>
    <div id="results"></div>
</div>


<script>
    const keywords = [
        'weather',
        'news',
        'sports',
        'technology',
        'food recipes',
        'travel tips',
        'shopping deals'
    ];

    const searchInput = document.getElementById('search-query');
    const suggestionsDiv = document.getElementById('suggestions');
    const micBtn = document.getElementById('mic-btn');
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();

    recognition.onstart = () => {
        micBtn.style.color = "#34a853"; // Change mic icon color on start
    };

    recognition.onend = () => {
        micBtn.style.color = "#4285f4"; // Change back on end
    };

    recognition.onresult = (event) => {
        const transcript = event.results[0][0].transcript;
        searchInput.value = transcript;
        performSearch(transcript);
    };

    function startRecording() {
        recognition.start();
    }

    function showSuggestions(query) {
        suggestionsDiv.innerHTML = '';

        if (query.length === 0) {
            suggestionsDiv.style.display = 'none';
            return;
        }

        const filteredKeywords = keywords.filter(keyword =>
            keyword.toLowerCase().includes(query.toLowerCase())
        );

        if (filteredKeywords.length > 0) {
            filteredKeywords.forEach(keyword => {
                const suggestionItem = document.createElement('div');
                suggestionItem.className = 'suggestion-item';
                suggestionItem.innerText = keyword;
                suggestionItem.onclick = () => {
                    searchInput.value = keyword;
                    performSearch(keyword);
                    suggestionsDiv.style.display = 'none';
                };
                suggestionsDiv.appendChild(suggestionItem);
            });
            suggestionsDiv.style.display = 'block';
        } else {
            suggestionsDiv.style.display = 'none';
        }
    }

    async function performSearch(query) {
        const apiKey = 'AIzaSyCfxkyY_XiX5uVWi8GOdF4ulfYWN0XATNk';
        const searchEngineId = '77401807e11064cae';
        const url = `https://www.googleapis.com/customsearch/v1?q=${query}&key=${apiKey}&cx=${searchEngineId}`;

        const response = await fetch(url);
        const data = await response.json();
        displayResults(data.items);
    }

    function displayResults(items) {
        const resultsDiv = document.getElementById('results');
        resultsDiv.innerHTML = '';
        const noResultsAlert = document.getElementById('no-results-alert');
        noResultsAlert.style.display = 'none'; // Hide alert by default

        if (items && items.length > 0) {
            items.forEach(item => {
                const resultItem = document.createElement('div');
                resultItem.className = 'result-item';
                resultItem.innerHTML =
                    `<a href="${item.link}" target="_blank">${item.title}</a><p>${item.snippet}</p>`;
                resultsDiv.appendChild(resultItem);
            });
        } else {
            showNoResultsAlert();
        }
    }

    function showNoResultsAlert() {
        const noResultsAlert = document.getElementById('no-results-alert');
        noResultsAlert.style.display = 'block'; // Show alert
        setTimeout(() => {
            noResultsAlert.style.display = 'none'; // Hide alert after 3 seconds
        }, 3000);
    }

    searchInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault(); // Prevent default form submission
            performSearch(searchInput.value); // Call performSearch with current input value
        }
    });
</script>
