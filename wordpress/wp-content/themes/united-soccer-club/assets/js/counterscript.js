document.addEventListener('DOMContentLoaded', function() {
    // Function to animate the counters
    function animateCounter(id) {
        let element = document.getElementById(id);
        if (!element) {
            console.error(`Element with id '${id}' not found.`);
            return;  // Exit the function if the element is not found
        }

        let targetNumber = parseInt(element.getAttribute('data-target'));
        let count = 0;
        
        // Update the counter every 50ms
        function updateCounter() {
            if (count < targetNumber) {
                count++;
                element.textContent = count;
            } else {
                clearInterval(counterInterval);  // Stop when the target is reached
            }
        }

        let counterInterval = setInterval(updateCounter, 50);  // Adjust speed as needed
    }

    // Call the function for each counter
    animateCounter('totalawardsnum');
    animateCounter('teammembernum');
    animateCounter('yearexpriencenum');
    animateCounter('matchesplayednum');
});
