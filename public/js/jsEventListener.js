const cancelButton = document.getElementById('cancelLoginButton');
cancelButton.addEventListener('click', cancelLogin);

function cancelLogin(){
    const currentURL = window.location.href;

// Find the start of the TLD (.com, .gr, etc.)
    const tldStartIndex = currentURL.indexOf('.');
    if (tldStartIndex === -1) {
        // Handle case when there's no TLD (e.g.,  localhost)
        console.error("No TLD found in URL");
        return;
    }

// Find the last slash BEFORE the TLD starts
    const lastSlashIndex = currentURL.lastIndexOf('/', tldStartIndex - 1) + 1;

// Extract the base URL
    const baseURL = currentURL.substring(0, lastSlashIndex);

// Redirect if necessary
    if (currentURL !== baseURL) {
        // window.location.href = baseURL; //uncomment afterwards!!!!!
    }

    console.log('DEBUG MODE DEBUG MODE');
    console.log('Base URL: ' .baseURL);
}
