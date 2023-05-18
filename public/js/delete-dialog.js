// Get the delete dialog and its elements
const deleteDialog = document.getElementById('delete-dialog');
const deleteConfirm = document.getElementById('delete-confirm');
const deleteCancel = document.getElementById('delete-cancel');
const overlay = document.createElement('div');
overlay.classList.add('overlay');

// Function to show the delete dialog and set the confirmation link
function showDeleteDialog(link) {
    // Set the confirmation link to the href attribute of the delete link
    deleteConfirm.setAttribute('href', link.getAttribute('href'));
    // Show the delete dialog
    deleteDialog.style.display = 'block';
    // Add the overlay to the body
    document.body.appendChild(overlay);
    // Add event listener to the overlay to close the delete dialog when clicked outside
    overlay.addEventListener('click', hideDeleteDialog);
}

// Function to hide the delete dialog and its overlay
function hideDeleteDialog() {
    // Hide the delete dialog
    deleteDialog.style.display = 'none';
    // Remove the overlay from the body
    document.body.removeChild(overlay);
}

// Add event listener to the cancel button to hide the delete dialog
deleteCancel.addEventListener('click', hideDeleteDialog);

// Add reverse animation to cancel button
deleteCancel.addEventListener('animationend', function () {
    deleteCancel.classList.remove('reverse');
});

// Add event listener to the delete button to add reverse animation to cancel button
deleteConfirm.addEventListener('click', function () {
    deleteCancel.classList.add('reverse');
});