<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>New Task - TodoFlow</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main class="auth-container">

        <section class="auth-card">

            <div class="auth-header">
                <h1 class="auth-title">New Task</h1>
                <p class="auth-subtitle">Add a task to your list</p>
            </div>

            <form
                action="{{ route('tasks.store') }}"
                method="POST"
                class="auth-form"
            >
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-input"
                        value="{{ old('title') }}"
                        required
                    >

                    @error('title')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-input"
                        rows="4"
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>

                    <select id="status" name="status" class="form-input" required>
                        <option value="todo" {{ old('status') === 'todo' ? 'selected' : '' }}>Todo</option>
                        <option value="in_progress" {{ old('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>

                    @error('status')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="priority">Priority</label>

                    <select id="priority" name="priority" class="form-input" required>
                        <option value="low" {{ old('priority') === 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority') === 'high' ? 'selected' : '' }}>High</option>
                    </select>

                    @error('priority')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        class="form-input"
                        value="{{ old('due_date') }}"
                    >

                    @error('due_date')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="primary-button">
                    Create Task
                </button>

            </form>

            <div class="auth-footer">
                <p>
                    <a href="{{ route('dashboard') }}">Cancel and go back</a>
                </p>
            </div>

        </section>

    </main>

</body>
</html>