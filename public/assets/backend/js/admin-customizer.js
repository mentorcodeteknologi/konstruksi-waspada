$(document).ready(function () {
  // Function to set up event listeners for Dark Mode and RTL/LTR toggle
  function setupEventListeners() {
    // Function to toggle Dark Mode
    function toggleDarkMode() {
      // Toggle dark class on body
      $('body').toggleClass('dark');
      var isDark = $('body').hasClass('dark');

      // Toggle button text
      $('.btn-dark-setting').text(isDark ? 'Light' : 'Dark');

      // Store theme preference in localStorage
      localStorage.setItem('themePreference', isDark ? 'dark' : 'light');
    }

    // Toggle RTL/LTR when the button is clicked
    $('.btn-rtl').on('click', function () {
      var isRtl = $(this).hasClass('rtl');
      $("html").attr("dir", isRtl ? "" : "rtl");
      $(this).toggleClass('rtl');
      $(this).text(isRtl ? 'LTR' : 'RTL');
      $('body').toggleClass('rtl', isRtl);
    });

    // Toggle Dark Mode when the button is clicked
    $('body').on('click', '.btn-dark-setting', function () {
      toggleDarkMode();
    });
  }

  // Check if the theme preference is already stored in localStorage
  var themePreference = localStorage.getItem('themePreference');

  // Set the theme based on the stored preference or default to light mode
  if (themePreference === 'dark') {
    $('body').addClass('dark');
    $('.btn-dark-setting').text('Light');
  } else {
    $('.btn-dark-setting').text('Dark');
  }

  // Add the Dark Mode button to the page
  $('<ul class="custom-theme"><li class="btn-dark-setting">Dark</li></ul>').appendTo($('body'));

  // Set up event listeners for Dark Mode and RTL/LTR toggle
  setupEventListeners();
});