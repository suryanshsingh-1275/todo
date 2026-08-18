<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard - TodoFlow</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
                    href="{{ route('dashboard') }}"
                    id="dashboard-link"
                    class="nav-link active"
                >
                    Dashboard
                </a>

            </nav>

            <div class="sidebar-footer">

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    id="logout-form"
                >
                    @csrf

                    <button type="submit" class="logout-button">
                        Logout
                    </button>
                </form>

            </div>

        </aside>


        <!-- MAIN CONTENT -->

        <main id="main-content" class="main-content">

            @if (session('success'))
                <div class="flash-success">
                    {{ session('success') }}
                </div>
            @endif

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

                    <a
                        href="{{ route('tasks.create') }}"
                        id="create-task-button"
                        class="primary-button"
                    >
                        + Add Task
                    </a>

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
                            data-filter="all"
                        >
                            All
                        </button>

                        <button
                            id="filter-todo"
                            class="filter-button"
                            data-filter="todo"
                        >
                            Todo
                        </button>

                        <button
                            id="filter-progress"
                            class="filter-button"
                            data-filter="in_progress"
                        >
                            In Progress
                        </button>

                        <button
                            id="filter-completed"
                            class="filter-button"
                            data-filter="completed"
                        >
                            Completed
                        </button>

                    </div>

                </div>


                <!-- TASK LIST -->

                <div id="task-list" class="task-list">

                    @forelse ($tasks as $task)

                        <article
                            class="task-card"
                            data-task-id="{{ $task->id }}"
                            data-status="{{ $task->status }}"
                        >

                            <div class="task-card-header">

                                <div class="task-info">

                                    <h4 class="task-title">
                                        {{ $task->title }}
                                    </h4>

                                    <span class="task-status status-{{ $task->status === 'in_progress' ? 'progress' : $task->status }}">
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>

                                </div>


                                <!-- THREE DOT MENU -->

                                <div class="task-menu">

                                    <button
                                        class="task-menu-button"
                                        type="button"
                                    >
                                        &#8942;
                                    </button>

                                    <div class="task-dropdown">

                                        <a
                                            href="{{ route('tasks.edit', $task) }}"
                                            class="task-action"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('tasks.destroy', $task) }}"
                                            method="POST"
                                            class="delete-task-form"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="task-action delete-task"
                                            >
                                                Delete
                                            </button>
                                        </form>

                                    </div>

                                </div>

                            </div>


                            @if ($task->description)
                                <p class="task-description">
                                    {{ $task->description }}
                                </p>
                            @endif


                            <div class="task-card-footer">

                                <span class="task-priority priority-{{ $task->priority }}">
                                    {{ ucfirst($task->priority) }} Priority
                                </span>

                                <span class="task-date">
                                    Due: {{ $task->due_date ? $task->due_date->format('M d') : 'No date' }}
                                </span>

                            </div>

                        </article>

                    @empty

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

                            <a
                                href="{{ route('tasks.create') }}"
                                id="empty-create-task-button"
                                class="primary-button"
                            >
                                Create Task
                            </a>

                        </div>

                    @endforelse

                </div>

            </section>

        </main>

    </div>

</body>

</html>