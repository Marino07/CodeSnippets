document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    // Funkcija za filtriranje slika po kategorijama
    function filterGallery(category) {
        galleryItems.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                showItem(item);
            } else {
                hideItem(item);
            }
        });
    }

    // Funkcija za prikazivanje stavki s animacijom
    function showItem(item) {
        item.classList.remove('hidden');
        setTimeout(() => {
            item.style.display = 'block';
        }, 300);
    }

    // Funkcija za skrivanje stavki s animacijom
    function hideItem(item) {
        item.classList.add('hidden');
        setTimeout(() => {
            item.style.display = 'none';
        }, 300);
    }

    // Dodaj event listener na svaki gumb za filtriranje
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.getAttribute('data-category');
            filterGallery(category);
        });
    });

    // Početno stanje: prikaz svih stavki
    filterGallery('all');
});
