document.addEventListener("DOMContentLoaded", () => {

    const menuButtons = document.querySelectorAll(".task-menu-button");

    menuButtons.forEach((button) => {

        button.addEventListener("click", (event) => {

            event.stopPropagation();

            const menu = button.nextElementSibling;

            document.querySelectorAll(".task-dropdown").forEach((dropdown) => {
                if (dropdown !== menu) {
                    dropdown.classList.remove("show");
                }
            });

            menu.classList.toggle("show");

        });

    });

    document.addEventListener("click", () => {

        document.querySelectorAll(".task-dropdown").forEach((dropdown) => {
            dropdown.classList.remove("show");
        });

    });


    // DELETE TASK CONFIRMATION

    document.querySelectorAll(".delete-task-form").forEach((form) => {

        form.addEventListener("submit", (event) => {

            const confirmDelete = confirm(
                "Are you sure you want to delete this task?"
            );

            if (!confirmDelete) {
                event.preventDefault();
            }

        });

    });


    // CLIENT-SIDE STATUS FILTER

    const filterButtons = document.querySelectorAll(".filter-button");
    const taskCards = document.querySelectorAll(".task-card");

    filterButtons.forEach((button) => {

        button.addEventListener("click", () => {

            filterButtons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");

            const filter = button.dataset.filter;

            taskCards.forEach((card) => {

                const matches = filter === "all" || card.dataset.status === filter;

                card.style.display = matches ? "" : "none";

            });

        });

    });

});