<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="nome" class="control-label">Name:</label>
            <input class="form-control" placeholder="Recipient name" name="name" type="text" value="@isset($register){{$register->name}}@endisset" id="name">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="email" class="control-label">E-mail:</label>
            <input class="form-control" placeholder="Recipient e-mail" name="email" type="text" value="@isset($register){{$register->email}}@endisset" id="email">
        </div>
    </div>
</div>
