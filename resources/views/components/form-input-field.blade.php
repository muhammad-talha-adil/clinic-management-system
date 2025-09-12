
    @props([
    'id' => null,
    'name' => null,
    'type' => 'text',   // input type: text, password, email, number, date, etc.
    'label' => null,
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'options' => [],    // for select
    'rows' => 3,        // for textarea
    'error' => null,    // custom error for frontend JS validation
    'class' => ''
])

<div class="w-full mb-5">
    {{-- Label --}}
    @if($label)
        <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
        </label>
    @endif

    {{-- Field type --}}
    @if($type === 'textarea')
        <textarea
            id="{{ $id ?? $name }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            {{ $attributes->merge(['class' => "form-input-custom $class"]) }}
        >{{ old($name, $value) }}</textarea>

    @elseif($type === 'select')
        <select
            id="{{ $id ?? $name }}"
            name="{{ $name }}"
            @if($required) required @endif
            {{ $attributes->merge(['class' => "form-input-custom $class"]) }}
        >
            <option value="" disabled {{ old($name, $value) ? '' : 'selected' }}>Select {{ strtolower($label ?? $name) }}</option>
            @foreach($options as $key => $option)
                <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>

    @else
        <input
            id="{{ $id ?? $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            {{ $attributes->merge(['class' => "form-input-custom $class"]) }}
        >
    @endif

    {{-- Error messages --}}
    @error($name)
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror

    @if($error)
        <p class="text-xs text-red-600 mt-1">{{ $error }}</p>
    @endif
</div>

    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
