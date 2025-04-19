document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    if (form) {
        form.addEventListener("submit", function (e) {
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const message = document.getElementById("message").value.trim();

            if (!name || !email || !message) {
                e.preventDefault();
                alert("Please fill in all fields before submitting.");
            }
        });
    }

    // Scroll to top button logic (optional enhancement)
    const scrollBtn = document.createElement("button");
    scrollBtn.innerText = "↑";
    scrollBtn.style.position = "fixed";
    scrollBtn.style.bottom = "20px";
    scrollBtn.style.right = "20px";
    scrollBtn.style.padding = "10px";
    scrollBtn.style.display = "none";
    scrollBtn.style.borderRadius = "50%";
    scrollBtn.style.border = "none";
    scrollBtn.style.backgroundColor = "#2196f3";
    scrollBtn.style.color = "white";
    scrollBtn.style.cursor = "pointer";

    document.body.appendChild(scrollBtn);

    window.addEventListener("scroll", () => {
        scrollBtn.style.display = window.scrollY > 300 ? "block" : "none";
    });

    scrollBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});