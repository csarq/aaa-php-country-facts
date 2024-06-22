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

      

      //$encodedCountryName = urlencode($randomCountry); didn't work!

      //fetch data for the random country
      $countryDataURL = "https://restcountries.com/v3.1/name/" . $randomCountry;

      // Check if the URL contains a space
if (strpos($countryDataURL, ' ') !== false) {
    // If it does, replace spaces with %20
    $countryDataURL = str_replace(' ', '%20', $countryDataURL);
}

      /*     
      testing if the URL contains a space

      $pattern = '/\s/'; //pattern to match white spaces

      $matchResult = preg_match($pattern, $countryDataURL);

echo "<script>";
if ($matchResult) {
    echo "console.log('URL contains a space!');";
} else {
    echo "console.log('URL does not contain a space.');";
}
echo "</script>";*/

      $GetCountryData = file_get_contents($countryDataURL);
      $countryData = json_decode($GetCountryData, true);

      //var_dump($countryData);

      //print the country data to console to check it's correct
      echo "<script>console.log('Country Data: " . json_encode($countryData) . "');</script>";

$countryFlagImage = $countryData[0]["flags"]["svg"]; 
// if flag is missing Alt text, then display "Image of the flag of country"
$countryFlagAlt = $countryData[0]["flags"]["alt"] ?? "Image of the flag of " . $randomCountry; 

$region = $countryData[0]["region"];
$population = $countryData[0]["population"];

//$languages = $countryData[0]["languages"];
//var_dump($languages); 

//loop through the languages array and extract the names of the languages
$languages = array();
foreach($countryData[0]["languages"] as $language){
  $languages[] = $language; //add the language to the languages array
}

//change the languages array to a string
$languages = implode(", ", $languages); // implode(string $separator, array $array): string

$capital = $countryData[0]["capital"][0];

$currencies = array();
foreach($countryData[0]["currencies"] as $currency){
  $currencies[] = $currency["name"]; //add the currency to the currencies array
} 

$currency = implode(", ", $currencies); 

/*to fix:
//☑️ fixed 1. when a country has spaces in the name, the fetch request fails, but https://restcountries.com/v3.1/name/Western%20Sahara is correct, for example.
// ☑️ Fixed 2. sometimes there is not any Alt text for a flag - apply a default Alt text using the country name variable
//it doesn't like https://restcountries.com/v3.1/name/Saint%20Barthélemy in borwser it's fine, but not in fetch request could be the accent
3. https://restcountries.com/v3.1/name/São%20Tomé%20and%20Príncipe - issue with fetching but fine in browser
4. issue with Bouvet Island: 
Warning
: Undefined array key "capital" in
C:\xampp\htdocs\aaa-php-country-facts\index.php
on line
74


Warning
: Trying to access array offset on value of type null in
C:\xampp\htdocs\aaa-php-country-facts\index.php
on line
74


Warning
: Undefined array key "currencies" in
C:\xampp\htdocs\aaa-php-country-facts\index.php
on line
77


Warning
: foreach() argument must be of type array|object, null given in
C:\xampp\htdocs\aaa-php-country-facts\index.php
on line
77

*/

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
            <img id="countryFlag" src="<?= $countryFlagImage;?>" alt="<?=$countryFlagAlt; ?>"/>
            <p>Region: <span id="countryRegion"><?= $region;?></span></p>
            <p>Population: <span id="countryPopulation"><?= $population;?></span></p>
            <p>Languages: <span id="countryLanguages"><?= $languages;?></span></p>
            <p>Capital: <span id="countryCapital"><?= $capital;?></span></p>
            <p>Currency: <span id="countryCurrency"><?= $currency;?></span></p>

    </section>
                <button id="newCountryBtn">New country</button>
     </main> 
</main>
    
  
    

    <script type="text/javascript" src="script.js"></script>
</body>
</html>
