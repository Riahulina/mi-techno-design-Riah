// resources/js/Eksternal.js

window.showModal = function (role) {
    const modal = document.getElementById("modal");
    const modalTitle = document.getElementById("modalTitle");
    const modalImage = document.getElementById("modalImage");

    const content = {
        ketua: { title: "Ketua HMPS", img: "./images/khm.jpeg" },
        wakil_ketua: { title: "Wakil Ketua HMPS", img: "./images/wkhm.jpeg" },
        ctrl: { title: "Control Internal", img: "/images/ctrl.jpeg" },
        sekretaris: { title: "Sekretaris", img: "./images/skum.jpeg" },
        bendahara: { title: "Bendahara", img: "./images/bndum.jpeg" },
        inter: { title: "Kadiv Internal", img: "./images/kdvin.jpeg" },
        ekster: { title: "Kadiv Eksternal", img: "./images/kdveks.jpeg" },
        psdm: { title: "Kadiv PSDM", img: "./images/kdvps.jpeg" },
        bd: { title: "Kadiv BD", img: "./images/kdvbd.jpeg" },
        iptk: { title: "Kadiv IPETK", img: "./images/kdvip.jpeg" },
    };

    if (content[role]) {
        modalTitle.textContent = content[role].title;
        modalImage.src = content[role].img;
    } else {
        modalTitle.textContent = "Tidak ditemukan";
        modalImage.src = "";
    }

    modal.classList.remove("hidden");
    modal.classList.add("flex");
};

window.closeModal = function () {
    const modal = document.getElementById("modal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
};

//TRANSISI HOME PAGE
document.addEventListener("DOMContentLoaded", () => {
    const heroBg = document.getElementById("heroBackground");
    const thumbs = document.querySelectorAll(".thumb");
    const dots = document.querySelectorAll(".dot");
    let currentIndex = 0;
    let isAnimating = false;

    thumbs.forEach((thumb, index) => {
        thumb.addEventListener("click", () => {
            if (isAnimating || currentIndex === index) return;
            isAnimating = true;

            const newImg = thumb.dataset.image;

            // Step 1: Zoom out & fade out
            heroBg.style.transition = "transform 0.7s ease, opacity 0.7s ease";
            heroBg.style.transform = "scale(1.15)";
            heroBg.style.opacity = "0";

            setTimeout(() => {
                // Step 2: Ganti gambar
                heroBg.style.backgroundImage = `url('${newImg}')`;

                // Step 3: Zoom in & fade in
                heroBg.style.transform = "scale(0.95)";
                heroBg.style.opacity = "1";

                setTimeout(() => {
                    heroBg.style.transform = "scale(1)";
                    isAnimating = false;
                }, 600);
            }, 400);

            // Update indikator
            currentIndex = index;
            updateDots();
        });
    });

    function updateDots() {
        dots.forEach((dot, i) => {
            dot.classList.toggle("bg-blue-500", i === currentIndex);
            dot.classList.toggle("bg-gray-400", i !== currentIndex);
        });
    }

    // Set awal
    updateDots();
});
