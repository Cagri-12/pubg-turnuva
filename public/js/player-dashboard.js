/*
==========================================
SPACE STONE STARS
PLAYER DASHBOARD
==========================================
*/

document.addEventListener("DOMContentLoaded", () => {

    initCopyButtons();
    initCardAnimation();
    initHoverEffects();

});

/*=========================================
COPY BUTTONS
=========================================*/

function initCopyButtons() {

    document.querySelectorAll(".copy-btn").forEach(button => {

        button.addEventListener("click", () => {

            const target = button.dataset.copy;

            if (!target) return;

            navigator.clipboard.writeText(target)
                .then(() => {

                    showToast("✅ Kopyalandı");

                })
                .catch(() => {

                    showToast("❌ Kopyalanamadı");

                });

        });

    });

}

/*=========================================
TOAST
=========================================*/

function showToast(message) {

    const oldToast = document.querySelector(".dashboard-toast");

    if (oldToast) {

        oldToast.remove();

    }

    const toast = document.createElement("div");

    toast.className = "dashboard-toast";

    toast.innerHTML = message;

    document.body.appendChild(toast);

    setTimeout(() => {

        toast.classList.add("show");

    },100);

    setTimeout(() => {

        toast.classList.remove("show");

        setTimeout(()=>{

            toast.remove();

        },300);

    },2200);

}

/*=========================================
COPY TEXT (Mevcut room.blade.php ile uyumlu)
=========================================*/

function copyText(elementId) {

    const element = document.getElementById(elementId);

    if (!element) {

        showToast("❌ Kopyalanacak veri bulunamadı.");
        return;

    }

    const text = element.innerText.trim();

    navigator.clipboard.writeText(text)
        .then(() => {

            showToast("📋 Panoya kopyalandı!");

        })
        .catch(() => {

            showToast("❌ Kopyalama başarısız.");

        });

}

/*=========================================
CARD ANIMATION
=========================================*/

function initCardAnimation() {

    const cards = document.querySelectorAll(
        ".dashboard-card,.stat-card,.hero-card"
    );

    cards.forEach((card,index)=>{

        card.style.opacity="0";
        card.style.transform="translateY(25px)";

        setTimeout(()=>{

            card.style.transition=".6s ease";

            card.style.opacity="1";
            card.style.transform="translateY(0)";

        },index*120);

    });

}

/*=========================================
HOVER EFFECT
=========================================*/

function initHoverEffects(){

    document.querySelectorAll(".dashboard-card").forEach(card=>{

        card.addEventListener("mouseenter",()=>{

            card.style.transform="translateY(-6px)";

        });

        card.addEventListener("mouseleave",()=>{

            card.style.transform="translateY(0px)";

        });

    });

}