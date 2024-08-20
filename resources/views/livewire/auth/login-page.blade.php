<div>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-100" style="max-width: 400px;">
            <div class="mb-3">
                <h1 class="card-title text-center mb-4">Aplikasi Onkologi</h1>
            </div>
            <div class="card">
                <div class="card-body">

                    <h3 class="card-title text-center mb-4">Login</h3>

                    <form wire:submit.prevent='login'>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" wire:model="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" wire:model="password" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
