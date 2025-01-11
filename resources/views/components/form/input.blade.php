<fieldset>
    @if (!empty($label))
        <label for="{{ $id }}">
            {{ $label }} @if($required)<span>*</span> @endif
        </label>
    @endif

    <input {{ $attributes }} @if($required)required @endif />

    @error($id)
        <span class="error">
            {{ $message }}
        </span>
    @enderror
</fieldset>
