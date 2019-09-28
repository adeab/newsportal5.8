@extends('layouts.admin')
@section('page_title')
Upload   
@endsection

@section('adminpanel_content')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
{{-- <div class="container">
<form method="post" action="{{ route('posts.store') }}" class="form_text" style="width:100%;" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter Title" name="title" required>
        
    </div>
    <div class="form-group ">
        <label>Blog Cover</label>
        <input class="file_btn" type="file" name="cover_image" accept="image/*" required>
        </div>
    <div class="form-group ">
        <label for="sel1">Select Category:</label>
        <select class="form-control" id="sel1" name="categories">
            <option disabled selected>Select</option>
            <option>Academics</option>
            <option>Career</option>
            <option>Entrepreneurship/Business</option>
            <option>Food and Nutrition</option>
            <option>Gaming</option>
            <option>Global Economy/Finance</option>
            <option>Health & Fitness</option>
            <option>Life Style</option>
            <option>Philosophy</option>
            <option>Pop Culture</option>
            <option>Productivity</option>
            <option>Recreation</option>
            <option>Scientific Insights & Discovery</option>
            <option>Sports</option>
            <option>Skill Development</option>
            <option>Technology & Communication</option>
            <option>Travel / Tourism</option>
            <option>Trends & Fads</option>
        </select>
    </div>
    <div class="form-group editor_area">
        <label>Enter Body</label>
        <textarea class="ckeditor" name="editor1"> </textarea required>
    </div>
    <button type="submit" class="btn button_a_color">Submit</button>
</form>
</div> --}}
<div class="graphs">
    <div class="xs">
        <h3>Forms</h3>
          <div class="tab-content">
                   <div class="tab-pane active" id="horizontal-form">
                       <form class="form-horizontal">
                           <div class="form-group">
                               <label for="focusedinput" class="col-sm-2 control-label">Focused Input</label>
                               <div class="col-sm-8">
                                   <input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">
                               </div>
                               <div class="col-sm-2">
                                   <p class="help-block">Your help text!</p>
                               </div>
                           </div>
                           
                           
                           
                           
                           <div class="form-group">
                               <label for="selector1" class="col-sm-2 control-label">Dropdown Select</label>
                               <div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
                                   <option>Lorem ipsum dolor sit amet.</option>
                                   <option>Dolore, ab unde modi est!</option>
                                   <option>Illum, fuga minus sit eaque.</option>
                                   <option>Consequatur ducimus maiores voluptatum minima.</option>
                               </select></div>
                           </div>
                           
                           <div class="form-group">
                               <label for="txtarea1" class="col-sm-2 control-label">Textarea</label>
                               <div class="col-sm-8"><textarea class="ckeditor" name="editor1"></textarea></div>
                           </div>
                           <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Example block-level help text here.</p>
                          </div>
                          <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button class="btn-success btn">Submit</button>
                                    <button class="btn-default btn">Cancel</button>
                                    <button class="btn-inverse btn">Reset</button>
                                </div>
                            </div>
                         </div>
                       </form>
                   </div>
               </div>
               
               
 
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('editor1', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection