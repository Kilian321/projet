document.addEventListener("DOMContentLoaded", () => {
    const slider = document.querySelector(".slider");
    const cards = document.querySelectorAll(".card");
    const prev = document.querySelector(".prev");
    const next = document.querySelector(".next");

    let index = 1; // Départ à la première vraie image
    const cardWidth = cards[0].offsetWidth + 20; // Largeur + marge
    const totalCards = cards.length;

    // Clonage des images pour un effet infini
    const firstClone = cards[0].cloneNode(true);
    const lastClone = cards[totalCards - 1].cloneNode(true);

    slider.appendChild(firstClone);
    slider.insertBefore(lastClone, cards[0]);

    const updatedCards = document.querySelectorAll(".card");

    // Ajustement de la position de départ
    slider.style.transform = `translateX(-${index * cardWidth}px)`;

    function slideNext() {
        index++;
        slider.style.transition = "transform 0.5s ease-in-out";
        slider.style.transform = `translateX(-${index * cardWidth}px)`;

        if (index >= totalCards + 1) {
            setTimeout(() => {
                slider.style.transition = "none";
                index = 1; // Revient à la vraie première image
                slider.style.transform = `translateX(-${index * cardWidth}px)`;
            }, 500);
        }
    }

    function slidePrev() {
        index--;
        slider.style.transition = "transform 0.5s ease-in-out";
        slider.style.transform = `translateX(-${index * cardWidth}px)`;

        if (index <= 0) {
            setTimeout(() => {
                slider.style.transition = "none";
                index = totalCards; // Revient à la vraie dernière image
                slider.style.transform = `translateX(-${index * cardWidth}px)`;
            }, 500);
        }
    }

    next.addEventListener("click", slideNext);
    prev.addEventListener("click", slidePrev);

    setInterval(slideNext, 3000); // Défilement auto toutes les 3 secondes
});
