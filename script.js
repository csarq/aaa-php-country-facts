document.addEventListener("DOMContentLoaded", function () {
  const newCountryBtn = document.getElementById("newCountryBtn");

  newCountryBtn.addEventListener("click", function () {
    // Initiate a new PHP request to generate a fresh random country
    window.location.href = "index.php"; // This reloads the page with new data
  });
});
