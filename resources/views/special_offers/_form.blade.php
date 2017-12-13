<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="nome" class="control-label">Name:</label>
            <input class="form-control" placeholder="Special Offer name" name="name" type="text" value="@isset($register){{$register->name}}@endisset" id="name">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="discount" class="control-label">Discount:</label>
            <input class="form-control" placeholder="Special Offer discount" name="discount" type="text" value="@isset($register){{$register->discount}}@endisset" id="discount">
        </div>
    </div>
</div>
