document.addEventListener('DOMContentLoaded', () => {
    const eventsList = document.getElementById('events-list');

    // Example events data
    const events = [
        { name: 'Welcome Party', date: '2025-06-01' },
        { name: 'Tech Talk', date: '2025-06-15' },
        { name: 'Sports Day', date: '2025-07-01' }
    ];

    events.forEach(event => {
        const listItem = document.createElement('li');
        listItem.textContent = `${event.name} - ${event.date}`;
        eventsList.appendChild(listItem);
    });
});