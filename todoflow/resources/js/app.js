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


    // DELETE TASK

    document.addEventListener("click", (event) => {

        if (event.target.classList.contains("delete-task")) {

            const taskCard = event.target.closest(".task-card");

            const confirmDelete = confirm(
                "Are you sure you want to delete this task?"
            );

            if (confirmDelete) {

                taskCard.remove();

                checkEmptyState();

            }

        }

    });


    // ADD TASK

    const addTaskButton = document.querySelector("#create-task-button");

    if (addTaskButton) {

        addTaskButton.addEventListener("click", () => {

            createTask();

        });

    }


    // Empty state button

    const emptyCreateButton = document.querySelector(
        "#empty-create-task-button"
    );

    if (emptyCreateButton) {

        emptyCreateButton.addEventListener("click", () => {

            createTask();

        });

    }


    // CREATE TASK FUNCTION

    function createTask() {

        const title = prompt("Enter task title:");

        if (!title || title.trim() === "") {
            return;
        }

        const description = prompt("Enter task description:");

        const taskList = document.querySelector("#task-list");

        const taskCard = document.createElement("article");

        taskCard.classList.add("task-card");

        taskCard.dataset.taskId = Date.now();


        taskCard.innerHTML = `

            <div class="task-card-header">

                <div class="task-info">

                    <h4 class="task-title">
                        ${title}
                    </h4>

                    <span class="task-status status-todo">
                        Todo
                    </span>

                </div>


                <div class="task-menu">

                    <button
                        class="task-menu-button"
                        type="button"
                    >
                        ⋮
                    </button>

                    <div class="task-dropdown">

                        <button
                            class="task-action edit-task"
                        >
                            Edit
                        </button>

                        <button
                            class="task-action delete-task"
                        >
                            Delete
                        </button>

                    </div>

                </div>

            </div>


            <p class="task-description">
                ${description || "No description"}
            </p>


            <div class="task-card-footer">

                <span class="task-priority priority-medium">
                    Medium Priority
                </span>

                <span class="task-date">
                    Due: No date
                </span>

            </div>

        `;


        taskList.appendChild(taskCard);

        checkEmptyState();

    }

    function checkEmptyState() {

        const taskList = document.querySelector("#task-list");

        const taskCards = taskList.querySelectorAll(".task-card");

        const emptyState = document.querySelector(
            "#empty-task-state"
        );

        if (!emptyState) {
            return;
        }

        if (taskCards.length === 0) {

            emptyState.style.display = "block";

        } else {

            emptyState.style.display = "none";

        }

    }


  

    checkEmptyState();

});