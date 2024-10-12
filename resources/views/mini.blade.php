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
        position: relative;
        /* Enable positioning for child elements */
    }

    .header {
        display: flex;
        justify-content: space-between;
        /* Distributes space between items */
        align-items: center;
        /* Center vertically */
        position: absolute;
        top: 20px;
        left: 0;
        /* Aligns to the left */
        right: 0;
        /* Aligns to the right */
        padding: 0 20px;
        /* Adds padding to the sides */
    }

    .email-logo {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        overflow: hidden;
        vertical-align: middle;
        margin-left: 10px;
        /* Space between image and text */
    }

    .email-link {
        font-size: 14px;
        padding: 0 4px;
        /* Adjust padding for space */
        color: #6e6e6e;
        /* Adjust color as needed */
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

    .button-container {
        margin-top: 25px;
        /* Space above buttons */
        display: flex;
        /* Use flexbox for alignment */
        justify-content: center;
        /* Center items horizontally */
        gap: 10px;
        /* Space between buttons */
    }

    .gNO89b,
    .RNmpXc {
        padding: 10px 20px;
        /* Add padding to buttons */
        border: none;
        /* Remove default border */
        border-radius: 5px;
        /* Rounded corners */
        background-color: #4285f4;
        /* Button background color */
        color: white;
        /* Text color */
        font-size: 16px;
        /* Font size */
        cursor: pointer;
        /* Pointer on hover */
        transition: background-color 0.3s;
        /* Transition for hover effect */
    }

    .gNO89b:hover,
    .RNmpXc:hover {
        background-color: #357ae8;
        /* Darker shade on hover */
    }

    .RNmpXc {
        background-color: #fbbc05;
        /* Different background for the second button */
    }

    .RNmpXc:hover {
        background-color: #f9c846;
        /* Darker shade on hover */
    }

    /* Add this to your existing styles */
    #SIvCob {
        text-align: center;
        /* Center the text */
        margin-top: 20px;
        /* Space above */
        font-size: 15px;
        /* Set font size */
    }

    #SIvCob a {
        margin: 0 10px;
        /* Space between links */
        color: #1a0dab;
        /* Link color */
        text-decoration: none;
        /* Remove underline */
        transition: color 0.3s;
        /* Transition for hover effect */
    }

    #SIvCob a:hover {
        color: #4285f4;
        /* Change color on hover */
    }
</style>

<div class="header">
    <div class="left-links">
        <a href="mailto:your-email@example.com" class="email-link" style=" text-decoration: none;">About</a>
        <a href="mailto:your-email@example.com" class="email-link" style=" text-decoration: none;">Store</a>
    </div>
    <div class="right-links">
        <a href="mailto:your-email@example.com" class="email-link">Gmail</a>
        <a href="mailto:your-email@example.com" class="email-link">Image</a>
        <img src="{{ asset('/images/download.png') }}" alt="Email Logo" class="email-logo">
    </div>
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
<div class="google-social">

    <center class="social-link-icon" style="margin-top:27px;">
        <input class="gNO89b" value="Google Search" aria-label="Google Search" name="btnK" role="button"
            tabindex="0" type="submit" data-ved="0ahUKEwjyl6Cc-4iJAxXYnK8BHdMgDzAQ4dUDCB8">
        <input class="RNmpXc" id="luckyButton" value="I'm Feeling Lucky" aria-label="I'm Feeling Lucky" name="btnI"
            type="submit" jsaction="trigger.kWlxhc">
    </center>

    <div id="SIvCob">
        Google offered in:
        <a href="javascript:void(0);" onclick="setLanguage('hi')">हिन्दी</a>
        <a href="javascript:void(0);" onclick="setLanguage('pa')">पहाड़ी</a>
        <a href="javascript:void(0);" onclick="setLanguage('sa')">संस्कृत</a>
        <a href="javascript:void(0);" onclick="setLanguage('bn')">বাংলা</a>
        <a href="javascript:void(0);" onclick="setLanguage('te')">తెలుగు</a>
        <a href="javascript:void(0);" onclick="setLanguage('mr')">मराठी</a>
        <a href="javascript:void(0);" onclick="setLanguage('ta')">தமிழ்</a>
        <a href="javascript:void(0);" onclick="setLanguage('gu')">ગુજરાતી</a>
        <a href="javascript:void(0);" onclick="setLanguage('kn')">ಕನ್ನಡ</a>
        <a href="javascript:void(0);" onclick="setLanguage('ml')">മലയാളം</a>
        <a href="javascript:void(0);" onclick="setLanguage('pa')">ਪੰਜਾਬੀ</a>
    </div>



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


    function setLanguage(langCode) {
        const luckyButton = document.getElementById('luckyButton');

        // Set the new button value based on the selected language
        switch (langCode) {
            case 'hi':
                luckyButton.value = "मैं भाग्यशाली हूँ"; // Hindi
                break;
            case 'pa':
                luckyButton.value = "आऊ भागा बला है"; // Pahari
                break;
            case 'sa':
                luckyButton.value = "अहं भाग्यशाली अस्मि"; // Pahari
                break;
            case 'bn':
                luckyButton.value = "আমি সৌভাগ্যবান"; // Bengali
                break;
            case 'te':
                luckyButton.value = "నేను అదృష్టవంతుడిని"; // Telugu
                break;
            case 'mr':
                luckyButton.value = "मी भाग्यवान आहे"; // Marathi
                break;
            case 'ta':
                luckyButton.value = "நான் அதிர்ஷ்டம்"; // Tamil
                break;
            case 'gu':
                luckyButton.value = "હું નસીબદાર છું"; // Gujarati
                break;
            case 'kn':
                luckyButton.value = "ನಾನು ಅದೃಷ್ಟಶಾಲಿ"; // Kannada
                break;
            case 'ml':
                luckyButton.value = "ഞാൻ ഭാഗ്യശാലി"; // Malayalam
                break;
            case 'pa':
                luckyButton.value = "ਮੈਂ ਕਿਸਮਤ ਵਾਲਾ ਹਾਂ"; // Punjabi
                break;
            default:
                luckyButton.value = "I'm Feeling Lucky"; // Default case
        }
    }
</script>
