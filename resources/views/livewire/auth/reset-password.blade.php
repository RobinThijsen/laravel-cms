<main class="loginpage">
    <section>
        <h3>{{ config('cms.app.name') }}</h3>

        <form wire:submit.self="resetPassword" class="form">
            @csrf

            @if ($step == self::STEP_REQUEST)
                <x-form::input type="email" id="email" name="email"
                               wire:model.blur="email" :required="true"
                               label="Your email" placeholder="eg. email@example.com" />
            @elseif ($step == self::STEP_RESET)
                <x-form::input type="password" id="password" name="password"
                               wire:model.blur="password" :required="true"
                               label="New password" />

                <x-form::input type="password" id="password_confirmation" name="password_confirmation"
                               wire:model.blur="password_confirmation" :required="true"
                               label="Confirm your new password" />
            @endif

            <div>
                @if ($step == self::STEP_REQUEST)
                    <a href="{{ route('cms.login') }}" title="Back to Login page" class="button button--secondary">
                        Back to Login
                    </a>

                    <button type="button" wire:click.prevent="request" class="button">
                        Check
                    </button>
                @elseif ($step == self::STEP_RESET)
                    <button type="button" wire:click.prevent="previous" class="button button--secondary">
                        Previous
                    </button>

                    <button type="submit" class="button">
                        Reset password
                    </button>
                @endif
            </div>
        </form>
    </section>
</main>
