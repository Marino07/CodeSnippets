document.addEventListener('DOMContentLoaded', () => {
    const productList = document.getElementById('productList');
    const products = productList.children;
    const filterButton = document.getElementById('filterElectronics');

    // Dodaj animaciju na početku kako bi svi proizvodi bili vidljivi
    for (let product of products) {
        product.classList.add('visible');
    }

    // Funkcija za filtriranje
    function filterProducts(category) {
        for (let product of products) {
            if (product.getAttribute('data-category') === category) {
                showProduct(product); // Prikaži proizvod
            } else {
                hideProduct(product); // Sakrij proizvod
            }
        }
    }

    // Funkcija za prikazivanje proizvoda s animacijom
    function showProduct(product) {
        product.classList.remove('hidden');
        setTimeout(() => {
            product.classList.add('visible');
        }, 10); // Daj mali delay da animacija ima efekt
    }

    // Funkcija za skrivanje proizvoda s animacijom
    function hideProduct(product) {
        product.classList.remove('visible');
        setTimeout(() => {
            product.classList.add('hidden');
        }, 300); // Čekaj 300ms prije nego što sakriješ element zbog animacije
    }

    // Event listener za gumb za filtriranje
    filterButton.addEventListener('click', () => {
        filterProducts('electronics');
    });
});
