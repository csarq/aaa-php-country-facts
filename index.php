  <?php
  
    // Fetch  list of countries from API
      $apiUrlforCountriesList = "https://restcountries.com/v3.1/all?fields=name";
      $getListofCountries = file_get_contents($apiUrlforCountriesList);
      $ListofCountries = json_decode($getListofCountries, true);

      

// generate a random number to pick a random country
      $randomNumber = rand(0, 249); //there are 249 countries in the API

// extract the common name of a random country
      $randomCountry = $ListofCountries[$randomNumber]['name']['common'];

      //print the random country to console
      echo "<script>console.log('Random Country: $randomCountry');</script>";

    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌎 Country Fact Generator 🌎</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>   
    <h1>🌎 Country Fact Generator 🌎</h1>
  </header>

  <main>
    <section aria-labelledby="countryName" role="region">
            <h2 id="countryName"><?= $randomCountry?></h2>
            <img id="countryFlag" src="placeholder.jpg" alt="Country Flag Description To Go Here">
            <p>Region: <span id="countryRegion">Placeholder</span></p>
            <p>Population: <span id="countryPopulation">Placeholder</span></p>
            <p>Languages: <span id="countryLanguages">Placeholder</span></p>
            <p>Capital: <span id="countryCapital">Placeholder</span></p>
            <p>Currency: <span id="countryCurrency">Placeholder</span></p>
    </section>
    <button id="newCountryBtn">New country</button>
</main>
    
  
    

    <script type="text/javascript" src="script.js"></script>
</body>
</html>
