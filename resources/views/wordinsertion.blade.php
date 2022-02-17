<h1>Add New Word</h1>
    <hr>
    <form action="/insertion" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">New Word</label>
            <input type="text" class="form-control" id="productName"  name="word">
        </div>
		<div>
			<label for="date"> choose a day plz </label>
			<input type="date" value="2017-06-01">
		</div>
		
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>