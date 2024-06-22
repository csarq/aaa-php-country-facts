document.addEventListener("DOMContentLoaded", function () {
  const newCountryBtn = document.getElementById("newCountryBtn");

  newCountryBtn.addEventListener("click", function () {
    // Initiate a new PHP request to generate a fresh random country
    window.location.href = "index.php"; // This reloads the page with new data
  });
});

// This reloads the page with new data without AJAX, although it causes repetition for the same country and screenreaders in repeating the heading.
