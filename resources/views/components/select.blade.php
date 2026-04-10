<div class="mb-3">
    <select id="largeSelect" name="{{ $name }}" class="form-select form-select-lg">
        <option value="" disabled selected>{{ $placeholder }}</option>
        @if ($options)
            @foreach ($options as $option)
                <option value="{{ is_array($options) ? $option : $option->id }}" {{ $selected == (is_array($options) ? $option : $option->id) ? 'selected' : '' }}>
                    {{ is_array($options) ? $option : $option->name }}
                </option>
            @endforeach
        @endif
    </select>
</div>
