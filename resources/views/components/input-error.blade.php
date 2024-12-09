@props(['messages'])

@if ($messages)
        @foreach ((array) $messages as $message)
            <li></li>
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @endforeach
@endif
