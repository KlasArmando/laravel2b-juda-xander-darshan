<h1>Create Background</h1>
    <form action="{{route('background.store')}}" method="POST" class="form">
        @csrf

        <label for="name">Name:</label>
        <input name="name" id="name" type="text"><br>

        <label for="color">Hex Color:</label>
        <input name="color" id="color" type="text"><br>

        <br><input type="submit" value="Send">
    </form>
