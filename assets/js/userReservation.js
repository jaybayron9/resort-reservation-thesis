function adjustCount(guestType, change) {
    const guestElement = document.getElementById(guestType);
    let currentCount = parseInt(guestElement.value);
    if (isNaN(currentCount)) {
        currentCount = 0;
    }
    currentCount += change;
    currentCount = Math.max(0, currentCount);
    guestElement.value = currentCount;
}