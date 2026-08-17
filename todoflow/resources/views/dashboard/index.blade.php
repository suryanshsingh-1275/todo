<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard</title>

    vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body id="dashboard-page">

    <div class="dashboard-container">

        

        <aside id="sidebar" class="sidebar">

            <div class="sidebar-header">

                <h1 class="logo">
                    TodoFlow
                </h1>

            </div>

            <nav id="sidebar-nav" class="sidebar-nav">

                <a
                    href="/dashboard"
                    id="dashboard-link"
                    class="nav-link active"
                >
                    Dashboard
                </a>

                <a
                    href="#"
                    id="completed-link"
                    class="nav-link"
                >
                    Completed
                </a>

            </nav>

            <div class="sidebar-footer">

                <a
                    href="/logout"
                    id="logout-button"
                    class="logout-button"
                >
                    Logout
                </a>

            </div>

        </aside>


        <!-- MAIN CONTENT -->

        <main id="main-content" class="main-content">

            <!-- TOP BAR -->

            <header id="topbar" class="topbar">

                <div class="topbar-left">

                    <h2 class="page-title">
                        My Tasks
                    </h2>

                    <p class="page-subtitle">
                        Manage your tasks and stay productive.
                    </p>

                </div>

                <div class="topbar-right">

                    <button
                        id="create-task-button"
                        class="primary-button"
                    >
                        + Add Task
                    </button>

                </div>

            </header>


            <!-- TASK SECTION -->

            <section id="tasks-section" class="tasks-section">

                <div class="tasks-header">

                    <h3 class="section-title">
                        All Tasks
                    </h3>

                    <div class="task-filter">

                        <button
                            id="filter-all"
                            class="filter-button active"
                        >
                            All
                        </button>

                        <button
                            id="filter-todo"
                            class="filter-button"
                        >
                            Todo
                        </button>

                        <button
                            id="filter-progress"
                            class="filter-button"
                        >
                            In Progress
                        </button>

                        <button
                            id="filter-completed"
                            class="filter-button"
                        >
                            Completed
                        </button>

                    </div>

                </div>


                <!-- TASK LIST -->

                <div id="task-list" class="task-list">

                    <!-- Example Task -->

                    <article class="task-card" data-task-id="1">

                        <div class="task-card-header">

                            <div class="task-info">

                                <h4 class="task-title">
                                    Learn Laravel
                                </h4>

                                <span class="task-status status-progress">
                                    In Progress
                                </span>

                            </div>


                            <!-- THREE DOT MENU -->

                            <div class="task-menu">

                                <button
                                    class="task-menu-button"
                                    id="task-menu-1"
                                    type="button"
                                >
                                    ⋮
                                </button>

                                <div
                                    class="task-dropdown"
                                    id="task-dropdown-1"
                                >

                                    <button
                                        class="task-action edit-task"
                                        data-task-id="1"
                                    >
                                        Edit
                                    </button>

                                    <button
                                        class="task-action delete-task"
                                        data-task-id="1"
                                    >
                                        Delete
                                    </button>

                                </div>

                            </div>

                        </div>


                        <p class="task-description">
                            Learn Laravel MVC, routing and Eloquent ORM.
                        </p>


                        <div class="task-card-footer">

                            <span class="task-priority priority-high">
                                High Priority
                            </span>

                            <span class="task-date">
                                Due: Aug 20
                            </span>

                        </div>

                    </article>


                    <!-- EMPTY STATE -->

                    <div
                        id="empty-task-state"
                        class="empty-task-state"
                    >

                        <h3 class="empty-title">
                            No tasks yet
                        </h3>

                        <p class="empty-description">
                            Create your first task to get started.
                        </p>

                        <button
                            id="empty-create-task-button"
                            class="primary-button"
                        >
                            Create Task
                        </button>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>

</html>