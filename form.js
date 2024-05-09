document.addEventListener('DOMContentLoaded', function() {

    const showBtn = document.querySelector('.showBtn');
    const addBtn = document.querySelector('.addBtn');
    const successorList = document.querySelector('.successor-container');

    successorList.style.display = 'none';

    showBtn.addEventListener('click', function(event) {
        event.preventDefault();
        
        if (successorList.style.display === 'none') {
            successorList.style.display = 'block';
        } else {
            successorList.style.display = 'none';
        }
    });

    addBtn.addEventListener('click', function(event) {
        const formInputs = document.querySelectorAll('.form input, .form select');

        // Check if the add button was clicked
        if (event.target.classList.contains('addBtn')) {
            // Add the required attribute to form inputs
            formInputs.forEach(input => {
                input.setAttribute('required', true);
            });
        } else {
            // Remove the required attribute from form inputs
            formInputs.forEach(input => {
                input.removeAttribute('required');
            });
        }
    });
});
