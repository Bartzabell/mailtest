// public/js/logout-confirmation.js
document.addEventListener("DOMContentLoaded", function () {
    const logoutLink = document.getElementById("logout-link");

    logoutLink.addEventListener("click", function (event) {
      event.preventDefault();

      // Display a confirmation dialog
      const isConfirmed = confirm("Are you sure you want to log out?");

      if (isConfirmed) {
        // If confirmed, submit the logout form
        document.getElementById("logout-form").submit();
      } else {
        // If not confirmed, cancel the logout action
        // You can add any additional logic here if needed
      }
    });
  });


