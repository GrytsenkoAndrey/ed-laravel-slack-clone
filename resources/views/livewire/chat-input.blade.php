<div class="flex rounded-lg border-2 border-gray-300 dark:border-gray-700 overflow-hidden">
    <span class="text-3xl border-r-2 border-gray-300 dark:border-gray-700 p-2">
        <svg class="fill-current h-6 w-6 block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z"/>
        </svg>
    </span>
    <input
        wire:keydown.enter="submit"
        wire:model.live="message"
        type="text"
        class="w-full px-4 bg-slate-50 dark:bg-slate-900"
        placeholder="Message in #{{ $channel->reference }}"
    />
</div>
