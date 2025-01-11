<main class="loginpage">
    <section>
        <h3>{{ config('cms.app.name') }} Admin Panel</h3>

        <form wire:submit.self="login" class="form">
            @csrf

            <x-form::input type="email" id="email" name="email"
                                     wire:model.blur="email" :required="true"
                                     label="Email" placeholder="eg. email@example.com" />

            <x-form::input type="password" id="password" name="password"
                                     wire:model.blur="password" :required="true"
                                     label="Password" />

            <a href="{{ route('cms.reset-password') }}" title="Forgot password" class="button button--line">
                Forgot password?
            </a>

            <button type="submit" title="Login" class="button">
                Login
            </button>
        </form>
    </section>
</main>
