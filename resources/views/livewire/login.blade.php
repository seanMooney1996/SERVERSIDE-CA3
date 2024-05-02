<div>
    <div>
        <form wire:submit.prevent="login">
            @if (session()->has('error'))
            <div>{{ session('error') }}</div>
            @endif
            <div>
                <label>Email</label>
                <input type="email" wire:model="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" wire:model="password" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
