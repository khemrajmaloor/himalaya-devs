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
            position: relative;
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
            display: inline-grid;
            justify-content: center;
            top: 0p;
        }

        input[type="text"] {
            width: 500px;
            padding: 15px 60px 15px 15px;
            /* Add padding to accommodate the mic icon */
            font-size: 1.5em;
            border: 1px solid #dcdcdc;
            border-radius: 24px;
            outline: none;
            transition: border 0.3s;
        }

        input[type="text"]:focus {
            border: 1px solid #4285f4;
        }

        .mic-icon {
            position: absolute;
            right: 420px;
            cursor: pointer;
            /* right: 0; */
            font-size: 1.5em;
            bottom: 22px;
            color: #4285f4;
            /* display: flex; */
        }

        #suggestions {
            margin-top: 10px;
            text-align: left;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            background-color: #f9f9f9;
            display: none;
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
            margin-left: auto;
            margin-right: auto;
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

        /* Responsive design */
        @media (max-width: 600px) {
            input[type="text"] {
                width: 100%;
            }

            h1 {
                font-size: 1.1em;
            }
        }
    </style>

    <div class="container">
        <h1>Mini <span class="highlight">Google</span></h1>
        <div class="search-container">
            <input type="text" id="search-query" placeholder="Search..." oninput="showSuggestions(this.value)">
            <span class="mic-icon" id="mic-btn" onclick="startRecording()">
                <img src="{{ asset('images/mic.svg') }}" alt="Microphone">
            </span> <!-- Microphone icon inside input -->
        </div>
        <div id="suggestions"></div>
        <div id="results"></div>
    </div>

    <script>
        let previousSearches = [];
        let recognizing = false;
        const micBtn = document.getElementById('mic-btn');

        // Speech recognition setup
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const recognition = new SpeechRecognition();

        recognition.onstart = () => {
            recognizing = true;
            micBtn.style.color = "#34a853"; // Change color when active
        };

        recognition.onend = () => {
            recognizing = false;
            micBtn.style.color = "#4285f4"; // Reset color
        };

        recognition.onresult = (event) => {
            const transcript = event.results[0][0].transcript;
            document.getElementById('search-query').value = transcript; // Set the input to the recognized speech
            performSearch(transcript); // Perform search
        };

        micBtn.onclick = () => {
            if (recognizing) {
                recognition.stop(); // Stop recognition if it's active
            } else {
                recognition.start(); // Start recognition
            }
        };

        async function performSearch(query) {
            const apiKey = 'YOUR_API_KEY'; // Replace with your API key
            const searchEngineId = 'YOUR_SEARCH_ENGINE_ID'; // Replace with your CSE ID
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

            // Add query to previous searches if not already included
            if (!previousSearches.includes(query)) {
                previousSearches.push(query);
            }

            // Show previous searches
            previousSearches.forEach(search => {
                if (search.toLowerCase().includes(query.toLowerCase())) {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.innerText = search;
                    suggestionItem.onclick = () => {
                        document.getElementById('search-query').value = search;
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
