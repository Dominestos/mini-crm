<div class="flex items-center gap-4">
    <form action="/locale" method="post">
        @csrf
        <label for="lang">Language</label>
        <select name="lang" id="lang">
            <option value="en">Englesh</option>
            <option value="ru">Rusish</option>
        </select>
        <button type="submit">Set</button>
    </form>
</div>

{{--
<form action="{{ route('locale') }}" method="POST">
    @csrf
    <select name="locale" onchange="this.form.submit()">
        <option value="en" {{ session('locale') === 'en' ? 'selected' : '' }}>English</option>
        <option value="fr" {{ session('locale') === 'fr' ? 'selected' : '' }}>French</option>
    </select>
</form>
--}}
