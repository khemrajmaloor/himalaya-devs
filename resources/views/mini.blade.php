@extends('layout.main')
@section('page-container')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            /* Google white background */
            margin: 0;
            padding: 50px 20px;
            /* Padding for overall layout */
        }

        .container {
            text-align: center;
            margin-top: 100px;
            /* Center vertically */
            position: relative;
            /* For positioning suggestions */
        }

        h1 {
            font-size: 3em;
            /* Larger title */
            color: #4285f4;
            /* Google Blue */
            margin-bottom: 20px;
            /* Space below title */
        }

        .highlight {
            color: #fbbc05;
            /* Google Yellow */
        }

        input[type="text"] {
            width: 500px;
            /* Wider input */
            padding: 15px;
            /* Comfortable padding */
            font-size: 1.5em;
            /* Larger font */
            border: 1px solid #dcdcdc;
            /* Light gray border */
            border-radius: 24px;
            /* Rounded edges */
            outline: none;
            /* Remove outline */
            transition: border 0.3s;
            /* Smooth border transition */
        }

        input[type="text"]:focus {
            border: 1px solid #4285f4;
            /* Change border on focus */
        }

        #suggestions {
            margin-top: 10px;
            text-align: left;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            /* border: 1px solid #dcdcdc; */
            /* border-radius: 8px; */
            background-color: #f9f9f9;
            display: none;
            /* z-index: 10; */
            /* position: absolute; */
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #e0e0e0;
            /* Highlight on hover */
        }

        #results {
            margin-top: 40px;
            /* Space above results */
            text-align: left;
            max-width: 600px;
            /* Adjust width */
            margin-left: auto;
            margin-right: auto;
        }

        .result-item {
            margin-bottom: 20px;
            /* Space between results */
            padding: 10px;
            border-bottom: 1px solid #f1f1f1;
            /* Light divider line */
        }

        .result-item a {
            text-decoration: none;
            color: #1a0dab;
            /* Google link color */
            font-size: 1.2em;
            /* Link font size */
        }

        .result-item p {
            margin: 5px 0;
            color: #545454;
            /* Darker gray for snippet */
        }

        /* Responsive design */
        @media (max-width: 600px) {
            input[type="text"] {
                width: 100%;
                /* Full width on smaller screens */
            }

            h1 {
                font-size: 2.5em;
                /* Smaller title on mobile */
            }
        }
    </style>

    <div class="container">
        <h1>Mini <span class="highlight">Google</span></h1>
        <input type="text" id="search-query" placeholder="Search..." oninput="showSuggestions(this.value)">
        <div id="suggestions"></div> <!-- Suggestions for previous searches -->
        <div id="results"></div>
    </div>

    <script>
        let previousSearches = [];

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
                if (search.toLowerCase().includes(query.toLowerCase())) { // Filter based on current input
                    const suggestionItem = document.createElement('div');
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.innerText = search;
                    suggestionItem.onclick = () => {
                        document.getElementById('search-query').value = search;
                        performSearch(search);
                        suggestionsDiv.style.display = 'none'; // Hide suggestions after selection
                    };
                    suggestionsDiv.appendChild(suggestionItem);
                }
            });

            suggestionsDiv.style.display = previousSearches.length > 0 ? 'block' : 'none'; // Show suggestions if available
        }
    </script>
@endsection
