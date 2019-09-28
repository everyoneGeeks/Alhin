<div class="">
        <h4> {{$title}}</h4>
    </div>

<div class="row">

    <div class="col-lg-3">
        <div class="form-group">

            <div class="form-check">

                 <input type="checkbox" class="form-check-input {{$section}}" id="exampleCheck1" value=1   name="add{{$section}}">
                <label class="form-check-label" for="exampleCheck1"> اضافة  {{$title}} </label>
    </div>

    </div>
</div>



<div class="col-lg-3">

<div class="form-group">

<div class="form-check">

<input type="checkbox" class="form-check-input {{$section}}" id="exampleCheck1" value=1   name="edit{{$section}}">
<label class="form-check-label" for="exampleCheck1">  تعديل {{$title}} </label>
</div>
</div>
</div>



<div class="col-lg-3">

<div class="form-group">

<div class="form-check">

<input type="checkbox" class="form-check-input {{$section}} " id="exampleCheck1" value=1   name="delete{{$section}}">
<label class="form-check-label" for="exampleCheck1">  حذف  {{ $title }}</label>
</div>
</div>
</div>

</div>

