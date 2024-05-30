function Toggle() {
    const favDelete = document.getElementById('favDelete');

    if (favDelete.style.color === 'yellow') {
        favDelete.style.color = 'grey';
    } else {
        favDelete.style.color = 'yellow';
    }
}
