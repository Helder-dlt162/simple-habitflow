<div>
    <form method="POST" action="{{ route('habit.store') }}" class="flex gap-2">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Habit name"
            required
            class="border rounded px-3 py-2"
        />
        <button class="bg-indigo-600 text-white px-4 py-2 rounded">
            Save
        </button>
    </form>
</div>