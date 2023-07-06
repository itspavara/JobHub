
// Get the content element
const contentElement = document.getElementById('content');

// Get all navigation links
const navLinks = document.querySelectorAll('.nav-link');

// Attach click event listeners to navigation links
navLinks.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault();
    const url = link.getAttribute('href');

    // Fetch the content from the server
    fetchContent(url);
  });
});

// Function to fetch the content from the server
function fetchContent(url) {

  setTimeout(() => {
    // Load the content from the specified URL
    fetch(url)
      .then(response => response.text())
      .then(content => {
        // Display the fetched content in the main content area
        contentElement.innerHTML = content;
      })
      .catch(error => {
        console.error('Error fetching content:', error);
      });
  }, 1);
}