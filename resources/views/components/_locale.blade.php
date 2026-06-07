<form action="{{ route('setLocale', $lang) }}" method="POST" class="d-inline mx-2">
    @csrf
    <button class="btn p-0 border-0 bg-transparent" type="submit">
        <img 
            src="{{ asset('vendor/blade-flags/country-'.$lang.'.svg') }}" width="32" height="32"class="shadow-sm"style="border-radius: 4px;">
    </button>
</form>
