@extends('layout.main')
@section('page-container')
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
        }

        h1 {
            font-size: 3em;
            color: #4285f4;
            margin-bottom: 20px;
        }

        .highlight {
            color: #fbbc05;
        }

        .search-container {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 100%;
            max-width: 800px; /* Increased max width */
            margin: 0 auto;
        }

        input[type="text"] {
            width: 100%;
            padding: 15px 60px;
            font-size: 1.5em;
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
            height: 24px; /* Set height as per your image */
            width: 24px; /* Maintain aspect ratio */
            background-color: #5f6368; /* Desired color */
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
            max-width: 500px;
            margin: 10px auto;
            background-color: #f9f9f9;
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

        input::placeholder {
            font-size: 18px;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 1.1em;
            }
        }
    </style>

    <div class="container">
        <script async src="https://cse.google.com/cse.js?cx=77401807e11064cae"></script>
        <img src="{{ asset('images/google_logo.svg') }}" alt="" style="display: block; margin: 0 auto; margin-bottom: 20px;">
        <div class="search-container">
            <div id="icon"></div>
            <input type="text" id="search-query" placeholder="Search Google or type a URL here" 
                   oninput="showSuggestions(this.value)" onclick="showSuggestions(this.value)">
            <span class="mic-icon" id="mic-btn" onclick="startRecording()">
                <img src="{{ asset('images/mic.svg') }}" alt="Microphone">
            </span>
        </div>
        <div id="suggestions"></div>
        <div id="results"></div>
    </div>

    <script>
        let previousSearches = [];
        let recognizing = false;
        const micBtn = document.getElementById('mic-btn');
        const searchInput = document.getElementById('search-query');

        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const recognition = new SpeechRecognition();

        recognition.onstart = () => {
            recognizing = true;
            micBtn.style.color = "#34a853"; 
        };

        recognition.onend = () => {
            recognizing = false;
            micBtn.style.color = "#4285f4"; 
        };

        recognition.onresult = (event) => {
            const transcript = event.results[0][0].transcript;
            searchInput.value = transcript; 
            performSearch(transcript); 
        };

        micBtn.onclick = () => {
            if (recognizing) {
                recognition.stop();
            } else {
                recognition.start();
            }
        };

        searchInput.addEventListener('focus', () => {
            searchInput.placeholder = ''; 
            showSuggestions(searchInput.value); // Show suggestions when focused
        });

        searchInput.addEventListener('blur', () => {
            if (searchInput.value === '') {
                searchInput.placeholder = 'Search Google or type a URL here'; 
            }
        });

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

            if (items) {
                items.forEach(item => {
                    const resultItem = document.createElement('div');
                    resultItem.className = 'result-item';
                    resultItem.innerHTML =
                        `<a href="${item.link}" target="_blank">${item.title}</a><p>${item.snippet}</p>`;
                    resultsDiv.appendChild(resultItem);
                });
            } else {
                resultsDiv.innerHTML = 'No results found.';
            }
        }

        function showSuggestions(query) {
            const suggestionsDiv = document.getElementById('suggestions');
            suggestionsDiv.innerHTML = '';

            if (query.length === 0) {
                suggestionsDiv.style.display = 'none';
                return;
            }

            if (!previousSearches.includes(query)) {
                previousSearches.push(query);
            }

            previousSearches.forEach(search => {
                if (search.toLowerCase().includes(query.toLowerCase())) {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.innerText = search;
                    suggestionItem.onclick = () => {
                        searchInput.value = search;
                        performSearch(search);
                        suggestionsDiv.style.display = 'none';
                    };
                    suggestionsDiv.appendChild(suggestionItem);
                }
            });

            suggestionsDiv.style.display = previousSearches.length > 0 ? 'block' : 'none';
        }
    </script>
@endsection
