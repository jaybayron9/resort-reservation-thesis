const right = document.getElementById('right');
const left = document.getElementById('left');
const carousel = document.querySelector('.carousel');

let counter = 0;
const itemWidth = 650; // Width of each carousel item

right.addEventListener('click', () => {
    counter += itemWidth; // Move to the next item
    
    // Check if counter exceeds the total width of carousel items
    if (counter >= itemWidth * 7) {
        counter = 0; // Reset counter to the beginning
    }
    
    carousel.style.transform = `translateX(-${counter}px)`;
});

left.addEventListener('click', () => {
    counter -= itemWidth; // Move to the previous item
    
    // Check if counter is less than 0 (meaning it has gone beyond the first item)
    if (counter < 0) {
        counter = itemWidth * 6; // Set counter to the last item
    }
    
    carousel.style.transform = `translateX(-${counter}px)`;
});
